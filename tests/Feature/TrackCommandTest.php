<?php

namespace Tests\Feature;

use Database\Seeders\RetailerWithProductSeeder;
use Http;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TrackCommandTest extends TestCase
{
    use RefreshDatabase;

    /**@test */
    function it_tracks_product_stock()
    {
        $this->seed(RetailerWithProductSeeder::class);

        $this->assertFalse(Product::first()->inStock());

        Http::fake(fn () => [
            'available' => true,
            'price' => 29900
        ]);

        $this->artisan('track');

        $this->assertTrue(Product::first()->in_stock);
    }
}
