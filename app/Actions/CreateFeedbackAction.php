<?php

declare(strict_types=1);

namespace App\Actions;

use App\Http\Requests\PostFeedbackRequest;
use App\Models\Feedback;

final class CreateFeedbackAction
{
    public function handle(PostFeedbackRequest $request): Feedback
    {
        return Feedback::query()
            ->create([
                'customer_name' => $request->customer_name,
                'message' => $request->message,
                'rating' => $request->rating,
            ]);
    }
}
