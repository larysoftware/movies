<?php
declare(strict_types=1);

namespace App\Movies\Application\Filters;

use App\Movies\Domain\MoviesRepositoryInterface;

interface FilterQueryInterface
{
    public function setRepository(MoviesRepositoryInterface $moviesRepository): self;

    public function getRepository(): MoviesRepositoryInterface;
    public function filter(): array;
}