<?php

namespace Tests\Unit;

use App\Models\Console;
use Tests\TestCase;

class DeleteConsoleControllerTest extends TestCase
{
    public function test_console_is_deleted(): void
    {
        // set up test data
        $console = Console::factory()->create();
        Console::factory(5)->create();

        // make test call
        $this->deleteJson("/api/consoles/{$console->id}");

        $this->assertSoftDeleted('consoles', ['id' => $console->id]);
    }
}
