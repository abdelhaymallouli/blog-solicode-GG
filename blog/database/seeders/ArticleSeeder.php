<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to the CSV file
        $path = database_path('seeders/data/articles_test.csv');

        if (!file_exists($path)) {
            return;
        }

        $file = fopen($path, 'r');
        $headers = fgetcsv($file); // Skip headers

        while (($row = fgetcsv($file)) !== false) {
            [$title, $slug, $content, $image, $status, $view_count, $is_featured, $created_at, $updated_at, $author_email, $category_slug] = $row;

            // Generate slug if missing
            if (empty($slug)) {
                $slug = Str::slug($title);
            }

            // Resolve author_id from author_email
            $author = User::where('email', $author_email)->first();
            if (!$author) {
                continue; // Skip if author not found
            }
            $author_id = $author->id;

            // Resolve category_id from category_slug
            $category = Category::where('slug', $category_slug)->first();
            if (!$category) {
                continue; // Skip if category not found
            }
            $category_id = $category->id;

            // Use updateOrInsert to make it idempotent, keying on unique slug
            DB::table('articles')->updateOrInsert(
                ['slug' => $slug],
                [
                    'title' => $title,
                    'content' => $content,
                    'image' => $image,
                    'status' => $status,
                    'view_count' => (int) $view_count,
                    'is_featured' => (bool) $is_featured,
                    'author_id' => $author_id,
                    'category_id' => $category_id,
                    'created_at' => $created_at,
                    'updated_at' => now(),
                ]
            );
        }

        fclose($file);
    }
}
