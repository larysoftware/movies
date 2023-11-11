<?php

namespace App\Movies\Infrastructure\Controller;

use App\Movies\Application\MovieFinder;
use App\Movies\Application\SearchCriteriaDto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class Movies extends AbstractController
{
    public function find(MovieFinder $movieFinder, Request $request): JsonResponse
    {
        return new JsonResponse(
            [
                'movies' => $movieFinder->findByType(
                    new SearchCriteriaDto($request->query->get('type'))
                )
            ]
        );
    }
}