<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\CreateRequest;
use App\Models\Tweet;
use App\Services\TweetService;
use Illuminate\Support\Facades\Log;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request, TweetService $tweetService)
    {
        Log::debug("トランザクション開始");
        Log::debug($request->userId());
        $tweetService->saveTweet(
            $request->userId(),
            $request->tweet(),
            $request->images()
        );
        return redirect()->route('tweet.index');
    }
}
