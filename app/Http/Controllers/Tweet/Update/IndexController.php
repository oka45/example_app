<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Models\Tweet;
use App\Services\TweetService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        $tweetId = (int) $request->route('tweetId');
        if (!$tweetService->checkOwnTweet($request->user()->id, $tweetId)) {
          throw new AccessDeniedHttpException();
        }
        $tweet = Tweet::where('id', $tweetId)->firstOrFail();
        return view('tweet.update')->with('tweet', $tweet);
    }
}
