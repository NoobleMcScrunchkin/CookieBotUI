<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class BotInterface
{
    public function __construct()
    {
    }

    public static function getGuilds($userid)
    {
        $response = Http::get(config('app.api_base_url') . 'guilds', [
            'userid' => $userid,
        ]);
        $res = $response->json();

        if (!$res['success']) {
            return false;
        }

        $guilds = $res['guilds'];
        return $guilds;
    }

    public static function getGuild($userid, $guild)
    {
        $response = Http::get(config('app.api_base_url') . 'guild', [
            'userid' => $userid,
            'guildid' => $guild
        ]);
        $res = $response->json();

        if (!$res['success']) {
            return false;
        }

        $guild = $res['guild'];
        return $guild;
    }

    public static function getMessages($userid, $guild, $channel)
    {
        $response = Http::get(config('app.api_base_url') . 'messages', [
            'userid' => $userid,
            'guildid' => $guild,
            'channelid' => $channel
        ]);
        $res = $response->json();

        if (!$res['success']) {
            return false;
        }

        $messages = $res['messages'];
        return $messages;
    }

    public static function sendMessage($userid, $guild, $channel, $message)
    {
        $response = Http::post(config('app.api_base_url') . 'send-msg', [
            'userid' => $userid,
            'guild' => $guild,
            'channel' => $channel,
            'message' => $message
        ]);
        $res = $response->json();

        if (!$res['success']) {
            return false;
        }

        return true;
    }

    public static function eval($command)
    {
        $response = Http::post(config('app.api_base_url') . 'eval', [
            'command' => $command,
        ]);
        $res = $response->json();

        return $res['output'];
    }
}
