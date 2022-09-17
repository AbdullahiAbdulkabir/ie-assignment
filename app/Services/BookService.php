<?php
declare(strict_types=1);

namespace App\Services;


use App\Filters\CountryFilter;
use App\Filters\NameFilter;
use App\Filters\PublisherFilter;
use App\Filters\ReleaseDateFilter;
use App\Models\Book;
use Carbon\Carbon;
use Exception;
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
    /**
     * @throws GuzzleException
     */
    public function listExternalBooks(array $values)
    {
        $url = isset($values['name']) ?
            $this->baseUrl("https://www.anapioficeandfire.com/api/books" . '?name=' . $values['name']) :
            $this->baseUrl();
        try {
            $client = new Client();
            $res = $client->request('GET', $url);
        } catch (Exception $e) {

        }
        return json_decode($res->getBody()->getContents());
    }

    public function baseUrl($url = 'https://www.anapioficeandfire.com/api/books'): string
    {
        return $url;
    }

    public function createBook(array $values)
    {
        return Book::updateOrCreate(['name' => $values['name']], [
            'name' => $values['name'],
            'isbn' => $values['isbn'],
            'authors' => json_encode($values['authors']),
            'country' => $values['country'],
            'number_of_pages' => $values['number_of_pages'],
            'publisher' => $values['publisher'],
            'release_date' => Carbon::parse($values['release_date']),
        ]);
    }

    public function listBooks()
    {
        return $this->filterParams(
            Book::query()
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
            CountryFilter::class,
            PublisherFilter::class,
            ReleaseDateFilter::class,
        ];

        return app(Pipeline::class)->send($query)
            ->through($filters)
            ->then(fn($query) => $query);
    }

    public function getBook(Book $book)
    {
        return $book->first();
    }

    public function deleteBook(Book $book): ?bool
    {
        return $book->delete();
    }

    public function updateBook(Book $book, array $values)
    {
        return $book->updateOrCreate(['name' => $values['name']], [
            'name' => $values['name'],
            'isbn' => $values['isbn'],
            'authors' => json_encode($values['authors']),
            'country' => $values['country'],
            'number_of_pages' => $values['number_of_pages'],
            'publisher' => $values['publisher'],
            'release_date' => Carbon::parse($values['release_date']),
        ]);
    }
}
