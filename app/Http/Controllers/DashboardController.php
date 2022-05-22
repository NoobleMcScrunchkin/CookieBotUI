<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\BotInterface;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function guildSettings($guildid)
    {
        $guild = BotInterface::getGuild($guildid);
        return view('guild.settings', ['guild' => $guild]);
    }

    public function guildChannel($guildid, $channelid)
    {
        $guild = BotInterface::getGuild($guildid);
        $channel = null;

        foreach ($guild['channels'] as $c) {
            if ($c['id'] == $channelid) {
                $channel = $c;
                break;
            }
        }

        $messages = BotInterface::getMessages($guildid, $channelid);

        return view('guild.channel', ['guild' => $guild, 'channel' => $channel, 'messages' => $messages]);
    }
}
