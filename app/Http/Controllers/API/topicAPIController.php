<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetopicAPIRequest;
use App\Http\Requests\API\UpdatetopicAPIRequest;
use App\Models\topic;
use App\Repositories\topicRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\topicResource;
use Response;

/**
 * Class topicController
 * @package App\Http\Controllers\API
 */

class topicAPIController extends AppBaseController
{
    /** @var  topicRepository */
    private $topicRepository;

    public function __construct(topicRepository $topicRepo)
    {
        $this->topicRepository = $topicRepo;
    }

    /**
     * Display a listing of the topic.
     * GET|HEAD /topics
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $topics = $this->topicRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(topicResource::collection($topics), 'Topics retrieved successfully');
    }

    /**
     * Store a newly created topic in storage.
     * POST /topics
     *
     * @param CreatetopicAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatetopicAPIRequest $request)
    {
        $input = $request->all();

        $topic = $this->topicRepository->create($input);

        return $this->sendResponse(new topicResource($topic), 'Topic saved successfully');
    }

    /**
     * Display the specified topic.
     * GET|HEAD /topics/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var topic $topic */
        $topic = $this->topicRepository->find($id);

        if (empty($topic)) {
            return $this->sendError('Topic not found');
        }

        return $this->sendResponse(new topicResource($topic), 'Topic retrieved successfully');
    }

    /**
     * Update the specified topic in storage.
     * PUT/PATCH /topics/{id}
     *
     * @param int $id
     * @param UpdatetopicAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetopicAPIRequest $request)
    {
        $input = $request->all();

        /** @var topic $topic */
        $topic = $this->topicRepository->find($id);

        if (empty($topic)) {
            return $this->sendError('Topic not found');
        }

        $topic = $this->topicRepository->update($input, $id);

        return $this->sendResponse(new topicResource($topic), 'topic updated successfully');
    }

    /**
     * Remove the specified topic from storage.
     * DELETE /topics/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var topic $topic */
        $topic = $this->topicRepository->find($id);

        if (empty($topic)) {
            return $this->sendError('Topic not found');
        }

        $topic->delete();

        return $this->sendSuccess('Topic deleted successfully');
    }
}
