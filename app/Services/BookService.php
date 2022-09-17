<?php
declare(strict_types=1);

namespace App\Services;


use App\Filters\NameFilter;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pipeline\Pipeline;

/**
 * Class BookService
 * @package App\Services
 * @author Abdullahi Abdulkabir <abdullahiabdulkabir1@gmail.com>
 */
class BookService
{
    public function baseUrl($url = 'https://www.anapioficeandfire.com/api/books'): string
    {
        return $url;
    }

    /**
     * @throws GuzzleException
     */
    public function listExternalBooks($values)
    {
        $url = isset($values['name']) ?
            $this->baseUrl("https://www.anapioficeandfire.com/api/books" . '?name=' . $values['name']) :
            $this->baseUrl();
        try {
            $client = new Client();
            $res = $client->request('GET', $url);
        } catch (\Exception $e) {

        }
        return json_decode($res->getBody()->getContents());
    }

    public function listBooks()
    {
        return $this->filterParams(
            User::all()
        )->get();
    }

    /**
     * @param Builder $query
     * @param array $filters
     * @return mixed
     */
    protected function filterParams(Builder $query, array $filters = []): mixed
    {
        //add more filters here
        $filters = !empty($filters) ? [...$filters] : [
            NameFilter::class,
        ];

        return app(Pipeline::class)->send($query)
            ->through($filters)
            ->then(fn($query) => $query);
    }
}
