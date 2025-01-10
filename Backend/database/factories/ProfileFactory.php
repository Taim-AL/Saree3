<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::factory()->create();
        $photos = Storage::files('public/Uploads/Images/Users');
        // $photo = $photos[array_rand($photos)];
        if (count($photos) > 0) {
            $photo = $photos[array_rand($photos)]; // اختيار صورة عشوائية
            $avatar = 'Uploads/Images/Users/' . basename($photo);
        } else {
            $avatar = 'default-avatar.jpg'; // صورة افتراضية إذا كان المجلد فارغًا
        }
        return [
            'user_id'=>$user->id,
            'full_name' => fake()->name(),
            'phone_number' => $user->phone_number,
            'bio' => fake()->text(100),
            'avatar' => $avatar,
        ];


    }
}
