<?php

declare(strict_types=1);

namespace AlsoAsked\Api\Normalizer;

use AlsoAsked\Api\Runtime\Normalizer\CheckArray;
use AlsoAsked\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

if (!\class_exists(Kernel::class) || (Kernel::MAJOR_VERSION >= 7 || Kernel::MAJOR_VERSION === 6 && Kernel::MINOR_VERSION === 4)) {
    class JaneObjectNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        protected $normalizers = [
            \AlsoAsked\Api\Model\Account::class => AccountNormalizer::class,

            \AlsoAsked\Api\Model\Error::class => ErrorNormalizer::class,

            \AlsoAsked\Api\Model\SearchRequest::class => SearchRequestNormalizer::class,

            \AlsoAsked\Api\Model\PaginatedSearchRequests::class => PaginatedSearchRequestsNormalizer::class,

            \AlsoAsked\Api\Model\SearchRequestOptions::class => SearchRequestOptionsNormalizer::class,

            \AlsoAsked\Api\Model\SearchResult::class => SearchResultNormalizer::class,

            \AlsoAsked\Api\Model\SearchQuery::class => SearchQueryNormalizer::class,

            \AlsoAsked\Api\Model\SearchRequestResults::class => SearchRequestResultsNormalizer::class,

            \Jane\Component\JsonSchemaRuntime\Reference::class => \AlsoAsked\Api\Runtime\Normalizer\ReferenceNormalizer::class,
        ];

        protected $normalizersCache = [];

        public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
        {
            return \array_key_exists($type, $this->normalizers);
        }

        public function supportsNormalization($data, $format = null, array $context = []): bool
        {
            return \is_object($data) && \array_key_exists($data::class, $this->normalizers);
        }

        public function normalize(
            mixed $object,
            ?string $format = null,
            array $context = [],
        ): array|string|int|float|bool|\ArrayObject|null {
            $normalizerClass = $this->normalizers[$object::class];
            $normalizer = $this->getNormalizer($normalizerClass);

            return $normalizer->normalize($object, $format, $context);
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            $denormalizerClass = $this->normalizers[$type];
            $denormalizer = $this->getNormalizer($denormalizerClass);

            return $denormalizer->denormalize($data, $type, $format, $context);
        }

        private function getNormalizer(string $normalizerClass)
        {
            return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
        }

        private function initNormalizer(string $normalizerClass)
        {
            $normalizer = new $normalizerClass();
            $normalizer->setNormalizer($this->normalizer);
            $normalizer->setDenormalizer($this->denormalizer);
            $this->normalizersCache[$normalizerClass] = $normalizer;

            return $normalizer;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [
                \AlsoAsked\Api\Model\Account::class => false,
                \AlsoAsked\Api\Model\Error::class => false,
                \AlsoAsked\Api\Model\SearchRequest::class => false,
                \AlsoAsked\Api\Model\PaginatedSearchRequests::class => false,
                \AlsoAsked\Api\Model\SearchRequestOptions::class => false,
                \AlsoAsked\Api\Model\SearchResult::class => false,
                \AlsoAsked\Api\Model\SearchQuery::class => false,
                \AlsoAsked\Api\Model\SearchRequestResults::class => false,
                \Jane\Component\JsonSchemaRuntime\Reference::class => false,
            ];
        }
    }
} else {
    class JaneObjectNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        protected $normalizers = [
            \AlsoAsked\Api\Model\Account::class => AccountNormalizer::class,

            \AlsoAsked\Api\Model\Error::class => ErrorNormalizer::class,

            \AlsoAsked\Api\Model\SearchRequest::class => SearchRequestNormalizer::class,

            \AlsoAsked\Api\Model\PaginatedSearchRequests::class => PaginatedSearchRequestsNormalizer::class,

            \AlsoAsked\Api\Model\SearchRequestOptions::class => SearchRequestOptionsNormalizer::class,

            \AlsoAsked\Api\Model\SearchResult::class => SearchResultNormalizer::class,

            \AlsoAsked\Api\Model\SearchQuery::class => SearchQueryNormalizer::class,

            \AlsoAsked\Api\Model\SearchRequestResults::class => SearchRequestResultsNormalizer::class,

            \Jane\Component\JsonSchemaRuntime\Reference::class => \AlsoAsked\Api\Runtime\Normalizer\ReferenceNormalizer::class,
        ];

        protected $normalizersCache = [];

        public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
        {
            return \array_key_exists($type, $this->normalizers);
        }

        public function supportsNormalization($data, $format = null, array $context = []): bool
        {
            return \is_object($data) && \array_key_exists($data::class, $this->normalizers);
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
            $normalizerClass = $this->normalizers[$object::class];
            $normalizer = $this->getNormalizer($normalizerClass);

            return $normalizer->normalize($object, $format, $context);
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
            $denormalizerClass = $this->normalizers[$type];
            $denormalizer = $this->getNormalizer($denormalizerClass);

            return $denormalizer->denormalize($data, $type, $format, $context);
        }

        private function getNormalizer(string $normalizerClass)
        {
            return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
        }

        private function initNormalizer(string $normalizerClass)
        {
            $normalizer = new $normalizerClass();
            $normalizer->setNormalizer($this->normalizer);
            $normalizer->setDenormalizer($this->denormalizer);
            $this->normalizersCache[$normalizerClass] = $normalizer;

            return $normalizer;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [
                \AlsoAsked\Api\Model\Account::class => false,
                \AlsoAsked\Api\Model\Error::class => false,
                \AlsoAsked\Api\Model\SearchRequest::class => false,
                \AlsoAsked\Api\Model\PaginatedSearchRequests::class => false,
                \AlsoAsked\Api\Model\SearchRequestOptions::class => false,
                \AlsoAsked\Api\Model\SearchResult::class => false,
                \AlsoAsked\Api\Model\SearchQuery::class => false,
                \AlsoAsked\Api\Model\SearchRequestResults::class => false,
                \Jane\Component\JsonSchemaRuntime\Reference::class => false,
            ];
        }
    }
}
