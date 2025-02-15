<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Livewire as AppLivewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire as LivewireLivewire;
use Tests\TestCase;

class LivewireTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function renders_successfully()
    {
        LivewireLivewire::test(AppLivewire::class)
            ->assertStatus(200);
    }
}
