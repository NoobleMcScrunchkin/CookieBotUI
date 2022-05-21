<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\BotInterface;
use Illuminate\Http\Request;

class APIController extends Controller {
    public function sendMsg(Request $request) {
        $guild = $request->input('guild');
        $channel = $request->input('channel');
        $message = $request->input('message');
        return BotInterface::sendMessage($guild, $channel, $message);
    }
}
