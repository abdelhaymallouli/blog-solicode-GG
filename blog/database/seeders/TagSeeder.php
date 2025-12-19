<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to the CSV file
        $path = database_path('seeders/data/tags_test.csv');

        if (!file_exists($path)) {
            return;
        }

        $file = fopen($path, 'r');
        $headers = fgetcsv($file); // Skip headers

        while (($row = fgetcsv($file)) !== false) {
            [$name, $slug, $created_at, $updated_at] = $row;

            // Generate slug if missing
            if (empty($slug)) {
                $slug = Str::slug($name);
            }

            // Use updateOrInsert to make it idempotent, keying on unique slug
            DB::table('tags')->updateOrInsert(
                ['slug' => $slug],
                [
                    'name' => $name,
                    'created_at' => $created_at,
                    'updated_at' => now(),
                ]
            );
        }

        fclose($file);
    }
}
