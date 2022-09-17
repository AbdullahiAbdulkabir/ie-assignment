<?php
declare(strict_types=1);

namespace App\Filters;


/**
 * Class CountryFilter
 * @package App\Filters
 * @author Abdullahi Abdulkabir <abdullahiabdulkabir1@gmail.com>
 */
class CountryFilter
{
    public function handle($query, $next)
    {
        $country = request()->get('country');
        $query->when($country, function ($query, $country) {
            $query->where('country', 'LIKE', '%' . strtolower($country) . '%');
        });
        return $next($query);
    }
}
