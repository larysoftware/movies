<?php
declare(strict_types=1);

namespace App\Movies\Domain;
class Movie
{
    public function __construct(public MovieTitle $title)
    {
    }
}