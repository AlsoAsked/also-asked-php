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
    class SearchRequestResultsNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
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
            return $type === \AlsoAsked\Api\Model\SearchRequestResults::class;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && $data::class === \AlsoAsked\Api\Model\SearchRequestResults::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }

            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \AlsoAsked\Api\Model\SearchRequestResults();

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

            if (\array_key_exists('queries', $data) && $data['queries'] !== null) {
                $values = [];

                foreach ($data['queries'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, \AlsoAsked\Api\Model\SearchQuery::class, 'json', $context);
                }
                $object->setQueries($values);
                unset($data['queries']);
            } elseif (\array_key_exists('queries', $data) && $data['queries'] === null) {
                $object->setQueries(null);
            }

            if (\array_key_exists('language', $data) && $data['language'] !== null) {
                $object->setLanguage($data['language']);
                unset($data['language']);
            } elseif (\array_key_exists('language', $data) && $data['language'] === null) {
                $object->setLanguage(null);
            }

            if (\array_key_exists('region', $data) && $data['region'] !== null) {
                $object->setRegion($data['region']);
                unset($data['region']);
            } elseif (\array_key_exists('region', $data) && $data['region'] === null) {
                $object->setRegion(null);
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

            if (\array_key_exists('status', $data) && $data['status'] !== null) {
                $object->setStatus($data['status']);
                unset($data['status']);
            } elseif (\array_key_exists('status', $data) && $data['status'] === null) {
                $object->setStatus(null);
            }

            if (\array_key_exists('deleted', $data)) {
                $object->setDeleted($data['deleted']);
                unset($data['deleted']);
            }

            if (\array_key_exists('depth', $data) && $data['depth'] !== null) {
                $object->setDepth($data['depth']);
                unset($data['depth']);
            } elseif (\array_key_exists('depth', $data) && $data['depth'] === null) {
                $object->setDepth(null);
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

            if (\array_key_exists('cached_at', $data) && $data['cached_at'] !== null) {
                $object->setCachedAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['cached_at']));
                unset($data['cached_at']);
            } elseif (\array_key_exists('cached_at', $data) && $data['cached_at'] === null) {
                $object->setCachedAt(null);
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

            if ($object->isInitialized('id') && $object->getId() !== null) {
                $data['id'] = $object->getId();
            }

            if ($object->isInitialized('queries') && $object->getQueries() !== null) {
                $values = [];

                foreach ($object->getQueries() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['queries'] = $values;
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
                $data['cached_at'] = $object->getCachedAt()->format('Y-m-d\TH:i:sP');
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
            return [\AlsoAsked\Api\Model\SearchRequestResults::class => false];
        }
    }
} else {
    class SearchRequestResultsNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === \AlsoAsked\Api\Model\SearchRequestResults::class;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && $data::class === \AlsoAsked\Api\Model\SearchRequestResults::class;
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
            $object = new \AlsoAsked\Api\Model\SearchRequestResults();

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

            if (\array_key_exists('queries', $data) && $data['queries'] !== null) {
                $values = [];

                foreach ($data['queries'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, \AlsoAsked\Api\Model\SearchQuery::class, 'json', $context);
                }
                $object->setQueries($values);
                unset($data['queries']);
            } elseif (\array_key_exists('queries', $data) && $data['queries'] === null) {
                $object->setQueries(null);
            }

            if (\array_key_exists('language', $data) && $data['language'] !== null) {
                $object->setLanguage($data['language']);
                unset($data['language']);
            } elseif (\array_key_exists('language', $data) && $data['language'] === null) {
                $object->setLanguage(null);
            }

            if (\array_key_exists('region', $data) && $data['region'] !== null) {
                $object->setRegion($data['region']);
                unset($data['region']);
            } elseif (\array_key_exists('region', $data) && $data['region'] === null) {
                $object->setRegion(null);
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

            if (\array_key_exists('status', $data) && $data['status'] !== null) {
                $object->setStatus($data['status']);
                unset($data['status']);
            } elseif (\array_key_exists('status', $data) && $data['status'] === null) {
                $object->setStatus(null);
            }

            if (\array_key_exists('deleted', $data)) {
                $object->setDeleted($data['deleted']);
                unset($data['deleted']);
            }

            if (\array_key_exists('depth', $data) && $data['depth'] !== null) {
                $object->setDepth($data['depth']);
                unset($data['depth']);
            } elseif (\array_key_exists('depth', $data) && $data['depth'] === null) {
                $object->setDepth(null);
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

            if (\array_key_exists('cached_at', $data) && $data['cached_at'] !== null) {
                $object->setCachedAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['cached_at']));
                unset($data['cached_at']);
            } elseif (\array_key_exists('cached_at', $data) && $data['cached_at'] === null) {
                $object->setCachedAt(null);
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

            if ($object->isInitialized('id') && $object->getId() !== null) {
                $data['id'] = $object->getId();
            }

            if ($object->isInitialized('queries') && $object->getQueries() !== null) {
                $values = [];

                foreach ($object->getQueries() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['queries'] = $values;
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
                $data['cached_at'] = $object->getCachedAt()->format('Y-m-d\TH:i:sP');
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
            return [\AlsoAsked\Api\Model\SearchRequestResults::class => false];
        }
    }
}
