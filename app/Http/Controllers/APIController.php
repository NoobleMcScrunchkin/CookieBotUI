<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\BotInterface;

class APIController extends Controller {
    public function test() {
        return (new BotInterface())->getGuilds();
    }

    public function test2() {
        return (new BotInterface())->sendMessage('725811866907181096', '775153603538190346', 'Testing');
    }
}
