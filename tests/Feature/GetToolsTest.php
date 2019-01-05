<?php

namespace Tests\Feature;

use App\Tool;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Support\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GetToolsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_will_return_all_tools()
    {
        $tools = factory(Tool::class, 3)->create();

        $response = $this->json('GET', 'api/tools');

        $this->assertSuccessfulResponseContains($response, $tools);
    }

    /**
     * @test
     */
    public function it_will_return_tools_filtered_by_tag()
    {
        factory(Tool::class, 3)->create();
        $taggedTools = factory(Tool::class, 2)->create([
            'tags' => [
                'php',
                'laravel',
                'testing',
            ],
        ]);

        $response = $this->json('GET', 'api/tools?tag=php');

        $this->assertSuccessfulResponseContains($response, $taggedTools);
    }

    private function assertSuccessfulResponseContains(
        TestResponse $response,
        Collection $tools
    ): TestResponse {
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                [
                    'id',
                    'title',
                    'link',
                    'description',
                    'tags',
                ]
            ])->assertJsonCount($tools->count());

        $json = [];
        foreach ($tools as $tool) {
            $json[] = [
                'id'          => $tool->id,
                'title'       => $tool->title,
                'description' => $tool->description,
                'link'        => $tool->link,
                'tags'        => $tool->tags,
            ];
        }

        return $response->assertJson($json);
    }
}
