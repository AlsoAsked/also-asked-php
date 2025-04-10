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
    class AccountNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
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
            return $type === \AlsoAsked\Api\Model\Account::class;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && $data::class === \AlsoAsked\Api\Model\Account::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }

            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \AlsoAsked\Api\Model\Account();

            if ($data === null || \is_array($data) === false) {
                return $object;
            }

            if (\array_key_exists('id', $data)) {
                $object->setId($data['id']);
                unset($data['id']);
            }

            if (\array_key_exists('name', $data)) {
                $object->setName($data['name']);
                unset($data['name']);
            }

            if (\array_key_exists('email', $data)) {
                $object->setEmail($data['email']);
                unset($data['email']);
            }

            if (\array_key_exists('plan_type', $data)) {
                $object->setPlanType($data['plan_type']);
                unset($data['plan_type']);
            }

            if (\array_key_exists('credits', $data)) {
                $object->setCredits($data['credits']);
                unset($data['credits']);
            }

            if (\array_key_exists('web_credits', $data)) {
                $object->setWebCredits($data['web_credits']);
                unset($data['web_credits']);
            }

            if (\array_key_exists('api_credits', $data)) {
                $object->setApiCredits($data['api_credits']);
                unset($data['api_credits']);
            }

            if (\array_key_exists('credits_reset_at', $data)) {
                $object->setCreditsResetAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['credits_reset_at']));
                unset($data['credits_reset_at']);
            }

            if (\array_key_exists('registered_at', $data)) {
                $object->setRegisteredAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['registered_at']));
                unset($data['registered_at']);
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

            if ($object->isInitialized('name') && $object->getName() !== null) {
                $data['name'] = $object->getName();
            }

            if ($object->isInitialized('email') && $object->getEmail() !== null) {
                $data['email'] = $object->getEmail();
            }

            if ($object->isInitialized('planType') && $object->getPlanType() !== null) {
                $data['plan_type'] = $object->getPlanType();
            }

            if ($object->isInitialized('credits') && $object->getCredits() !== null) {
                $data['credits'] = $object->getCredits();
            }

            if ($object->isInitialized('webCredits') && $object->getWebCredits() !== null) {
                $data['web_credits'] = $object->getWebCredits();
            }

            if ($object->isInitialized('apiCredits') && $object->getApiCredits() !== null) {
                $data['api_credits'] = $object->getApiCredits();
            }

            if ($object->isInitialized('creditsResetAt') && $object->getCreditsResetAt() !== null) {
                $data['credits_reset_at'] = $object->getCreditsResetAt()?->format('Y-m-d\TH:i:sP');
            }

            if ($object->isInitialized('registeredAt') && $object->getRegisteredAt() !== null) {
                $data['registered_at'] = $object->getRegisteredAt()?->format('Y-m-d\TH:i:sP');
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
            return [\AlsoAsked\Api\Model\Account::class => false];
        }
    }
} else {
    class AccountNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === \AlsoAsked\Api\Model\Account::class;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && $data::class === \AlsoAsked\Api\Model\Account::class;
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
            $object = new \AlsoAsked\Api\Model\Account();

            if ($data === null || \is_array($data) === false) {
                return $object;
            }

            if (\array_key_exists('id', $data)) {
                $object->setId($data['id']);
                unset($data['id']);
            }

            if (\array_key_exists('name', $data)) {
                $object->setName($data['name']);
                unset($data['name']);
            }

            if (\array_key_exists('email', $data)) {
                $object->setEmail($data['email']);
                unset($data['email']);
            }

            if (\array_key_exists('plan_type', $data)) {
                $object->setPlanType($data['plan_type']);
                unset($data['plan_type']);
            }

            if (\array_key_exists('credits', $data)) {
                $object->setCredits($data['credits']);
                unset($data['credits']);
            }

            if (\array_key_exists('web_credits', $data)) {
                $object->setWebCredits($data['web_credits']);
                unset($data['web_credits']);
            }

            if (\array_key_exists('api_credits', $data)) {
                $object->setApiCredits($data['api_credits']);
                unset($data['api_credits']);
            }

            if (\array_key_exists('credits_reset_at', $data)) {
                $object->setCreditsResetAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['credits_reset_at']));
                unset($data['credits_reset_at']);
            }

            if (\array_key_exists('registered_at', $data)) {
                $object->setRegisteredAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['registered_at']));
                unset($data['registered_at']);
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

            if ($object->isInitialized('name') && $object->getName() !== null) {
                $data['name'] = $object->getName();
            }

            if ($object->isInitialized('email') && $object->getEmail() !== null) {
                $data['email'] = $object->getEmail();
            }

            if ($object->isInitialized('planType') && $object->getPlanType() !== null) {
                $data['plan_type'] = $object->getPlanType();
            }

            if ($object->isInitialized('credits') && $object->getCredits() !== null) {
                $data['credits'] = $object->getCredits();
            }

            if ($object->isInitialized('webCredits') && $object->getWebCredits() !== null) {
                $data['web_credits'] = $object->getWebCredits();
            }

            if ($object->isInitialized('apiCredits') && $object->getApiCredits() !== null) {
                $data['api_credits'] = $object->getApiCredits();
            }

            if ($object->isInitialized('creditsResetAt') && $object->getCreditsResetAt() !== null) {
                $data['credits_reset_at'] = $object->getCreditsResetAt()?->format('Y-m-d\TH:i:sP');
            }

            if ($object->isInitialized('registeredAt') && $object->getRegisteredAt() !== null) {
                $data['registered_at'] = $object->getRegisteredAt()?->format('Y-m-d\TH:i:sP');
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
            return [\AlsoAsked\Api\Model\Account::class => false];
        }
    }
}
