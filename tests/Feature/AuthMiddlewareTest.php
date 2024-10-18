<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthMiddlewareTest extends TestCase
{

    public function test_missing_api_key(): void
    {
        $response = $this->get('api/v1/attendees');

        $response->assertStatus(401);
    }

    public function test_valid_api_key(): void
    {
        $response = $this->withHeaders(
            [
                'Authorization' => 'Bearer ' . env('API_KEY'),
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ]
        )->get('api/v1/attendees');

        $response->assertStatus(200);
    }

    public function test_wrong_api_key(): void
    {
        $response = $this->withHeaders(
            [
                'Authorization' => 'Bearer notvalidtoken',
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ]
        )->get('api/v1/attendees');

        $response->assertStatus(401);
    }
}
