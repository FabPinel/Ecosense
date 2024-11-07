<?php 

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class GeminiService
{
    protected $client;
    protected $apiKey = 'AIzaSyC2BRIZCU68YhxGHctPa-Uxy3M1O6a9BWI';

    public function generateQuestionWithOptions($text)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key=' . $this->apiKey);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            'contents' => [
                [
                    'parts' => [
                        ['text' => "Génère une question fermé basée sur le contenu suivant, à laquelle on peut répondre par Oui ou Non. Indique également si la réponse correcte est Oui ou Non en marquant Réponse : pour la réponse. Contenu : \"$text\""]
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
            return [
                'question' => 'Une erreur est survenue lors de la génération de la question.',
                'correctAnswer' => 'Rien trouvé' // Default to 'Oui' in case of error
            ];
        }

        curl_close($ch);
        $data = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            Log::error('Erreur de décodage JSON: ' . json_last_error_msg());
            return [
                'question' => 'Une erreur est survenue lors de la génération de la question.',
                'correctAnswer' => 'Rien trouvé'
            ];
        }

        // Extract the question text and correct answer from the response
        $generatedQuestion = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Pas de question générée';

        // Use a regex to extract the correct answer indication from the response text
        preg_match('/(Réponse) ?: ?(Oui|Non)/i', $generatedQuestion, $matches);
        $correctAnswer = $matches[2] ?? 'Rien'; // Default to '' if no clear indication is found

        $questionWithoutAnswer = preg_replace('/Réponse ?: ?(Oui|Non)/i', '', $generatedQuestion);

        Log::info('Question générée: ' . $generatedQuestion);
        Log::info('Réponse correcte: ' . $correctAnswer);

        return [
            'question' => $questionWithoutAnswer,
            'correctAnswer' => $correctAnswer
        ];
    }
}
