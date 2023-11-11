<?php

namespace App\Movies\Domain;

readonly class MovieTitle
{
    public function __construct(private string $title)
    {
    }

    public function getValue(): string
    {
        return $this->title;
    }

    public function __toString(): string
    {
        return $this->getValue();
    }
}