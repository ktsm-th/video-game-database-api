<?php

namespace Tests\Unit;

use App\Models\Publisher;
use Tests\TestCase;

class UpdatePublisherControllerTest extends TestCase
{
    public function test_publisher_is_updated(): void
    {
       // set up test data
       $publisher = Publisher::factory()->create();

       $data = [
           'name' => 'test name',
           'image' => 'test-image-url',
           'founding_date' => '2021-11-06',
       ];

       // make test call
       $this->patchJson("/api/publishers/{$publisher->id}", $data)
       ->assertStatus(200)
       ->assertJsonFragment($data);
       $this->assertDatabaseHas("publishers", $data);
   }
}
