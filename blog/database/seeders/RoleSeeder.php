<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to the CSV file
        $path = database_path('seeders/data/roles_test.csv');

        if (!file_exists($path)) {
            return;
        }

        $file = fopen($path, 'r');
        $headers = fgetcsv($file); // Skip headers

        while (($row = fgetcsv($file)) !== false) {
            [$name, $created_at, $updated_at] = $row;

            // Use updateOrInsert to make it idempotent, keying on unique name
            DB::table('roles')->updateOrInsert(
                ['name' => $name],
                [
                    'created_at' => $created_at,
                    'updated_at' => now(),
                ]
            );
        }

        fclose($file);
    }
}
