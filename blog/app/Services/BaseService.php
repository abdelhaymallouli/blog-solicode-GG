<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;

abstract class BaseService
{
    /**
     * Apply search filters to the query.
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
     * Apply ordering to the query.
     */
    public function applyOrder(Builder $query, string $column = 'created_at', string $direction = 'desc'): Builder
    {
        return $query->orderBy($column, $direction);
    }

    /**
     * Paginate the query results.
     */
    public function paginateQuery(Builder $query, int $perPage = 10)
    {
        return $query->paginate($perPage)->withQueryString();
    }
}
