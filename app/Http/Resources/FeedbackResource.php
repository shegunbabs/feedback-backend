<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

/**
 * @property-read string $customer_name
 * @property-read string $message
 * @property-read int $rating
 * @property-read Carbon $created_at
 */
class FeedbackResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'customer_name' => $this->customer_name,
            'message' => $this->message,
            'rating' => $this->rating,
            'created_at' => $this->created_at->format('jS M, Y - h:i:s A'),
        ];
    }
}
