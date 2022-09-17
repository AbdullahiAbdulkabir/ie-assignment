<?php
declare(strict_types=1);

namespace App\Filters;


/**
 * Class PhoneFilter
 * @package App\Filters
 * @author Abdullahi Abdulkabir <abdullahiabdulkabir1@gmail.com>
 */
class PhoneFilter
{

    public function handle($query, $next)
    {
        $phone = request()->get('phone');
        $query->when($phone, function ($query, $phone) {
            $query->where('phone', 'LIKE', '%' . $phone . '%');
        });
        return $next($query);
    }
}
