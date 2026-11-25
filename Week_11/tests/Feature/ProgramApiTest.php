<?php

namespace Tests\Feature;

use App\Models\Program;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProgramApiTest extends TestCase
{
    use RefreshDatabase;

    // TODO 9: Menguji endpoint API untuk daftar, tambah, detail, ubah, dan hapus program.
    public function test_api_can_list_create_show_update_and_delete_programs(): void
    {
        $program = Program::create([
            'nama' => 'Program Awal',
            'deskripsi' => 'Deskripsi awal',
        ]);

        $this->getJson('/api/programs')
            ->assertOk()
            ->assertJsonFragment(['nama' => 'Program Awal']);

        $this->postJson('/api/programs', [
            'nama' => 'Program Baru',
            'deskripsi' => 'Deskripsi program baru',
        ])
            ->assertCreated()
            ->assertJsonPath('nama', 'Program Baru');

        $this->getJson("/api/programs/{$program->id}")
            ->assertOk()
            ->assertJsonPath('id', $program->id);

        $this->putJson("/api/programs/{$program->id}", [
            'nama' => 'Program Diubah',
            'deskripsi' => 'Deskripsi yang diperbarui',
        ])
            ->assertOk()
            ->assertJsonPath('nama', 'Program Diubah');

        $this->deleteJson("/api/programs/{$program->id}")
            ->assertOk()
            ->assertExactJson(['message' => 'Program berhasil dihapus.']);

        $this->assertDatabaseMissing('programs', ['id' => $program->id]);
    }

    public function test_web_program_forms_and_crud_routes_are_available(): void
    {
        $this->get('/programs')->assertOk()->assertSee('Daftar Program');
        $this->get('/programs/create')->assertOk()->assertSee('Tambah Program');

        $program = Program::create([
            'nama' => 'Program Web',
            'deskripsi' => 'Deskripsi web',
        ]);

        $this->get("/programs/{$program->id}/edit")
            ->assertOk()
            ->assertSee('Program Web');
    }
}
