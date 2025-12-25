<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to the CSV file
        $path = database_path('seeders/data/categories_test.csv');

        if (!file_exists($path)) {
            return;
        }

        $file = fopen($path, 'r');
        $headers = fgetcsv($file); // Read headers

        while (($data = fgetcsv($file)) !== false) {
            // Map CSV columns to associative array using headers
            $row = array_combine($headers, $data);

            // Use updateOrInsert to make it idempotent, keying on unique slug
            DB::table('categories')->updateOrInsert(
                ['slug' => $row['slug']],
                [
                    'name' => $row['name'],
                    'slug' => $row['slug'],
                    'description' => $row['description'],
                    'icon' => $row['icon'],
                    'color' => $row['color'],
                    'bg_color' => $row['bg_color'],
                    'created_at' => $row['created_at'],
                    'updated_at' => $row['updated_at'],
                ]
            );
        }

        fclose($file);
    }
}
