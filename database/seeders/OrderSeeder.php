<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use App\Models\Magazine;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $magazines = Magazine::all();

        if ($users->isEmpty() || $magazines->isEmpty()) {
            return;
        }

        for ($i = 0; $i < 10; $i++) {
            $user = $users->random();
            $magazine = $magazines->random();

            Order::create([
                'user_id' => $user->id,
                'magazine_id' => $magazine->id,
                'quantity' => rand(1, 3),
                'total_price' => $magazine->price * rand(1, 3),
                'status' => ['pending', 'completed'][rand(0, 1)],
                'created_at' => now()->subDays(rand(0, 10)),
            ]);
        }
    }
}
