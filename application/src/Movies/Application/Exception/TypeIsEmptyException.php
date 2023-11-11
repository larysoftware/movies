<?php
declare(strict_types=1);

namespace App\Movies\Application\Exception;

class TypeIsEmptyException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Type is empty');
    }
}