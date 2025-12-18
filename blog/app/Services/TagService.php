<?php

namespace App\Services;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use App\Services\Traits\BaseServiceTrait;

class TagService
{
    use BaseServiceTrait;

    /**
     * Get all tags
     */
    public function getAll(): Collection
    {
        $query = Tag::query();
        $this->applyOrder($query, 'name', 'asc');
        return $query->get();
    }
}
