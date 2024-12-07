<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class PocController
{
    #[Route('/poc/success', name: 'poc_success', methods: ['GET'])]
    public function successAction(): JsonResponse
    {
        return new JsonResponse([ 'success' => true ]);
    }

    #[Route('/poc/timeout', name: 'poc_failure', methods: ['GET'])]
    public function timeoutAction()
    {
//        ini_set('display_errors', '0');
        set_time_limit(5);

        // hopefully this will exceed 5 seconds of maximum allowed time for script execution:
        $idx = 0;
        while ($idx < 9223372036854775807) {
            $idx++;
        }
    }
}