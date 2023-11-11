<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Services\TweetService;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        $tweets = $tweetService->getTweets();
        return view('tweet.index')
            ->with('tweets', $tweets);
    }
}
