<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YouTubeController extends Controller
{
    public function search(Request $request) {
        $googleClient = new \Google_Client();
        $googleClient->setDeveloperKey(env('YOUTUBE_KEY'));
        $youtube = new \Google_Service_YouTube($googleClient);

        $searchResponse = $youtube->search->listSearch('id,snippet', array(
            'q' => $request->input('query'),
            'maxResults' => $request->input('max_results'),
            'pageToken' => $request->input('pageToken')
        ));

        return json_encode($searchResponse);
    }
}
