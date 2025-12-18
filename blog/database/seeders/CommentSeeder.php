<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to the CSV file
        $path = database_path('seeders/data/comments_test.csv');

        if (!file_exists($path)) {
            return;
        }

        $file = fopen($path, 'r');
        $headers = fgetcsv($file); // Skip headers

        while (($row = fgetcsv($file)) !== false) {
            [$content, $status, $created_at, $updated_at, $user_email, $article_slug] = $row;

            // Resolve author_id from author_email
            $author = User::where('email', $user_email)->first();
            if (!$author) {
                continue; // Skip if author not found
            }
            $user_id = $author->id;

            // Resolve article_id from article_slug
            $article = Article::where('slug', $article_slug)->first();
            if (!$article) {
                continue; // Skip if article not found
            }
            $article_id = $article->id;

            // Use updateOrInsert to make it idempotent, keying on content, author_id, article_id (assuming uniqueness)
            DB::table('comments')->updateOrInsert(
                [
                    'content' => $content,
                    'user_id' => $user_id,
                    'article_id' => $article_id,
                ],
                [
                    'status' => $status,
                    'created_at' => $created_at,
                    'updated_at' => now(),
                ]
            );
        }

        fclose($file);
    }
}
