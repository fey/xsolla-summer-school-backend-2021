<?php

namespace Tests\Feature;

use App\Models\Item;
use Doctrine\DBAL\Schema\Sequence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemControllerTest extends TestCase
{
    private Item $item;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
        $this->item = Item::factory()->make();
    }

    public function testIndex()
    {

        $route = route('items.index');
        $response = $this->get($route);

        $response->assertStatus(200);
    }

    public function testShow()
    {
        $item = Item::inRandomOrder()->first();
        $route = route('items.show', $item);
        $response = $this->get($route);

        $response->assertStatus(200);
    }

    public function testStore()
    {
        $route = route('items.store');
        $data = $this->item->toArray();
        $response = $this->post($route, $data);

        $response
            ->assertStatus(201)
            ->assertSessionHasNoErrors()
            ->assertJson(
                $this->item->only('sku')
            );
    }

    public function testUpdate()
    {
        $item = Item::inRandomOrder()->first();
        $route = route('items.update', $item);
        $data = $item->only('sku', 'name', 'type', 'price');
        $response = $this->put($route, $data);

        $this->assertDatabaseHas('items', array_merge(['id' => $item->id], $data));

        $response
            ->assertStatus(204)
            ->assertNoContent();
    }

    public function testUpdateWithSameData()
    {
        $item = Item::inRandomOrder()->first();
        $route = route('items.update', $item);
        $data = $item->only('sku', 'name', 'type', 'price');
        $response = $this->put($route, $data);

        $this->assertDatabaseHas('items', array_merge(['id' => $item->id], $data));

        $response
            ->assertStatus(204)
            ->assertNoContent();
    }

    public function testDestroy()
    {
        $item = Item::inRandomOrder()->first();
        $route = route('items.destroy', $item);
        $response = $this->delete($route);

        $data = $item->toArray();

        $this->assertDatabaseMissing('items', $data);

        $response
            ->assertStatus(204)
            ->assertNoContent();
    }
}
