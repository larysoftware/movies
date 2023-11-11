<?php

namespace App\Movies\Domain;

interface MoviesRepositoryInterface
{
    public function getAll(): array;
}