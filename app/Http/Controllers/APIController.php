<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\BotInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller {
    public function sendMsg(Request $request) {
        $userid = $request->input('userid');
        $guild = $request->input('guild');
        $channel = $request->input('channel');
        $message = $request->input('message');
        return BotInterface::sendMessage($userid, $guild, $channel, $message);
    }
}
