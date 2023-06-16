<?php

namespace Tests\Unit;

use App\Models\Publisher;
use Tests\TestCase;

class StorePublisherControllerTest extends TestCase
{
    public function test_publisher_can_be_created(): void
    {

        $data = [
            'name' => 'test name',
            'image' => 'test-image-url',
            'founding_date' => '2021-11-06',
        ];

        $this->postJson("/api/publishers/", $data)
        ->assertStatus(201)
        ->assertJsonFragment($data);
        $this->assertDatabaseHas("publishers", $data);
    }
}
