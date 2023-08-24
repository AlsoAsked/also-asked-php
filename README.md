# AlsoAsked PHP Client

<!-- focus: false -->
![AlsoAsked Logo](/assets/images/logo-blue.png)

For more information, please visit [https://developers.alsoasked.com](https://developers.alsoasked.com).

## Installation & Usage

### Requirements

PHP 7.4 and later.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "require": {
    "AlsoAsked/also-asked-php": "1.0.0"
  }
}
```

Then run `composer install`

## Examples

### Creating a client

You'll need to begin by creating a client for the API you wish to use, as well as specify the API key you wish to use.

We do this by first creating an HTTP client respecting the [PSR-18](https://www.php-fig.org/psr/psr-18/) standard.

The `\Http\Discovery\Psr18ClientDiscovery` class will automatically discover an PSR-18 HTTP client from the installed composer packages, meaning you'll need an HTTP client installed which implements PSR-18 if you don't already.

A common HTTP client which does is [Guzzle](https://docs.guzzlephp.org/en/stable/), we can install this by running `composer require guzzlehttp/guzzle:^7.0`.

The example below creates a client for the **Live** API by setting a base URI using the `\Http\Client\Common\Plugin\BaseUriPlugin` plugin. If you wish to use the **Sandbox** API, you can change the base URI from `https://alsoaskedapi.com/v1` to `https://sandbox.alsoaskedapi.com/v1`.

You'll need to change the API specified in the `\AlsoAsked\Api\Authentication\ApiKeyAuthentication` plugin from `your-api-key` to the API key you've created. If you don't have an API key, follow the [authentication guide](https://developers.alsoasked.com/docs/also-asked/j389o9lgezike-authentication).

```php
<?php

$httpClient = (new \Http\Client\Common\PluginClientBuilder())
    // add a base URI plugin to point to the live API URL
    ->addPlugin(new \Http\Client\Common\Plugin\BaseUriPlugin(
        \Http\Discovery\UriFactoryDiscovery::find()
            ->createUri('https://alsoaskedapi.com/v1'),
    ))
    // add an authentication plugin to add the API key header
    ->addPlugin(new \Jane\Component\OpenApiRuntime\Client\Plugin\AuthenticationRegistry([
        new \AlsoAsked\Api\Authentication\ApiKeyAuthentication('your-api-key'),
    ]))
    // create the PSR-18 HTTP client
    ->createClient(\Http\Discovery\Psr18ClientDiscovery::find());

// create the API client with the PSR-18 HTTP client
$apiClient = \AlsoAsked\Api\Client::create($httpClient);
```

### Fetching your account details

Use `getAccount` to fetch your account details, this calls the [`GET /v1/account`](https://developers.alsoasked.com/docs/also-asked/b3b98451f0ae2-get-account-information) API endpoint.

```php
/**
 * @var \AlsoAsked\Api\Model\Account
 */
$account = $apiClient->getAccount();

echo 'Account ID: ' . $account->getId() . \PHP_EOL;
echo 'Name: ' . $account->getName() . \PHP_EOL;
echo 'Email: ' . $account->getEmail() . \PHP_EOL;
echo 'Plan Type: ' . $account->getPlanType() . \PHP_EOL;
echo 'Credits: ' . $account->getCredits() . \PHP_EOL;
echo 'Credits Reset At: ' . $account->getCreditsResetAt()->format(DateTimeInterface::ISO8601_EXPANDED) . \PHP_EOL;
echo 'Registered At: ' . $account->getRegisteredAt()->format(DateTimeInterface::ISO8601_EXPANDED) . \PHP_EOL;

// outputs:
//
// Account ID: 6G8QgoK9ar0E1pB7Rl0LN5mxljdAvBWb
// Name: Mantis Toboggan
// Email: mantis.toboggan@gmail.com
// Plan Type: pro
// Credits: 100
// Credits Reset At: +2023-09-14T01:19:27+00:00
// Registered At: +2022-03-23T17:54:19+00:00
```

### Perform a search

Use `performSearch` to perform a search request, this calls the [`POST /v1/search`](https://developers.alsoasked.com/docs/also-asked/61f57d877f150-perform-search) API endpoint.

```php
$request = (new \AlsoAsked\Api\Model\SearchRequestOptions())
    ->setTerms(['cars'])
    ->setLanguage('en')
    ->setRegion('us')
    ->setDepth(2)
    ->setFresh(false)
    ->setAsync(false)
    ->setNotifyWebhooks(true);

/**
 * @var \AlsoAsked\Api\Model\SearchRequestResults
 */
$results = $apiClient->performSearch($request);

// ensure the search request was successful
if ($results->getStatus() !== 'success') {
    echo 'We expected the status to be "success", but encountered ' . $results->getStatus();

    exit;
}

/**
 * Recursively print a search result and it's children.
 *
 * @param \AlsoAsked\Api\Model\SearchResult $result
 *
 * @return void
 */
function printResult(\AlsoAsked\Api\Model\SearchResult $result): void
{
    echo '- Question: ' . $result->getQuestion() . \PHP_EOL;

    foreach ($result->getResults() as $childResult) {
        \printResult($childResult);
    }
}

// print the queries and their results

foreach ($results->getQueries() as $query) {
    echo 'Term: ' . $query->getTerm() . \PHP_EOL;
    echo 'Results:' . \PHP_EOL;

    foreach ($query->getResults() as $result) {
        \printResult($result);
    }
}

// outputs:
//
// Term: cars
// Results:
// - Question: What are 10 best cars to buy?
// - Question: What are top 5 most reliable cars?
// - Question: What is the #1 most reliable car?
// - Question: Who is car 20 in Cars?
// - Question: Who owns Towbin Dodge now?
// - Question: What kind of car is Mater?
// ...
```

## Help

If you need more information, see the [developer documentation](https://developers.alsoasked.com), or get in touch with us at [help@alsoasked.com](mailto:help@alsoasked.com).
