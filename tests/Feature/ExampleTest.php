<?php

use Database\Seeders\SiteContentSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('the application returns a successful response', function () {
    $this->seed(SiteContentSeeder::class);

    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertSee('Services', false);
});
