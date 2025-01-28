<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestFeature extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        info('5555555555555');
        $response = $this->get('/');
        // $response = $this->get('/api/all/all_item');

        $response->assertStatus(200);
        // $response->assertJson(['gg'=>'1']);
    }
}
