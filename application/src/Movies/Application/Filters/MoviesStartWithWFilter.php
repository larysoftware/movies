<?php
declare(strict_types=1);

namespace App\Movies\Application\Filters;

use App\Movies\Domain\Movie;

class MoviesStartWithWFilter extends AbstractFilterQuery
{
    public function filter(): array
    {
        return array_filter($this->getRepository()->getAll(), static function (Movie $movie) {
           return preg_match('/^W.*$/', $movie->title->getValue()) && strlen($movie->title->getValue()) % 2 === 0;
        });
    }
}