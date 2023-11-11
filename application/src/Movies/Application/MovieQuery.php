<?php
declare(strict_types=1);

namespace App\Movies\Application;

use App\Movies\Application\Filters\FilterQueryInterface;
use App\Movies\Domain\Movie;
use App\Movies\Domain\MoviesRepositoryInterface;

class MovieQuery
{

    public function __construct(private readonly MoviesRepositoryInterface $moviesRepository)
    {
    }

    public function getMovies(FilterQueryInterface $filterQuery): array
    {
        return $this->mapToResult($filterQuery->setRepository($this->moviesRepository)->filter());
    }

    private function mapToResult(array $movies): array
    {
        return array_values(
            array_map(static function (Movie $movie) {
                return new MovieResult($movie->title->getValue());
            }, $movies)
        );
    }
}