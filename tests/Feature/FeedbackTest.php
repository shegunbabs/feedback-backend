<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('can submit feedback', function () {
    $payload = [
        'customer_name' => 'Test John',
        'message' => 'LilYPad is awesome',
        'rating' => 5,
    ];

    $response = $this->postJson('/api/feedback', $payload);

    $response->assertStatus(201)
        ->assertJson([
            'message' => 'Thanks for your feedback!',
        ]);

    $this->assertDatabaseHas('feedback', $payload);
});

test('validation fails with missing fields', function () {
    // Test with missing customer_name
    $response = $this->postJson('/api/feedback', [
        'message' => 'I need to know more about this',
        'rating' => 4,
    ]);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['customer_name']);

    // Test with missing message
    $response = $this->postJson('/api/feedback', [
        'customer_name' => 'Dorothy Campbell',
        'rating' => 4,
    ]);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['message']);

    // Test with missing rating
    $response = $this->postJson('/api/feedback', [
        'customer_name' => 'Dorothy Campbell',
        'message' => 'I need to know more about this',
    ]);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['rating']);
});
