<?php
declare(strict_types=1);

namespace App\Movies\Application\Filters;
class RandomFilter extends AbstractFilterQuery
{
    public function filter(): array
    {
        $movies = $this->getRepository()->getAll();
        shuffle($movies);
        return array_slice($movies, 0, 3);
    }
}