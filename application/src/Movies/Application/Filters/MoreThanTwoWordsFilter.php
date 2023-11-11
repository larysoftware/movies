<?php

namespace App\Movies\Application\Filters;

use App\Movies\Domain\Movie;

class MoreThanTwoWordsFilter extends AbstractFilterQuery
{
    public function filter(): array
    {
        return array_filter($this->getRepository()->getAll(), static function (Movie $movie) {
            return preg_match('/^\s*[\p{L}\d]+(?:\s[\p{L}\d]+)+\s*$/u', $movie->title);
        });
    }
}