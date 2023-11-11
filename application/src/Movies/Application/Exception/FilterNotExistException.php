<?php
declare(strict_types=1);

namespace App\Movies\Application\Exception;

class FilterNotExistException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Filter not found');
    }
}