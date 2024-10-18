<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventTest extends TestCase
{

    public function test_if_data_is_returned(): void
    {
        $response = $this->withHeaders(
            [
                'Authorization' => 'Bearer ' . env('API_KEY'),
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ]
        )->get('api/v1/events');

        $response->assertStatus(200);
        $response->assertJson(['data' => []]);
    }
}
