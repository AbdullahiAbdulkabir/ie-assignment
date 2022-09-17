<?php
declare(strict_types=1);

namespace App\Filters;


/**
 * Class PublisherFilter
 * @package App\Filters
 * @author Abdullahi Abdulkabir <abdullahiabdulkabir1@gmail.com>
 */
class PublisherFilter
{

    public function handle($query, $next)
    {
        $publisher = request()->get('publisher');
        $query->when($publisher, function ($query, $publisher) {
            $query->where('publisher', 'LIKE', '%' . $publisher . '%');
        });
        return $next($query);
    }
}
