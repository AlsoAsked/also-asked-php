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
    class SearchRequestNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
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
            return $type === \AlsoAsked\Api\Model\SearchRequest::class;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && $data::class === \AlsoAsked\Api\Model\SearchRequest::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }

            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \AlsoAsked\Api\Model\SearchRequest();

            if (\array_key_exists('latitude', $data) && \is_int($data['latitude'])) {
                $data['latitude'] = (float) $data['latitude'];
            }

            if (\array_key_exists('longitude', $data) && \is_int($data['longitude'])) {
                $data['longitude'] = (float) $data['longitude'];
            }

            if ($data === null || \is_array($data) === false) {
                return $object;
            }

            if (\array_key_exists('id', $data)) {
                $object->setId($data['id']);
                unset($data['id']);
            }

            if (\array_key_exists('terms', $data)) {
                $object->setTerms($data['terms']);
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

            if (\array_key_exists('latitude', $data) && $data['latitude'] !== null) {
                $object->setLatitude($data['latitude']);
                unset($data['latitude']);
            } elseif (\array_key_exists('latitude', $data) && $data['latitude'] === null) {
                $object->setLatitude(null);
            }

            if (\array_key_exists('longitude', $data) && $data['longitude'] !== null) {
                $object->setLongitude($data['longitude']);
                unset($data['longitude']);
            } elseif (\array_key_exists('longitude', $data) && $data['longitude'] === null) {
                $object->setLongitude(null);
            }

            if (\array_key_exists('status', $data)) {
                $object->setStatus($data['status']);
                unset($data['status']);
            }

            if (\array_key_exists('deleted', $data)) {
                $object->setDeleted($data['deleted']);
                unset($data['deleted']);
            }

            if (\array_key_exists('depth', $data)) {
                $object->setDepth($data['depth']);
                unset($data['depth']);
            }

            if (\array_key_exists('cached', $data) && $data['cached'] !== null) {
                $object->setCached($data['cached']);
                unset($data['cached']);
            } elseif (\array_key_exists('cached', $data) && $data['cached'] === null) {
                $object->setCached(null);
            }

            if (\array_key_exists('created_at', $data)) {
                $object->setCreatedAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['created_at']));
                unset($data['created_at']);
            }

            if (\array_key_exists('updated_at', $data)) {
                $object->setUpdatedAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['updated_at']));
                unset($data['updated_at']);
            }

            if (\array_key_exists('cached_at', $data)) {
                $object->setCachedAt($data['cached_at']);
                unset($data['cached_at']);
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

            if ($object->isInitialized('id') && $object->getId() !== null) {
                $data['id'] = $object->getId();
            }

            if ($object->isInitialized('terms') && $object->getTerms() !== null) {
                $data['terms'] = $object->getTerms();
            }

            if ($object->isInitialized('language') && $object->getLanguage() !== null) {
                $data['language'] = $object->getLanguage();
            }

            if ($object->isInitialized('region') && $object->getRegion() !== null) {
                $data['region'] = $object->getRegion();
            }

            if ($object->isInitialized('latitude') && $object->getLatitude() !== null) {
                $data['latitude'] = $object->getLatitude();
            }

            if ($object->isInitialized('longitude') && $object->getLongitude() !== null) {
                $data['longitude'] = $object->getLongitude();
            }

            if ($object->isInitialized('status') && $object->getStatus() !== null) {
                $data['status'] = $object->getStatus();
            }

            if ($object->isInitialized('deleted') && $object->getDeleted() !== null) {
                $data['deleted'] = $object->getDeleted();
            }

            if ($object->isInitialized('depth') && $object->getDepth() !== null) {
                $data['depth'] = $object->getDepth();
            }

            if ($object->isInitialized('cached') && $object->getCached() !== null) {
                $data['cached'] = $object->getCached();
            }

            if ($object->isInitialized('createdAt') && $object->getCreatedAt() !== null) {
                $data['created_at'] = $object->getCreatedAt()?->format('Y-m-d\TH:i:sP');
            }

            if ($object->isInitialized('updatedAt') && $object->getUpdatedAt() !== null) {
                $data['updated_at'] = $object->getUpdatedAt()?->format('Y-m-d\TH:i:sP');
            }

            if ($object->isInitialized('cachedAt') && $object->getCachedAt() !== null) {
                $data['cached_at'] = $object->getCachedAt();
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
            return [\AlsoAsked\Api\Model\SearchRequest::class => false];
        }
    }
} else {
    class SearchRequestNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === \AlsoAsked\Api\Model\SearchRequest::class;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && $data::class === \AlsoAsked\Api\Model\SearchRequest::class;
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
            $object = new \AlsoAsked\Api\Model\SearchRequest();

            if (\array_key_exists('latitude', $data) && \is_int($data['latitude'])) {
                $data['latitude'] = (float) $data['latitude'];
            }

            if (\array_key_exists('longitude', $data) && \is_int($data['longitude'])) {
                $data['longitude'] = (float) $data['longitude'];
            }

            if ($data === null || \is_array($data) === false) {
                return $object;
            }

            if (\array_key_exists('id', $data)) {
                $object->setId($data['id']);
                unset($data['id']);
            }

            if (\array_key_exists('terms', $data)) {
                $object->setTerms($data['terms']);
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

            if (\array_key_exists('latitude', $data) && $data['latitude'] !== null) {
                $object->setLatitude($data['latitude']);
                unset($data['latitude']);
            } elseif (\array_key_exists('latitude', $data) && $data['latitude'] === null) {
                $object->setLatitude(null);
            }

            if (\array_key_exists('longitude', $data) && $data['longitude'] !== null) {
                $object->setLongitude($data['longitude']);
                unset($data['longitude']);
            } elseif (\array_key_exists('longitude', $data) && $data['longitude'] === null) {
                $object->setLongitude(null);
            }

            if (\array_key_exists('status', $data)) {
                $object->setStatus($data['status']);
                unset($data['status']);
            }

            if (\array_key_exists('deleted', $data)) {
                $object->setDeleted($data['deleted']);
                unset($data['deleted']);
            }

            if (\array_key_exists('depth', $data)) {
                $object->setDepth($data['depth']);
                unset($data['depth']);
            }

            if (\array_key_exists('cached', $data) && $data['cached'] !== null) {
                $object->setCached($data['cached']);
                unset($data['cached']);
            } elseif (\array_key_exists('cached', $data) && $data['cached'] === null) {
                $object->setCached(null);
            }

            if (\array_key_exists('created_at', $data)) {
                $object->setCreatedAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['created_at']));
                unset($data['created_at']);
            }

            if (\array_key_exists('updated_at', $data)) {
                $object->setUpdatedAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['updated_at']));
                unset($data['updated_at']);
            }

            if (\array_key_exists('cached_at', $data)) {
                $object->setCachedAt($data['cached_at']);
                unset($data['cached_at']);
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

            if ($object->isInitialized('id') && $object->getId() !== null) {
                $data['id'] = $object->getId();
            }

            if ($object->isInitialized('terms') && $object->getTerms() !== null) {
                $data['terms'] = $object->getTerms();
            }

            if ($object->isInitialized('language') && $object->getLanguage() !== null) {
                $data['language'] = $object->getLanguage();
            }

            if ($object->isInitialized('region') && $object->getRegion() !== null) {
                $data['region'] = $object->getRegion();
            }

            if ($object->isInitialized('latitude') && $object->getLatitude() !== null) {
                $data['latitude'] = $object->getLatitude();
            }

            if ($object->isInitialized('longitude') && $object->getLongitude() !== null) {
                $data['longitude'] = $object->getLongitude();
            }

            if ($object->isInitialized('status') && $object->getStatus() !== null) {
                $data['status'] = $object->getStatus();
            }

            if ($object->isInitialized('deleted') && $object->getDeleted() !== null) {
                $data['deleted'] = $object->getDeleted();
            }

            if ($object->isInitialized('depth') && $object->getDepth() !== null) {
                $data['depth'] = $object->getDepth();
            }

            if ($object->isInitialized('cached') && $object->getCached() !== null) {
                $data['cached'] = $object->getCached();
            }

            if ($object->isInitialized('createdAt') && $object->getCreatedAt() !== null) {
                $data['created_at'] = $object->getCreatedAt()?->format('Y-m-d\TH:i:sP');
            }

            if ($object->isInitialized('updatedAt') && $object->getUpdatedAt() !== null) {
                $data['updated_at'] = $object->getUpdatedAt()?->format('Y-m-d\TH:i:sP');
            }

            if ($object->isInitialized('cachedAt') && $object->getCachedAt() !== null) {
                $data['cached_at'] = $object->getCachedAt();
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
            return [\AlsoAsked\Api\Model\SearchRequest::class => false];
        }
    }
}
