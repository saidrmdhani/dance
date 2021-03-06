<?php

namespace App\Http\Controllers;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\Clip;
use Illuminate\Http\Request;

class ClipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clip  $clip
     * @return \Illuminate\Http\Response
     */
    public function show(Clip $clip, $id)
    {
        $data = session('access_token', '') ? session('access_token') : $this->get_authorize_url();
        return view('share', ['clip' => $clip->findOrFail($id), 'data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clip  $clip
     * @return \Illuminate\Http\Response
     */
    public function edit(Clip $clip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clip  $clip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clip $clip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clip  $clip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clip $clip)
    {
        //
    }

    private function get_authorize_url() {
        $connection = new TwitterOAuth(config('twitter.consumer_key'), config('twitter.consumer_secret'));
        $request_token = $connection->oauth('oauth/request_token', ['oauth_callback' => config('twitter.oauth_callback')]);
        session([
            'oauth_token' => $request_token['oauth_token'],
            'oauth_token_secret' => $request_token['oauth_token_secret']
        ]);
        return $connection->url('oauth/authorize', [
            'oauth_token' => $request_token['oauth_token']
        ]);
    }
}
