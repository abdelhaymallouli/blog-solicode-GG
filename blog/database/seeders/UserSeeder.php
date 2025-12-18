<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to the CSV file
        $path = database_path('seeders/data/users_test.csv');

        if (!file_exists($path)) {
            return;
        }

        $file = fopen($path, 'r');
        $headers = fgetcsv($file); // Skip headers

        while (($row = fgetcsv($file)) !== false) {
            [$name, $email, $password, $avatar, $bio, $created_at, $updated_at] = $row;

            // Hash the password
            $hashedPassword = Hash::make($password);

            // Use updateOrInsert to make it idempotent, keying on unique email
            DB::table('users')->updateOrInsert(
                ['email' => $email],
                [
                    'name' => $name,
                    'password' => $hashedPassword,
                    'avatar' => $avatar,
                    'bio' => $bio,
                    'created_at' => $created_at,
                    'updated_at' => now(),
                ]
            );
        }

        fclose($file);
    }
}
