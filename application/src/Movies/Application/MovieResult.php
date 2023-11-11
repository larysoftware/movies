<?php
declare(strict_types=1);

namespace App\Movies\Application;

class MovieResult implements \JsonSerializable
{
    public function __construct(private readonly string $title)
    {
    }

    public function jsonSerialize(): array
    {
        return [
          'title' => $this->title
        ];
    }
}