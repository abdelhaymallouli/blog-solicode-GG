<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('seeders/data/comments_test.csv');

        if (!file_exists($path)) {
            return;
        }

        $file = fopen($path, 'r');
        fgetcsv($file); // Skip headers

        $allowedStatuses = ['pending', 'approved', 'rejected'];

        while (($row = fgetcsv($file)) !== false) {

            [
                $content,
                $status,
                $created_at,
                $updated_at,
                $author_email,
                $article_slug
            ] = $row;

            // ❌ Skip invalid content
            if (empty($content)) {
                continue;
            }

            // ❌ Skip invalid status
            if (!in_array($status, $allowedStatuses)) {
                continue;
            }

            // Resolve user_id from author_email
            $user = User::where('email', $author_email)->first();
            if (!$user) {
                continue;
            }

            // Resolve article_id from article_slug
            $article = Article::where('slug', $article_slug)->first();
            if (!$article) {
                continue;
            }

            // Default dates if missing
            $createdAt = $created_at ?: now();
            $updatedAt = $updated_at ?: now();

            // Idempotent insert
            DB::table('comments')->updateOrInsert(
                [
                    'content'    => $content,
                    'user_id'    => $user->id,
                    'article_id' => $article->id,
                ],
                [
                    'status'     => $status,
                    'created_at'=> $createdAt,
                    'updated_at'=> $updatedAt,
                ]
            );
        }

        fclose($file);
    }
}
