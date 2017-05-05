<?php

namespace Tests\Feature;

use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $this->json('GET', '/api/category')
            ->assertStatus(200)
            ->assertJson([
                'categories' => true,
            ]);
    }

    public function testStore()
    {
        $this->json('POST', '/api/category')
            ->assertStatus(201);
    }

    public function testShow()
    {
        $this->json('GET', 'api/category/1')
            ->assertStatus(200)
            ->assertJson([
                'category' => true,
            ]);
        $this->json('GET', 'api/category/2')
            ->assertStatus(200)
            ->assertJson([
                'category' => true,
            ]);
        $this->json('GET', 'api/category/3')
            ->assertStatus(200)
            ->assertJson([
                'category' => true,
            ]);
        $this->json('GET', 'api/category/4')
            ->assertStatus(200)
            ->assertJson([
                'category' => true,
            ]);
        $this->json('GET', 'api/category/5')
            ->assertStatus(200)
            ->assertJson([
                'category' => true,
            ]);
        $this->json('GET', 'api/category/6')
            ->assertStatus(200)
            ->assertJson([
                'category' => true,
            ]);
        $this->json('GET', 'api/category/7')
            ->assertStatus(200)
            ->assertJson([
                'category' => true,
            ]);
        $this->json('GET', 'api/category/8')
            ->assertStatus(200)
            ->assertJson([
                'category' => true,
            ]);
        $this->json('GET', 'api/category/9')
            ->assertStatus(200)
            ->assertJson([
                'category' => true,
            ]);
        $this->json('GET', 'api/category/10')
            ->assertStatus(200)
            ->assertJson([
                'category' => true,
            ]);
        $this->json('GET', 'api/category/11')
            ->assertStatus(200)
            ->assertJson([
                'category' => true,
            ]);
        $this->json('GET', 'api/category/12')
            ->assertStatus(200)
            ->assertJson([
                'category' => true,
            ]);
        $this->json('GET', 'api/category/13')
            ->assertStatus(200)
            ->assertJson([
                'category' => true,
            ]);
        $this->json('GET', 'api/category/14')
            ->assertStatus(404);
        $this->json('GET', 'api/category/15')
            ->assertStatus(404);
    }

    public function testUpdate()
    {
        //     $this->json('PUT', 'api/category/1')
        //         ->assertStatus(200);
        //     $this->json('PUT', 'api/category/2')
        //         ->assertStatus(200);
        //     $this->json('PUT', 'api/category/3')
        //         ->assertStatus(200);
        //     $this->json('PUT', 'api/category/4')
        //         ->assertStatus(200);
        //     $this->json('PUT', 'api/category/5')
        //         ->assertStatus(200);
        //     $this->json('PUT', 'api/category/6')
        //         ->assertStatus(200);
        //     $this->json('PUT', 'api/category/7')
        //         ->assertStatus(200);
        //     $this->json('PUT', 'api/category/8')
        //         ->assertStatus(200);
        //     $this->json('PUT', 'api/category/9')
        //         ->assertStatus(200);
        //     $this->json('PUT', 'api/category/10')
        //         ->assertStatus(200);
        //     $this->json('PUT', 'api/category/11')
        //         ->assertStatus(200);
        //     $this->json('PUT', 'api/category/12')
        //         ->assertStatus(200);
        //     $this->json('PUT', 'api/category/13')
        //         ->assertStatus(200);
        //     $this->json('PUT', 'api/category/14')
        //         ->assertStatus(404);
        //     $this->json('PUT', 'api/category/15')
        //         ->assertStatus(404);
        // }

        public function testDestroy()
        {

        }
    }
