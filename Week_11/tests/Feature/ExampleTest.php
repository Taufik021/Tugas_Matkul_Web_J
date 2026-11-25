<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_home_page_displays_the_tool_catalog(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Katalog alat bangunan')
            ->assertSee('Mesin Molen Beton');
    }

    public function test_catalog_can_be_filtered_by_keyword_and_category(): void
    {
        $this->get('/?q=jack')
            ->assertOk()
            ->assertSee('Jack Hammer')
            ->assertDontSee('Mesin Molen Beton');

        $this->get('/?category=alat-konstruksi')
            ->assertOk()
            ->assertSee('Mesin Molen Beton')
            ->assertDontSee('Jack Hammer');
    }
}
