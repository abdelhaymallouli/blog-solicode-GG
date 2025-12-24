<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use App\Traits\BaseServiceTrait;

class CategoryService
{
    use BaseServiceTrait;


    public function getCategories(): Collection
    {
        $query = Category::query()->withCount([
            'articles' => function ($q) {
                $q->where('status', 'published');
            }
        ]);

        $this->applyOrder($query, 'name', 'asc');
        return $query->get();
    }

    public function getCategoryMeta(): array
    {
        return [
            'laravel' => ['color' => 'text-red-500'],
            'php' => ['color' => 'text-indigo-500'],
            'android' => ['color' => 'text-green-500'],
            'design' => ['color' => 'text-pink-500'],
            'education' => ['color' => 'text-amber-500'],
            'activities' => ['color' => 'text-cyan-500']
        ];
    }
}
