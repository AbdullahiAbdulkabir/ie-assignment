<?php
declare(strict_types=1);

namespace App\Filters;


/**
 * Class ReleaseDateFilter
 * @package App\Filters
 * @author Abdullahi Abdulkabir <abdullahiabdulkabir1@gmail.com>
 */
class ReleaseDateFilter
{

    public function handle($query, $next)
    {
        $releaseDate = request()->get('release_date');
        $query->when($releaseDate, function ($query, $releaseDate) {
            $query->whereYear('release_date', $releaseDate);
        });
        return $next($query);
    }
}
