<?php
declare(strict_types=1);

namespace App\Filters;


/**
 * Class NameFilter
 * @package App\Filters
 * @author Abdullahi Abdulkabir <abdullahiabdulkabir1@gmail.com>
 */
class NameFilter
{

    public function handle($query, $next)
    {
        $name = request()->get('name');
        $query->when($name, function ($query, $name) {
            $query->where('name', 'LIKE', '%' . strtolower($name) . '%');
        });
        return $next($query);
    }
}
