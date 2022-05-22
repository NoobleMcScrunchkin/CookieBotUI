<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\BotInterface;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function guildSettings($guildid)
    {
        $guild = BotInterface::getGuild(Auth::id(), $guildid);
        return view('guild.settings', ['guild' => $guild]);
    }

    public function guildChannel($guildid, $channelid)
    {
        $guild = BotInterface::getGuild(Auth::id(), $guildid);
        $channel = null;

        foreach ($guild['channels'] as $c) {
            if ($c['id'] == $channelid) {
                $channel = $c;
                break;
            }
        }

        $messages = BotInterface::getMessages(Auth::id(), $guildid, $channelid);

        return view('guild.channel', ['guild' => $guild, 'channel' => $channel, 'messages' => $messages]);
    }

    public function loggedOut()
    {
        return view('logged-out');
    }
}
