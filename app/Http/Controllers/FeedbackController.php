<?php

namespace App\Http\Controllers;

use App\Actions\CreateFeedbackAction;
use App\Http\Requests\GetFeedbackRequest;
use App\Http\Requests\PostFeedbackRequest;
use App\Http\Resources\FeedbackCollection;
use App\Models\Feedback;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;

class FeedbackController extends Controller
{
    public function index(GetFeedbackRequest $request): FeedbackCollection
    {

        $httpQuery = $request->query('rating');

        $data = Feedback::query()
            ->when(
                $httpQuery,
                fn (Builder $query) => $query->where('rating', $httpQuery)
            )->latest()
            ->take(10)
            ->get();

        return new FeedbackCollection($data);

    }

    public function store(
        PostFeedbackRequest $request,
        CreateFeedbackAction $createFeedbackAction
    ): JsonResponse {

        try {

            $createFeedbackAction->handle($request);

        } catch (Exception $exception) {

            logger()->error('Post feedback failed', [
                'message' => $exception->getMessage(),
            ]);

            return response()->json(['error' => 'An error occurred. Please try again.'], 400);
        }

        return response()->json(['message' => 'Thanks for your feedback!'], 201);
    }
}
