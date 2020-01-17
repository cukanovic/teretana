<?php

namespace App\Http\Controllers;

use App\Booking;
use App\User;
use Illuminate\Http\Request;

class GoogleCalendarController extends Controller
{
    public function sync(Request $request, string $bookingId)
    {
        /** @var \App\Customer $user */
        $user = $request->user();

        /** @var Booking $booking */
        $booking = $user->bookings()->findOrFail($bookingId);

        if ($user->google_access_token === null) {
            return $this->requestGoogleAccessTokenForUser($user, ['booking_id' => $bookingId]);
        }

        /** @var \Google_Service_Calendar $client */
        try {
            $calendarService = $this->getCalendarServiceForUser($user);
        } catch (\Exception $e) {
            return $this->requestGoogleAccessTokenForUser($user, ['booking_id' => $bookingId]);
        }

        $event = $this->convertBookingToGoogleCalendarEvent($booking);
        $calendarService->events->insert('primary', $event);

        return redirect()->route('bookings.index')->with('success', 'Rezervacija je sinhronizovana sa Google kalendarom.');
    }

    private function requestGoogleAccessTokenForUser(User $user, array $state = [])
    {
        /** @var \Google_Client $client */
        $client = \Google::getClient();

        $client->setState(json_encode($state));

        return redirect($client->createAuthUrl());
    }

    private function getCalendarServiceForUser(User $user)
    {
        /** @var \Google_Client $client */
        $client = tap(\Google::getClient())->setAccessToken($user->google_access_token);

        if ($client->isAccessTokenExpired()) {
            throw new \Exception("Google Access Token is expired");
        }

        return new \Google_Service_Calendar($client);
    }

    private function convertBookingToGoogleCalendarEvent(Booking $booking)
    {
        $event = new \Google_Service_Calendar_Event();

        $event->setStart(tap(new \Google_Service_Calendar_EventDateTime())->setDateTime($booking->schedule->format('Y-m-d\TH:i:sP')));
        $event->setEnd(tap(new \Google_Service_Calendar_EventDateTime())->setDateTime($booking->schedule->addHour()->format('Y-m-d\TH:i:sP')));
        $event->setSummary(sprintf('Trening %s sa %s', $booking->training->name, $booking->training->trainer->name));
        $event->setVisibility('private');

        return $event;
    }
}
