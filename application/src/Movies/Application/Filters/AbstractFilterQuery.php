<?php

namespace App\Movies\Application\Filters;

use App\Movies\Domain\MoviesRepositoryInterface;

abstract class AbstractFilterQuery implements FilterQueryInterface
{
    private MoviesRepositoryInterface $moviesRepository;

    public function getRepository(): MoviesRepositoryInterface
    {
        return $this->moviesRepository;
    }

    public function setRepository(MoviesRepositoryInterface $moviesRepository): self
    {
        $this->moviesRepository = $moviesRepository;
        return $this;
    }

    abstract function filter(): array;
}