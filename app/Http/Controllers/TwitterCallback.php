<?php

namespace App\Http\Controllers;

use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Http\Request;

class TwitterCallback extends Controller
{
    public function __invoke(Request $req) {
        $request_token = [];
        $request_token['oauth_token'] = session('oauth_token');
        $request_token['oauth_token_secret'] = session('oauth_token_secret');

        if ($req->has('oauth_token') && $request_token['oauth_token'] !== $req->oauth_token) {
            return redirect(session('_previous')['url']. '#tweet-block')->with('access_token', []);
        }

        $connection = new TwitterOAuth(config('twitter.consumer_key'), config('twitter.consumer_secret'), $request_token['oauth_token'], $request_token['oauth_token_secret']);
        $access_token = $connection->oauth("oauth/access_token", ["oauth_verifier" => $req->oauth_verifier]);
        return redirect(session('_previous')['url']. '#tweet-block')->with('access_token', $access_token);
    }
}
