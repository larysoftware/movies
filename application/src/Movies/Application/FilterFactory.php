<?php
declare(strict_types=1);

namespace App\Movies\Application;

use App\Movies\Application\Exception\FilterNotExistException;
use App\Movies\Application\Filters\FilterQueryInterface;
use App\Movies\Application\Filters\MoreThanTwoWordsFilter;
use App\Movies\Application\Filters\MoviesStartWithWFilter;
use App\Movies\Application\Filters\RandomFilter;

class FilterFactory
{
    public function getByType(string $type): FilterQueryInterface
    {
        return match ($type) {
            'random' => new RandomFilter(),
            'startWithW' => new MoviesStartWithWFilter(),
            'moreThanTwoWords' => new MoreThanTwoWordsFilter(),
            default => throw new FilterNotExistException(),
        };
    }
}