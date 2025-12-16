<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('seeders/data/comments_test.csv');

        if (! file_exists($path)) {
            $this->command->warn("Comment CSV file not found: {$path}");
            return;
        }

        $file = fopen($path, 'r');
        $headers = fgetcsv($file); // Skip header row

        $validRows = [];
        $rowNumber = 1;

        while (($row = fgetcsv($file)) !== false) {
            $rowNumber++;

            // Map CSV columns
            [$content, $status, $created_at, $updated_at, $author_email, $article_slug] = array_pad($row, 6, null);

            $validator = Validator::make([
                'content'       => $content,
                'status'        => $status,
                'created_at'    => $created_at,
                'updated_at'    => $updated_at,
                'author_email'  => $author_email,
                'article_slug'  => $article_slug,
            ], [
                'content'       => 'required|string|min:1',
                'status'        => ['required', Rule::in(['pending', 'approved', 'rejected'])],
                'created_at'    => 'required|date',
                'updated_at'    => 'required|date',
                'author_email'  => 'required|email',
                'article_slug'  => 'required|string',
            ]);

            if ($validator->fails()) {
                $this->command->line("<comment>Skipping invalid row {$rowNumber}: " . implode(', ', $validator->errors()->all()) . '</comment>');
                continue;
            }

            $author = User::where('email', $author_email)->first();
            if (! $author) {
                $this->command->line("<comment>Skipping row {$rowNumber}: Author not found ({$author_email})</comment>");
                continue;
            }

            $article = Article::where('slug', $article_slug)->first();
            if (! $article) {
                $this->command->line("<comment>Skipping row {$rowNumber}: Article not found ({$article_slug})</comment>");
                continue;
            }

            $validRows[] = [
                'content'     => $content,
                'status'      => $status,
                'author_id'   => $author->id,
                'article_id'  => $article->id,
                'created_at'  => $created_at,
                'updated_at'  => $updated_at,
            ];
        }

        fclose($file);

        if (empty($validRows)) {
            $this->command->info('No valid comments to seed.');
            return;
        }

        // Process in chunks to avoid memory issues on very large files
        collect($validRows)->chunk(500)->each(function ($chunk) {
            foreach ($chunk as $data) {
                DB::table('comments')->updateOrInsert(
                    [
                        'author_id'   => $data['author_id'],
                        'article_id'  => $data['article_id'],
                        'content'     => $data['content'],
                        'created_at'  => $data['created_at'],
                    ],
                    [
                        'status'      => $data['status'],
                        'updated_at'  => $data['updated_at'],
                    ]
                );
            }
        });

        $this->command->info('Comments seeded successfully (' . count($validRows) . ' valid rows processed).');
    }
}
