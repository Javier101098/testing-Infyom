<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\topic;

class topicApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_topic()
    {
        $topic = topic::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/topics', $topic
        );

        $this->assertApiResponse($topic);
    }

    /**
     * @test
     */
    public function test_read_topic()
    {
        $topic = topic::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/topics/'.$topic->id
        );

        $this->assertApiResponse($topic->toArray());
    }

    /**
     * @test
     */
    public function test_update_topic()
    {
        $topic = topic::factory()->create();
        $editedtopic = topic::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/topics/'.$topic->id,
            $editedtopic
        );

        $this->assertApiResponse($editedtopic);
    }

    /**
     * @test
     */
    public function test_delete_topic()
    {
        $topic = topic::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/topics/'.$topic->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/topics/'.$topic->id
        );

        $this->response->assertStatus(404);
    }
}
