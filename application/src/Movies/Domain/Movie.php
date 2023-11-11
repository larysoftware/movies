<?php
declare(strict_types=1);

namespace App\Movies\Domain;

readonly class Movie
{
    public function __construct(public string $title)
    {
    }
}