<?php

namespace App\Helpers;

use Illuminate\Container\Container;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class CollectionPagination
{
    public static function paginate(Collection $results, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $results = $results instanceof Collection ? $results : Collection::make($results);
        $paginatedResults = $results->slice(($page - 1) * $perPage, $perPage)->values();
        $options += [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ];
        return Container::getInstance()->makeWith(LengthAwarePaginator::class, [
            'items' => $paginatedResults,
            'total' => $results->count(),
            'perPage' => $perPage,
            'currentPage' => $page,
            'options' => $options,
        ]);
    }
}
