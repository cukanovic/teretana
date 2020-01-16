<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleAuthController extends Controller
{
    public function callback(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|string',
            'state' => 'required|json',
        ]);

        /** @var \Google_Client $client */
        $client = \Google::getClient();
        $client->setAccessType('offline');
        $accessToken = $client->fetchAccessTokenWithAuthCode($request->get('code'));

        $user = $request->user();
        $user->google_access_token = $accessToken;

        $user->save();

        $bookingId = json_decode($request->get('state'), true)['booking_id'];

        return redirect()->route('google.sync', ['booking' => $bookingId]);
    }
}
