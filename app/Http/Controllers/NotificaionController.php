<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use App\Models\User;
use App\Notifications\NotiOpTec;


class NotificaionController extends Controller
{

public function sendOfferNotification() {
    $userSchema = User::first();

    $offerData = [
        'name' => 'BOGO',
        'body' => 'You received an offer.',
        'thanks' => 'Thank you',
        'offerText' => 'Check out the offer',
        'offerUrl' => url('/'),
        'offer_id' => 007
    ];

    Notification::send($userSchema, new OffersNotification($offerData));

    dd('Task completed!');
    }
}
