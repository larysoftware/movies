<?php
declare(strict_types=1);

namespace App\Movies\Application;

class MovieFinder
{
    public function __construct(private readonly MovieQuery $movieQuery, private readonly FilterFactory $factory)
    {
    }

    public function findByType(SearchCriteriaDto $searchCriteriaDto): array
    {
        return $this->movieQuery->getMovies($this->factory->getByType($searchCriteriaDto->type));
    }
}