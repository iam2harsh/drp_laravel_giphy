<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * Test trending gifs.
     *
     * @return void
     */
    public function testTrending()
    {
        $response = $this->get('/api/gifs/trending');

        $response->assertOk();
        $response->assertJson([
            'meta'=> ['status'=>200]
        ]);
    }

    /**
     * Test search gifs.
     *
     * @return void
     */
    public function testSearch()
    {
        $response = $this->json('POST', '/api/gifs/search', ['query' => 'test']);

        $response->assertOk();
        $response->assertJson([
            'meta'=> ['status'=>200]
        ]);
    }

    /**
     * Test store random gifs.
     *
     * @return void
     */
    public function testStoreRandomGifs()
    {
        $response = $this->get('/api/gifs/store');

        $response->assertOk();
        
        $response->assertJson([
            'count'=> 700
        ]);

    }

    /**
     * Test store new random gifs.
     *
     * @return void
     */
    public function testStoreNewRandomGifs()
    {
        $response = $this->get('/api/gifs/new');

        $response->assertOk();
        
        $response->assertJson([
            'count'=> 700
        ]);

    }
}
