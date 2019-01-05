<?php

namespace Tests\Feature;

use App\Tool;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoreToolTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_will_store_tool()
    {
        $params = factory(Tool::class)->make()->toArray();

        $toolId = 1;
        $this->json('POST', '/api/tools', $params)
            ->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'title',
                'link',
                'description',
                'tags',
            ])->assertExactJson(array_merge($params, ['id' => $toolId]));

        $this->assertDatabaseHas('tools', [
            'title'       => $params['title'],
            'link'        => $params['link'],
            'description' => $params['description'],
        ]);

        $this->assertEquals($params['tags'], Tool::find($toolId)->tags);
    }
}
