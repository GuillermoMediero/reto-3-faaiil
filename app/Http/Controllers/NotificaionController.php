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
        'name' => 'Nueva incidencia',
        'body' => 'Se creo una nueva incidencia',
        'offer_id' => 007
    ];

    $userSchema->notify(new NotiOpTec($offerData));

    }
}
