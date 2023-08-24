<?php

declare(strict_types=1);

namespace AlsoAsked\Api\Normalizer;

use AlsoAsked\Api\Runtime\Normalizer\CheckArray;
use AlsoAsked\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class JaneObjectNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    protected $normalizers = ['AlsoAsked\\Api\\Model\\Account' => 'AlsoAsked\\Api\\Normalizer\\AccountNormalizer', 'AlsoAsked\\Api\\Model\\Error' => 'AlsoAsked\\Api\\Normalizer\\ErrorNormalizer', 'AlsoAsked\\Api\\Model\\SearchRequest' => 'AlsoAsked\\Api\\Normalizer\\SearchRequestNormalizer', 'AlsoAsked\\Api\\Model\\PaginatedSearchRequests' => 'AlsoAsked\\Api\\Normalizer\\PaginatedSearchRequestsNormalizer', 'AlsoAsked\\Api\\Model\\SearchRequestOptions' => 'AlsoAsked\\Api\\Normalizer\\SearchRequestOptionsNormalizer', 'AlsoAsked\\Api\\Model\\SearchResult' => 'AlsoAsked\\Api\\Normalizer\\SearchResultNormalizer', 'AlsoAsked\\Api\\Model\\SearchQuery' => 'AlsoAsked\\Api\\Normalizer\\SearchQueryNormalizer', 'AlsoAsked\\Api\\Model\\SearchRequestResults' => 'AlsoAsked\\Api\\Normalizer\\SearchRequestResultsNormalizer', '\\Jane\\Component\\JsonSchemaRuntime\\Reference' => '\\AlsoAsked\\Api\\Runtime\\Normalizer\\ReferenceNormalizer'];

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
     * @param mixed $class
     * @param mixed|null $format
     * @param array $context
     *
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $denormalizerClass = $this->normalizers[$class];
        $denormalizer = $this->getNormalizer($denormalizerClass);

        return $denormalizer->denormalize($data, $class, $format, $context);
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
        return ['AlsoAsked\\Api\\Model\\Account' => false, 'AlsoAsked\\Api\\Model\\Error' => false, 'AlsoAsked\\Api\\Model\\SearchRequest' => false, 'AlsoAsked\\Api\\Model\\PaginatedSearchRequests' => false, 'AlsoAsked\\Api\\Model\\SearchRequestOptions' => false, 'AlsoAsked\\Api\\Model\\SearchResult' => false, 'AlsoAsked\\Api\\Model\\SearchQuery' => false, 'AlsoAsked\\Api\\Model\\SearchRequestResults' => false, '\\Jane\\Component\\JsonSchemaRuntime\\Reference' => false];
    }
}
