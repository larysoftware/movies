<?php
declare(strict_types=1);

namespace App\Movies\Application;

use App\Movies\Application\Exception\TypeIsEmptyException;

readonly class SearchCriteriaDto
{
    public function __construct(public ?string $type)
    {
        if (!$this->type) {
            throw new TypeIsEmptyException();
        }
    }
}