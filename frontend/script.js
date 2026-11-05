const menuButton = document.getElementById('menu-btn');
    const menu = document.getElementById('menu');

    if (menuButton && menu) {
      menuButton.addEventListener('click', function () {
        const isExpanded = menuButton.getAttribute('aria-expanded') === 'true';
        menuButton.setAttribute('aria-expanded', String(!isExpanded));
        menuButton.setAttribute('aria-label', isExpanded ? 'Buka menu' : 'Tutup menu');
        menu.classList.toggle('max-[800px]:hidden');
      });

      menu.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () {
          menu.classList.add('max-[800px]:hidden');
          menuButton.setAttribute('aria-expanded', 'false');
          menuButton.setAttribute('aria-label', 'Buka menu');
        });
      });
    }

    // Load the shared JSON file so the frontend also works with static servers such as Live Server.
    const apiUrl = '../backend/menu.json';
    const apiStatus = document.getElementById('api-status');
    const apiTools = document.getElementById('api-tools');
    const apiLogs = document.getElementById('api-logs');
    const retryButton = document.getElementById('retry-api');
    const apiSpinner = document.getElementById('api-spinner');
    const rentalToolSelect = document.getElementById('rental-tool');
    const rentalDaysInput = document.getElementById('rental-days');
    const rentalEstimate = document.getElementById('rental-estimate');
    const rentalForm = document.getElementById('rental-form');
    const rentalMessage = document.getElementById('rental-message');
    const rentalDateInput = document.getElementById('rental-date');
    const searchInput = document.getElementById('search-input');
    const categoryFilters = document.getElementById('category-filters');
    const loadMoreButton = document.getElementById('load-more');
    let availableTools = [];
    let selectedToolId = '';
    let selectedCategory = 'Semua';
    let visibleCount = 4;

    const today = new Date();
    today.setMinutes(today.getMinutes() - today.getTimezoneOffset());
    rentalDateInput.min = today.toISOString().slice(0, 10);

    // SOAL 3: Catat proses fetch di halaman dan Console browser.
    function addApiLog(message) {
      const logItem = document.createElement('li');
      logItem.textContent = `${new Date().toLocaleTimeString('id-ID')} - ${message}`;
      apiLogs.prepend(logItem);
      console.info(`[BangunSewa API] ${message}`);
    }

    // SOAL 2: Ubah data alat dari JSON menjadi kartu-kartu HTML.
    function updateRentalEstimate() {
      const selectedTool = availableTools.find(function (tool) {
        return String(tool.id) === rentalToolSelect.value;
      });
      const days = Number(rentalDaysInput.value);

      if (!selectedTool || !Number.isFinite(days) || days < 1) {
        rentalEstimate.textContent = 'Pilih alat';
        return;
      }

      rentalEstimate.textContent = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        maximumFractionDigits: 0
      }).format(selectedTool.pricePerDay * days);
    }

    function renderCategoryFilters() {
      categoryFilters.replaceChildren();
      const categories = ['Semua', ...new Set(availableTools.map(function (tool) {
        return tool.category;
      }))];

      categories.forEach(function (categoryName) {
        const button = document.createElement('button');
        button.type = 'button';
        button.className = `rounded-full border px-4 py-2 text-sm font-bold transition ${
          selectedCategory === categoryName
            ? 'border-[#183a32] bg-[#183a32] text-white'
            : 'border-[#dfe5dc] bg-white text-[#53645c] hover:border-[#183a32]'
        }`;
        button.textContent = categoryName;
        button.setAttribute('aria-pressed', String(selectedCategory === categoryName));
        button.addEventListener('click', function () {
          selectedCategory = categoryName;
          visibleCount = 4;
          renderCategoryFilters();
          showApiTools(availableTools);
        });
        categoryFilters.append(button);
      });
    }

    function showApiTools(tools) {
      apiTools.replaceChildren();
      rentalToolSelect.replaceChildren();
      const emptyOption = document.createElement('option');
      emptyOption.value = '';
      emptyOption.textContent = 'Pilih alat yang ingin disewa';
      rentalToolSelect.append(emptyOption);

      tools.forEach(function (tool) {
        const option = document.createElement('option');
        option.value = String(tool.id);
        option.textContent = `${tool.name} — ${new Intl.NumberFormat('id-ID', {
          style: 'currency',
          currency: 'IDR',
          maximumFractionDigits: 0
        }).format(tool.pricePerDay)}/hari`;
        rentalToolSelect.append(option);
      });

      const query = searchInput.value.trim().toLocaleLowerCase('id-ID');
      const filteredTools = tools.filter(function (tool) {
        const matchesCategory = selectedCategory === 'Semua' || tool.category === selectedCategory;
        const searchableText = `${tool.name} ${tool.category} ${tool.description}`.toLocaleLowerCase('id-ID');
        return matchesCategory && searchableText.includes(query);
      });
      const visibleTools = filteredTools.slice(0, visibleCount);

      if (filteredTools.length === 0) {
        const emptyState = document.createElement('p');
        emptyState.className = 'col-span-full rounded-2xl border border-dashed border-[#dfe5dc] bg-[#f7f8f4] p-8 text-center font-semibold text-[#65756c]';
        emptyState.textContent = 'Tidak ada alat yang cocok. Coba kata pencarian atau kategori lain.';
        apiTools.append(emptyState);
      }

      visibleTools.forEach(function (tool) {
        const card = document.createElement('article');
        card.className = 'flex flex-col overflow-hidden rounded-3xl border border-[#e7ebe4] bg-white shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-xl hover:shadow-[#183a32]/10';

        const image = document.createElement('img');
        image.className = 'h-56 w-full bg-[#f3f5f0] object-contain p-3';
        image.src = tool?.imageUrl || '';
        image.alt = tool?.imageAlt || `Foto ${tool?.name || 'alat bangunan'}`;
        image.loading = 'lazy';
        image.decoding = 'async';

        const imageCredit = document.createElement('a');
        imageCredit.className = 'border-b border-[#edf0e9] bg-[#f8f9f6] px-4 py-2 text-xs text-[#65756c] underline hover:text-[#183a32]';
        imageCredit.href = tool?.imageSource || 'https://commons.wikimedia.org/';
        imageCredit.target = '_blank';
        imageCredit.rel = 'noopener noreferrer';
        imageCredit.textContent = 'Sumber foto: Wikimedia Commons';

        const content = document.createElement('div');
        content.className = 'flex flex-1 flex-col p-5';

        const category = document.createElement('p');
        category.className = 'mb-2 text-xs font-extrabold uppercase tracking-[1.4px] text-[#e88b36]';
        category.textContent = tool?.category || 'Alat bangunan';

        const title = document.createElement('h4');
        title.className = 'mb-2 text-xl font-extrabold text-[#183a32]';
        title.textContent = tool?.name || 'Alat tanpa nama';

        const description = document.createElement('p');
        description.className = 'mb-5 flex-1 text-sm leading-6 text-[#65756c]';
        description.textContent = tool?.description || 'Deskripsi alat tidak tersedia.';

        const price = document.createElement('p');
        price.className = 'mb-4 border-t border-[#edf0e9] pt-4 font-extrabold text-[#183a32]';
        if (typeof tool?.pricePerDay === 'number') {
          const priceAmount = document.createElement('span');
          priceAmount.textContent = new Intl.NumberFormat('id-ID', {
              style: 'currency',
              currency: 'IDR',
              maximumFractionDigits: 0
            }).format(tool.pricePerDay);
          const priceUnit = document.createElement('span');
          priceUnit.className = 'text-xs font-medium text-[#65756c]';
          priceUnit.textContent = ' / hari';
          price.append(priceAmount, priceUnit);
        } else {
          price.textContent = 'Harga sewa tidak tersedia';
        }

        const rentButton = document.createElement('button');
        rentButton.type = 'button';
        rentButton.className = 'w-full rounded-full bg-[#183a32] px-4 py-3 text-sm font-bold text-white transition hover:bg-[#245447]';
        rentButton.textContent = 'Pilih untuk disewa';
        rentButton.addEventListener('click', function () {
          selectedToolId = String(tool.id);
          rentalToolSelect.value = selectedToolId;
          updateRentalEstimate();
          document.getElementById('kontak').scrollIntoView({ behavior: 'smooth' });
          rentalToolSelect.focus({ preventScroll: true });
        });

        content.append(category, title, description, price, rentButton);
        card.append(image, imageCredit, content);
        apiTools.append(card);

      });

      loadMoreButton.classList.toggle('hidden', visibleCount >= filteredTools.length);
      if (selectedToolId) {
        rentalToolSelect.value = selectedToolId;
      }
      updateRentalEstimate();
    }

    // SOAL 1: Ambil data secara asynchronous menggunakan async/await.
    // SOAL 3: Tampilkan status loading, validasi data, dan tangani error.
    async function fetchTools() {
      apiStatus.textContent = 'Loading: sedang mengambil data alat bangunan...';
      apiStatus.className = 'text-sm font-semibold text-[#53645c]';
      apiSpinner.classList.remove('hidden');
      apiTools.replaceChildren();
      rentalToolSelect.disabled = true;
      rentalToolSelect.replaceChildren();
      const loadingOption = document.createElement('option');
      loadingOption.value = '';
      loadingOption.textContent = 'Memuat daftar alat...';
      rentalToolSelect.append(loadingOption);
      retryButton.classList.add('hidden');
      addApiLog(`Memulai fetch: ${apiUrl}`);

      try {
        const response = await fetch(apiUrl);
        addApiLog(`Respons diterima dengan status HTTP ${response.status}.`);

        if (!response.ok) {
          throw new Error(`Permintaan gagal (HTTP ${response.status}).`);
        }

        const data = await response.json();
        // Optional chaining mencegah error jika properti "tools" tidak tersedia.
        const tools = data?.tools;

        if (!Array.isArray(tools)) {
          throw new Error('Format data API tidak sesuai: daftar alat tidak ditemukan.');
        }

        availableTools = tools;
        renderCategoryFilters();
        showApiTools(tools);
        rentalToolSelect.disabled = tools.length === 0;
        apiSpinner.classList.add('hidden');
        apiStatus.textContent = tools.length
          ? `${tools.length} jenis alat siap dilihat. Pilih alat untuk mengisi formulir sewa.`
          : 'API berhasil dihubungi, tetapi belum ada alat untuk ditampilkan.';
        addApiLog(`Fetch berhasil: ${tools.length} alat bangunan ditampilkan.`);
      } catch (error) {
        const message = error instanceof Error ? error.message : 'Terjadi kesalahan yang tidak diketahui.';
        apiStatus.textContent = `Gagal memuat data: ${message}`;
        apiStatus.className = 'text-sm font-semibold text-red-700';
        apiSpinner.classList.add('hidden');
        rentalToolSelect.disabled = true;
        rentalToolSelect.replaceChildren();
        const errorOption = document.createElement('option');
        errorOption.value = '';
        errorOption.textContent = 'Daftar alat belum dapat dimuat';
        rentalToolSelect.append(errorOption);
        retryButton.classList.remove('hidden');
        addApiLog(`Fetch gagal: ${message}`);
        console.error('[BangunSewa API] Detail error:', error);
      }
    }

    rentalToolSelect.addEventListener('change', function () {
      selectedToolId = rentalToolSelect.value;
      updateRentalEstimate();
    });
    rentalDaysInput.addEventListener('input', updateRentalEstimate);

    rentalForm.addEventListener('submit', function (event) {
      event.preventDefault();
      const selectedTool = availableTools.find(function (tool) {
        return String(tool.id) === rentalToolSelect.value;
      });

      if (!selectedTool) {
        rentalMessage.textContent = 'Pilih alat dari katalog terlebih dahulu.';
        rentalMessage.className = 'mt-4 rounded-xl bg-red-50 p-4 text-sm text-red-700';
        return;
      }

      rentalMessage.textContent = `Permintaan demo untuk ${selectedTool.name} sudah diproses di halaman ini. Ini hanya simulasi; belum ada pesanan yang dikirim atau disimpan.`;
      rentalMessage.className = 'mt-4 rounded-xl bg-[#eaf4eb] p-4 text-sm font-semibold text-[#245447]';
      addApiLog(`Simulasi permintaan sewa dibuat untuk ${selectedTool.name}. Tidak ada data yang dikirim.`);
    });

    searchInput.addEventListener('input', function () {
      visibleCount = 4;
      showApiTools(availableTools);
    });

    loadMoreButton.addEventListener('click', function () {
      visibleCount += 4;
      showApiTools(availableTools);
    });

    retryButton.addEventListener('click', fetchTools);
    fetchTools();
