<?php namespace Tests\Repositories;

use App\Models\topic;
use App\Repositories\topicRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class topicRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var topicRepository
     */
    protected $topicRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->topicRepo = \App::make(topicRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_topic()
    {
        $topic = topic::factory()->make()->toArray();

        $createdtopic = $this->topicRepo->create($topic);

        $createdtopic = $createdtopic->toArray();
        $this->assertArrayHasKey('id', $createdtopic);
        $this->assertNotNull($createdtopic['id'], 'Created topic must have id specified');
        $this->assertNotNull(topic::find($createdtopic['id']), 'topic with given id must be in DB');
        $this->assertModelData($topic, $createdtopic);
    }

    /**
     * @test read
     */
    public function test_read_topic()
    {
        $topic = topic::factory()->create();

        $dbtopic = $this->topicRepo->find($topic->id);

        $dbtopic = $dbtopic->toArray();
        $this->assertModelData($topic->toArray(), $dbtopic);
    }

    /**
     * @test update
     */
    public function test_update_topic()
    {
        $topic = topic::factory()->create();
        $faketopic = topic::factory()->make()->toArray();

        $updatedtopic = $this->topicRepo->update($faketopic, $topic->id);

        $this->assertModelData($faketopic, $updatedtopic->toArray());
        $dbtopic = $this->topicRepo->find($topic->id);
        $this->assertModelData($faketopic, $dbtopic->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_topic()
    {
        $topic = topic::factory()->create();

        $resp = $this->topicRepo->delete($topic->id);

        $this->assertTrue($resp);
        $this->assertNull(topic::find($topic->id), 'topic should not exist in DB');
    }
}
