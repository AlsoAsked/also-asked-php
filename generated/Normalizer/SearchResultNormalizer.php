<?php

declare(strict_types=1);

namespace AlsoAsked\Api\Normalizer;

use AlsoAsked\Api\Runtime\Normalizer\CheckArray;
use AlsoAsked\Api\Runtime\Normalizer\ValidatorTrait;
use Jane\Component\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class SearchResultNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'AlsoAsked\\Api\\Model\\SearchResult';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === 'AlsoAsked\\Api\\Model\\SearchResult';
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
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }

        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \AlsoAsked\Api\Model\SearchResult();

        if ($data === null || \is_array($data) === false) {
            return $object;
        }

        if (\array_key_exists('question', $data)) {
            $object->setQuestion($data['question']);
            unset($data['question']);
        }

        if (\array_key_exists('answer_excerpt', $data)) {
            $object->setAnswerExcerpt($data['answer_excerpt']);
            unset($data['answer_excerpt']);
        }

        if (\array_key_exists('answer_href', $data)) {
            $object->setAnswerHref($data['answer_href']);
            unset($data['answer_href']);
        }

        if (\array_key_exists('answer_page_title', $data)) {
            $object->setAnswerPageTitle($data['answer_page_title']);
            unset($data['answer_page_title']);
        }

        if (\array_key_exists('results', $data)) {
            $values = [];

            foreach ($data['results'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'AlsoAsked\\Api\\Model\\SearchResult', 'json', $context);
            }
            $object->setResults($values);
            unset($data['results']);
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

        if ($object->isInitialized('question') && $object->getQuestion() !== null) {
            $data['question'] = $object->getQuestion();
        }

        if ($object->isInitialized('answerExcerpt') && $object->getAnswerExcerpt() !== null) {
            $data['answer_excerpt'] = $object->getAnswerExcerpt();
        }

        if ($object->isInitialized('answerHref') && $object->getAnswerHref() !== null) {
            $data['answer_href'] = $object->getAnswerHref();
        }

        if ($object->isInitialized('answerPageTitle') && $object->getAnswerPageTitle() !== null) {
            $data['answer_page_title'] = $object->getAnswerPageTitle();
        }

        if ($object->isInitialized('results') && $object->getResults() !== null) {
            $values = [];

            foreach ($object->getResults() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['results'] = $values;
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
        return ['AlsoAsked\\Api\\Model\\SearchResult' => false];
    }
}
