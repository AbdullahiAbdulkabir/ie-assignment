<?php
declare(strict_types=1);

namespace App\Filters;


/**
 * Class AddressFilter
 * @package App\Filters
 * @author Abdullahi Abdulkabir <abdullahiabdulkabir1@gmail.com>
 */
class AddressFilter
{

    public function handle($query, $next)
    {
        $address = request()->get('address');
        $query->when($address, function ($query, $address) {
            $query->where('address', 'LIKE', '%' . strtolower($address) . '%');
        });
        return $next($query);
    }
}
