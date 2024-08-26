<?php

namespace App\Http\Controllers;
// use App\Service\GeminiService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeminiAIController extends Controller
{
    protected $geminiService;

    // public function __construct(GeminiService $geminiService)
    // {
    //     $this->geminiService = $geminiService;
    // }

    public function handleChat(Request $request)
    {
        $input = $request->input('massage');

        $url = env('GEMINI_API_BASE_URL') . env('GEMINI_API_KEY');
        $payload = [
            'contents' => [
                [
                    'role' => 'user',
                    'parts' => [
                        ['text' => $input]
                    ]
                ]
            ]
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json' // perbaiki format header
        ])->post($url, $payload);
        $chatbotResponse = $response->json()['candidates'][0]['content']['parts'][0]['text'] ?? 'No response';

        // dd($chatbotResponse);
        return redirect()->back()->with('response', $chatbotResponse);
    }

}
