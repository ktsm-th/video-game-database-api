<?php

namespace Tests\Unit;

use App\Models\Publisher;
use Tests\TestCase;

class DeletePublisherControllerTest extends TestCase
{
    public function test_publisher_is_deleted(): void
    {
        // set up test data
        $publisher = Publisher::factory()->create();
        Publisher::factory(5)->create();

        // make test call
        $this->deleteJson("/api/publishers/{$publisher->id}");

        $this->assertSoftDeleted('publishers', ['id' => $publisher->id]);
    }
}
