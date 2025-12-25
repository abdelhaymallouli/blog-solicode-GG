<?php

namespace App\Services;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
class TagService extends BaseService
{



    public function getTags(): Collection
    {
        $query = Tag::query();
        $this->applyOrder($query, 'name', 'asc');
        return $query->get();
    }
}
