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
    class SearchRequestOptionsNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
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
            return $type === \AlsoAsked\Api\Model\SearchRequestOptions::class;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && $data::class === \AlsoAsked\Api\Model\SearchRequestOptions::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }

            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \AlsoAsked\Api\Model\SearchRequestOptions();

            if (\array_key_exists('latitude', $data) && \is_int($data['latitude'])) {
                $data['latitude'] = (float) $data['latitude'];
            }

            if (\array_key_exists('longitude', $data) && \is_int($data['longitude'])) {
                $data['longitude'] = (float) $data['longitude'];
            }

            if ($data === null || \is_array($data) === false) {
                return $object;
            }

            if (\array_key_exists('terms', $data)) {
                $values = [];

                foreach ($data['terms'] as $value) {
                    $values[] = $value;
                }
                $object->setTerms($values);
                unset($data['terms']);
            }

            if (\array_key_exists('language', $data)) {
                $object->setLanguage($data['language']);
                unset($data['language']);
            }

            if (\array_key_exists('region', $data)) {
                $object->setRegion($data['region']);
                unset($data['region']);
            }

            if (\array_key_exists('depth', $data)) {
                $object->setDepth($data['depth']);
                unset($data['depth']);
            }

            if (\array_key_exists('fresh', $data)) {
                $object->setFresh($data['fresh']);
                unset($data['fresh']);
            }

            if (\array_key_exists('async', $data)) {
                $object->setAsync($data['async']);
                unset($data['async']);
            }

            if (\array_key_exists('notify_webhooks', $data)) {
                $object->setNotifyWebhooks($data['notify_webhooks']);
                unset($data['notify_webhooks']);
            }

            if (\array_key_exists('latitude', $data)) {
                $object->setLatitude($data['latitude']);
                unset($data['latitude']);
            }

            if (\array_key_exists('longitude', $data)) {
                $object->setLongitude($data['longitude']);
                unset($data['longitude']);
            }

            foreach ($data as $key => $value_1) {
                if (\preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_1;
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
            $values = [];

            foreach ($object->getTerms() as $value) {
                $values[] = $value;
            }
            $data['terms'] = $values;

            if ($object->isInitialized('language') && $object->getLanguage() !== null) {
                $data['language'] = $object->getLanguage();
            }

            if ($object->isInitialized('region') && $object->getRegion() !== null) {
                $data['region'] = $object->getRegion();
            }

            if ($object->isInitialized('depth') && $object->getDepth() !== null) {
                $data['depth'] = $object->getDepth();
            }

            if ($object->isInitialized('fresh') && $object->getFresh() !== null) {
                $data['fresh'] = $object->getFresh();
            }

            if ($object->isInitialized('async') && $object->getAsync() !== null) {
                $data['async'] = $object->getAsync();
            }

            if ($object->isInitialized('notifyWebhooks') && $object->getNotifyWebhooks() !== null) {
                $data['notify_webhooks'] = $object->getNotifyWebhooks();
            }

            if ($object->isInitialized('latitude') && $object->getLatitude() !== null) {
                $data['latitude'] = $object->getLatitude();
            }

            if ($object->isInitialized('longitude') && $object->getLongitude() !== null) {
                $data['longitude'] = $object->getLongitude();
            }

            foreach ($object as $key => $value_1) {
                if (\preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [\AlsoAsked\Api\Model\SearchRequestOptions::class => false];
        }
    }
} else {
    class SearchRequestOptionsNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === \AlsoAsked\Api\Model\SearchRequestOptions::class;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && $data::class === \AlsoAsked\Api\Model\SearchRequestOptions::class;
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
            $object = new \AlsoAsked\Api\Model\SearchRequestOptions();

            if (\array_key_exists('latitude', $data) && \is_int($data['latitude'])) {
                $data['latitude'] = (float) $data['latitude'];
            }

            if (\array_key_exists('longitude', $data) && \is_int($data['longitude'])) {
                $data['longitude'] = (float) $data['longitude'];
            }

            if ($data === null || \is_array($data) === false) {
                return $object;
            }

            if (\array_key_exists('terms', $data)) {
                $values = [];

                foreach ($data['terms'] as $value) {
                    $values[] = $value;
                }
                $object->setTerms($values);
                unset($data['terms']);
            }

            if (\array_key_exists('language', $data)) {
                $object->setLanguage($data['language']);
                unset($data['language']);
            }

            if (\array_key_exists('region', $data)) {
                $object->setRegion($data['region']);
                unset($data['region']);
            }

            if (\array_key_exists('depth', $data)) {
                $object->setDepth($data['depth']);
                unset($data['depth']);
            }

            if (\array_key_exists('fresh', $data)) {
                $object->setFresh($data['fresh']);
                unset($data['fresh']);
            }

            if (\array_key_exists('async', $data)) {
                $object->setAsync($data['async']);
                unset($data['async']);
            }

            if (\array_key_exists('notify_webhooks', $data)) {
                $object->setNotifyWebhooks($data['notify_webhooks']);
                unset($data['notify_webhooks']);
            }

            if (\array_key_exists('latitude', $data)) {
                $object->setLatitude($data['latitude']);
                unset($data['latitude']);
            }

            if (\array_key_exists('longitude', $data)) {
                $object->setLongitude($data['longitude']);
                unset($data['longitude']);
            }

            foreach ($data as $key => $value_1) {
                if (\preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_1;
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
            $values = [];

            foreach ($object->getTerms() as $value) {
                $values[] = $value;
            }
            $data['terms'] = $values;

            if ($object->isInitialized('language') && $object->getLanguage() !== null) {
                $data['language'] = $object->getLanguage();
            }

            if ($object->isInitialized('region') && $object->getRegion() !== null) {
                $data['region'] = $object->getRegion();
            }

            if ($object->isInitialized('depth') && $object->getDepth() !== null) {
                $data['depth'] = $object->getDepth();
            }

            if ($object->isInitialized('fresh') && $object->getFresh() !== null) {
                $data['fresh'] = $object->getFresh();
            }

            if ($object->isInitialized('async') && $object->getAsync() !== null) {
                $data['async'] = $object->getAsync();
            }

            if ($object->isInitialized('notifyWebhooks') && $object->getNotifyWebhooks() !== null) {
                $data['notify_webhooks'] = $object->getNotifyWebhooks();
            }

            if ($object->isInitialized('latitude') && $object->getLatitude() !== null) {
                $data['latitude'] = $object->getLatitude();
            }

            if ($object->isInitialized('longitude') && $object->getLongitude() !== null) {
                $data['longitude'] = $object->getLongitude();
            }

            foreach ($object as $key => $value_1) {
                if (\preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [\AlsoAsked\Api\Model\SearchRequestOptions::class => false];
        }
    }
}
