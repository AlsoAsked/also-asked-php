<?php

declare(strict_types=1);

namespace AlsoAsked\Api\Normalizer;

use AlsoAsked\Api\Runtime\Normalizer\CheckArray;
use AlsoAsked\Api\Runtime\Normalizer\ValidatorTrait;
use Jane\Component\JsonSchemaRuntime\Reference;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

if (!\class_exists(Kernel::class) || (Kernel::MAJOR_VERSION >= 7 || Kernel::MAJOR_VERSION === 6 && Kernel::MINOR_VERSION === 4)) {
    class ErrorNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(
            mixed $data,
            string $type,
            ?string $format = null,
            array $context = [],
        ): bool {
            return $type === \AlsoAsked\Api\Model\Error::class;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && $data::class === \AlsoAsked\Api\Model\Error::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }

            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \AlsoAsked\Api\Model\Error();

            if ($data === null || \is_array($data) === false) {
                return $object;
            }

            if (\array_key_exists('status', $data)) {
                $object->setStatus($data['status']);
                unset($data['status']);
            }

            if (\array_key_exists('message', $data)) {
                $object->setMessage($data['message']);
                unset($data['message']);
            }

            foreach ($data as $key => $value) {
                if (\preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value;
                }
            }

            return $object;
        }

        public function normalize(
            mixed $object,
            ?string $format = null,
            array $context = [],
        ): array|string|int|float|bool|\ArrayObject|null {
            $data = [];

            if ($object->isInitialized('status') && $object->getStatus() !== null) {
                $data['status'] = $object->getStatus();
            }

            if ($object->isInitialized('message') && $object->getMessage() !== null) {
                $data['message'] = $object->getMessage();
            }

            foreach ($object as $key => $value) {
                if (\preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [\AlsoAsked\Api\Model\Error::class => false];
        }
    }
} else {
    class ErrorNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === \AlsoAsked\Api\Model\Error::class;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && $data::class === \AlsoAsked\Api\Model\Error::class;
        }

        /**
         * @param mixed $data
         * @param mixed $type
         * @param mixed|null $format
         * @param array $context
         *
         * @return mixed
         */
        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }

            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \AlsoAsked\Api\Model\Error();

            if ($data === null || \is_array($data) === false) {
                return $object;
            }

            if (\array_key_exists('status', $data)) {
                $object->setStatus($data['status']);
                unset($data['status']);
            }

            if (\array_key_exists('message', $data)) {
                $object->setMessage($data['message']);
                unset($data['message']);
            }

            foreach ($data as $key => $value) {
                if (\preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value;
                }
            }

            return $object;
        }

        /**
         * @param mixed $object
         * @param mixed|null $format
         * @param array $context
         *
         * @return array|\ArrayObject|bool|float|int|string|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];

            if ($object->isInitialized('status') && $object->getStatus() !== null) {
                $data['status'] = $object->getStatus();
            }

            if ($object->isInitialized('message') && $object->getMessage() !== null) {
                $data['message'] = $object->getMessage();
            }

            foreach ($object as $key => $value) {
                if (\preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [\AlsoAsked\Api\Model\Error::class => false];
        }
    }
}
