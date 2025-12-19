<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Seed articles from CSV, resolving user_id from email.
     * Idempotent via unique slug.
     */
    public function run(): void
    {
        $path = database_path('seeders/data/articles_test.csv');

        if (!file_exists($path)) {
            return;
        }

        $file = fopen($path, 'r');
        $headers = fgetcsv($file); // Skip headers

        while (($row = fgetcsv($file)) !== false) {
            [
                $title,
                $slug,
                $content,
                $image,
                $status,
                $view_count,
                $is_featured,
                $created_at,
                $updated_at,
                $author_email,
                $category_slug // Added category_slug
            ] = $row;

            // Generate slug if missing (fallback for invalid data)
            $slug = $slug ?: Str::slug($title);

            // Resolve author (user_id)
            $author = User::where('email', $author_email)->first();
            if (!$author) {
                continue; // Skip rows with unknown author
            }

            // Map status to allowed enum values – invalid ones will be corrected to default
            $validStatuses = ['draft', 'published', 'archived'];
            $status = in_array($status, $validStatuses) ? $status : 'draft';

            // Insert or Update Article
            DB::table('articles')->updateOrInsert(
                ['slug' => $slug], // Unique constraint
                [
                    'title' => $title,
                    'content' => $content,
                    'image' => $image ?: null,
                    'status' => $status,
                    'view_count' => max(0, (int) $view_count), // Prevent negative values
                    'is_featured' => (bool) $is_featured,
                    'user_id' => $author->id,
                    'created_at' => $created_at,
                    'updated_at' => now(),
                ]
            );

            // Handle Category Association
            if ($category_slug) {
                // Find Category ID
                $categoryId = DB::table('categories')->where('slug', $category_slug)->value('id');
                // Find Article ID (since we just inserted/updated it)
                $articleId = DB::table('articles')->where('slug', $slug)->value('id');

                if ($categoryId && $articleId) {
                    DB::table('article_category')->updateOrInsert(
                        ['article_id' => $articleId, 'category_id' => $categoryId],
                        ['created_at' => now(), 'updated_at' => now()]
                    );
                }
            }
        }

        fclose($file);
    }
}
