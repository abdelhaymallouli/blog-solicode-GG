<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use App\Services\Traits\BaseServiceTrait;

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
}
