<?php
declare(strict_types=1);

namespace App\Movies\Domain;

interface MoviesRepositoryInterface
{
    public function getAll(): array;
}