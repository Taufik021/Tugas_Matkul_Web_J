<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProgramValidationTest extends TestCase
{
    // TODO 10: Menguji validasi field wajib dan batas 100 karakter pada API program.
    public function test_api_rejects_empty_fields_with_indonesian_validation_messages(): void
    {
        $this->post('/api/programs', ['nama' => '', 'deskripsi' => ''])
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['nama', 'deskripsi'])
            ->assertJsonPath('errors.nama.0', 'Nama wajib diisi')
            ->assertJsonPath('errors.deskripsi.0', 'Deskripsi wajib diisi');
    }

    public function test_api_rejects_names_longer_than_100_characters_on_create_and_update(): void
    {
        $data = [
            'nama' => str_repeat('a', 101),
            'deskripsi' => 'Deskripsi valid',
        ];

        $this->postJson('/api/programs', $data)
            ->assertUnprocessable()
            ->assertJsonPath('errors.nama.0', 'Nama maksimal 100 karakter');

        $this->putJson('/api/programs/1', $data)
            ->assertUnprocessable()
            ->assertJsonPath('errors.nama.0', 'Nama maksimal 100 karakter');
    }

    public function test_api_update_rejects_empty_fields(): void
    {
        $this->putJson('/api/programs/1', ['nama' => '', 'deskripsi' => ''])
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['nama', 'deskripsi']);
    }
}
