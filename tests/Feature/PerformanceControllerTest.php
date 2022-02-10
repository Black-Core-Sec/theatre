<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PerformanceControllerTest extends TestCase
{

    /**
     * Test for index method.
     *
     * @return void
     */
    public function test_index(): void
    {
        $response = $this->get('api/performance');

        $response->assertStatus(200);
    }

    /**
     * Test for create method.
     *
     * @return void
     */
    public function test_create(): void
    {
        $response = $this->get('api/performance/create');

        $response->assertStatus(404);
    }

    /**
     * Test for store method.
     *
     * @return void
     */
    public function test_store(): void
    {
        $response = $this->post('api/performance/',
            [
                'name' => 'Performance_TEST',
                'start_date' => '26-03-2019',
                'end_date' =>'29-03-2019'
            ]
        );

        $response->assertStatus(200);
    }

    /**
     * Test for show method.
     *
     * @return void
     */
    public function test_show(): void
    {
        $response = $this->get('api/performance/1');

        $response->assertStatus(200);
    }

    /**
     * Test for edit method.
     *
     * @return void
     */
    public function test_edit(): void
    {
        $response = $this->get('api/performance/1/edit');

        $response->assertStatus(404);
    }

    /**
     * Test for update method.
     *
     * @return void
     */
    public function test_update(): void
    {
        $response = $this->put('api/performance/1');

        $response->assertStatus(404);
    }

    /**
     * Test for destroy method.
     *
     * @return void
     */
    public function test_destroy(): void
    {
        $response = $this->delete('api/performance/-1');

        $response->assertStatus(404);
    }

}
