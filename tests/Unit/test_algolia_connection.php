<?php

require '../../vendor/autoload.php';

use Algolia\AlgoliaSearch\SearchClient;

try {
    $client = SearchClient::create(getenv('ALGOLIA_APP_ID'), getenv('ALGOLIA_API_KEY'));
    $index = $client->initIndex('articles');
    $response = $index->search('test');
    echo "Connection successful!";
} catch (\Algolia\AlgoliaSearch\Exceptions\UnreachableException $e) {
    echo "Connection error: " . $e->getMessage();
}
