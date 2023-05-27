<?php

namespace Database\Factories;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'shop_id'=>mt_rand(1,3),
            'account_id'=>mt_rand(4,7),
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (Message $message) {
            $senderId = mt_rand(1,2)==1?$message->account_id:$message->shop_id;
            $message->chat()->createMany(
                Chat::factory()->count(5)->state([
                    'sender_id' => $senderId,
                ])->make()->toArray()
            );
        });
    }
}
