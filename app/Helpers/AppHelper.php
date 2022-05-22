<?php

namespace App\Helpers;

use App\Services\BotInterface;
use Illuminate\Support\Facades\Auth;

class AppHelper
{
    public static function acronym($longname)
    {
        $letters = array();
        $words = explode(' ', $longname);
        foreach ($words as $word) {
            $word = (substr($word, 0, 1));
            array_push($letters, $word);
        }
        $shortname = implode($letters);
        return $shortname;
    }

    public static function getGuilds()
    {
        return BotInterface::getGuilds(Auth::id());
    }
}
