<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
class CategoryService extends BaseService
{



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
