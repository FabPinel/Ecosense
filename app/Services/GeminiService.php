<?php 

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class GeminiService
{
    protected $client;
    protected $apiKey = 'AIzaSyC2BRIZCU68YhxGHctPa-Uxy3M1O6a9BWI';

    public function generateQuestion($text)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key=' . $this->apiKey);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            'contents' => [
                [
                    'parts' => [
                        ['text' => "Génère une seule question pour amener l'utilisateur à réfléchir sur le contenu suivant : \"$text\""]
                    ]
                ]
            ]
        ]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            Log::error('cURL error: ' . curl_error($ch));
            return 'Une erreur est survenue lors de la génération de la question.';
        }

        Log::info('Réponse brute de l\'API Gemini: ' . $response);

        curl_close($ch);
        $data = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            Log::error('Erreur de décodage JSON: ' . json_last_error_msg());
            return 'Une erreur est survenue lors de la génération de la question.';
        }

        Log::info('Réponse décodée de l\'API Gemini: ', $data);

        // Extraire la question générée
        $generatedQuestion = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Aucune question générée.';
        
        Log::info('Question générée: ' . $generatedQuestion);

        return $generatedQuestion;
    }
}
