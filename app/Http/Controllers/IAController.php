<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Meilisearch\Client;

class IAController extends Controller
{
    public function importIA()
    {
        require_once base_path('vendor/autoload.php');

        $client = new Client('http://localhost:7700', 'DK8j-IcKjmSE9OrYP1QrIz4x8-X2LdxXTC6tJH3oyB4');

        $articles_json = file_get_contents(base_path('articles.json'));
        $articles = json_decode($articles_json);

        $client->index('articles')->addDocuments($articles);

        return response()->json(['message' => 'Articles imported successfully!']);
    }
}
