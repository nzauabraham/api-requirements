<?php

namespace Tests\Feature;
use Tests\TestCase;


class ProductTest extends TestCase
{
    /**
     *
     * @return void
     */
    public function testGetProducts(): void
    {
        $response = $this->get('/api/products');
        $response->assertStatus(200);
    }
}
