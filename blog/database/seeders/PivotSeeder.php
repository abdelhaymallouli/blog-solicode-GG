<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to the CSV file
        $path = database_path('seeders/data/article_tag_test.csv');

        if (!file_exists($path)) {
            return;
        }

        $file = fopen($path, 'r');
        $headers = fgetcsv($file); // Skip headers

        while (($row = fgetcsv($file)) !== false) {
            [$article_slug, $tag_slug] = $row;

            // Resolve article_id from article_slug
            $article = Article::where('slug', $article_slug)->first();
            if (!$article) {
                continue; // Skip if article not found
            }
            $article_id = $article->id;

            // Resolve tag_id from tag_slug
            $tag = Tag::where('slug', $tag_slug)->first();
            if (!$tag) {
                continue; // Skip if tag not found
            }
            $tag_id = $tag->id;

            // Use updateOrInsert to make it idempotent (insert if not exists)
            DB::table('article_tag')->updateOrInsert(
                [
                    'article_id' => $article_id,
                    'tag_id' => $tag_id,
                ],
                [] // No additional fields to update
            );
        }

        fclose($file);
    }
}
