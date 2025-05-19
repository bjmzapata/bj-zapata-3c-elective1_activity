<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function getNews(Request $request)
    {
        $query = $request->query('q', 'elon');
        $apiKey = env('GNEWS_API_KEY', 'd45386aa61af4add3aa419a27a11e92b'); 
        $response = Http::get('https://gnews.io/api/v4/search', [
            'q' => $query,
            'max' => 1,
            'apikey' => $apiKey,
        ]);
       if ($response->successful() && isset($response['articles'][0])) {
       $article = $response['articles'][0];
        return response()->json([
        'title' => $article['title'] ?? null,
        'description' => $article['description'] ?? null,
        'content' => $article['content'] ?? null,
        'url' => $article['url'] ?? null,
        'publishedAt' => $article['publishedAt'] ?? null,], 
        200);
        } else {
         return response()->json(['error' => 'Could not fetch news data'], 400);
        }


    }
}
