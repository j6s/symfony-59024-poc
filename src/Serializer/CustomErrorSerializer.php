<?php

namespace App\Serializer;

use Symfony\Component\ErrorHandler\Exception\FlattenException;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CustomErrorSerializer implements NormalizerInterface
{
    public function normalize($exception, ?string $format = null, array $context = []): array
    {
        return [
            'content' => 'This is my custom problem normalizer.',
            'exception'=> [
                'message' => $exception->getMessage(),
                'code' => $exception->getStatusCode(),
            ],
        ];
    }

    public function supportsNormalization($data, ?string $format = null, array $context = []): bool
    {
        return $data instanceof FlattenException;
    }

    public function getSupportedTypes(?string $format): array
    {
        return [ FlattenException::class => false ];
    }
}