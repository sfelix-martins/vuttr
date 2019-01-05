<?php

namespace Tests\Feature;

use App\Tool;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteToolTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_will_delete_a_tool()
    {
        $tool = factory(Tool::class)->create();

        $this->json('DELETE', '/api/tools/'.$tool->id)
            ->assertStatus(204);

        $this->assertDatabaseMissing('tools', [
            'id' => $tool->id,
        ]);
    }

    /**
     * @test
     */
    public function it_will_return_a_404_response_to_not_existent_tool()
    {
        $this->json('DELETE', '/api/tools/1')
            ->assertStatus(404)
            ->assertJsonStructure([
                'errors' => [
                    [
                        'status',
                        'code',
                        'title',
                        'detail',
                        'source',
                    ]
                ],
            ]);
    }
}
