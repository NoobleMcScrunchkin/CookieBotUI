<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class BotInterface
{
    public function __construct()
    {
    }

    public static function getGuilds()
    {
        $response = Http::get(config('app.api_base_url') . 'guilds');
        $res = $response->json();

        if (!$res['success']) {
            return false;
        }

        $guilds = $res['guilds'];
        return $guilds;
    }

    public static function getGuild($guildid)
    {
        $response = Http::get(config('app.api_base_url') . 'guild', ['guildid' => $guildid]);
        $res = $response->json();

        if (!$res['success']) {
            return false;
        }

        $guild = $res['guild'];
        return $guild;
    }

    public static function sendMessage($guild, $channel, $message)
    {
        $response = Http::post(config('app.api_base_url') . 'send-msg', [
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
