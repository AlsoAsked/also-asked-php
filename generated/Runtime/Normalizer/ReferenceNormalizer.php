<?php

declare(strict_types=1);

namespace AlsoAsked\Api\Runtime\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

if (Kernel::MAJOR_VERSION >= 7 || Kernel::MAJOR_VERSION === 6 && Kernel::MINOR_VERSION === 4) {
    class ReferenceNormalizer implements NormalizerInterface
    {
        /**
         * @inheritDoc
         */
        public function normalize(
            mixed $object,
            ?string $format = null,
            array $context = [],
        ): array|string|int|float|bool|\ArrayObject|null {
            $ref = [];
            $ref['$ref'] = (string) $object->getReferenceUri();

            return $ref;
        }

        /**
         * @inheritDoc
         */
        public function supportsNormalization($data, $format = null): bool
        {
            return $data instanceof Reference;
        }
    }
} else {
    class ReferenceNormalizer implements NormalizerInterface
    {
        /**
         * @inheritDoc
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $ref = [];
            $ref['$ref'] = (string) $object->getReferenceUri();

            return $ref;
        }

        /**
         * @inheritDoc
         */
        public function supportsNormalization($data, $format = null): bool
        {
            return $data instanceof Reference;
        }
    }
}
