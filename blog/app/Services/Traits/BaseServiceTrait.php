<?php

namespace App\Services\Traits;

use Illuminate\Database\Eloquent\Builder;

trait BaseServiceTrait
{
    /**
     * Apply search filter to a query
     */
    public function applySearchFilter(Builder $query, ?string $search, array $fields): Builder
    {
        if ($search) {
            $query->where(function ($q) use ($search, $fields) {
                foreach ($fields as $field) {
                    $q->orWhere($field, 'like', '%' . $search . '%');
                }
            });
        }
        return $query;
    }

    /**
     * Apply ordering to a query
     */
    public function applyOrder(Builder $query, string $column = 'created_at', string $direction = 'desc'): Builder
    {
        return $query->orderBy($column, $direction);
    }

    /**
     * Apply pagination
     */
    public function paginateQuery(Builder $query, int $perPage = 10)
    {
        return $query->paginate($perPage)->withQueryString();
    }
}
