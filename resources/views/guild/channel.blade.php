@extends('layouts.app')

@section('content')
    <div class="flex flex-row w-full h-screen overflow-y-auto">
        @include('layouts.guild-channels')
        <div class="h-full flex-grow flex flex-col">
            <div class="flex-grow w-full py-4 px-3">
                {{ $channel['name'] }}
            </div>
            <div class="h-16 w-full bg-zinc-200 dark:bg-zinc-800 border-t-2 border-zinc-400 dark:border-zinc-600 p-2">
                <input
                    class="h-12 shadow appearance-none border-0 rounded w-full py-2 px-3 dark:text-zinc-300 text-zinc-700 leading-tight focus:outline-none focus:shadow-outline bg-zinc-300 dark:bg-zinc-700"
                    id="msgInp" type="text" placeholder="Message">
            </div>
        </div>
        @include('layouts.guild-members')
    </div>
    <script>
        const msgInp = document.getElementById("msgInp");
        msgInp.addEventListener("keyup", function(event) {
            if (event.key === "Enter") {
                if (msgInp.value.trim() != "") {
                    fetch("/api/sendMsg", {
                        method: "POST",
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            "guild": "{{ $guild['id'] }}",
                            "channel": "{{ $channel['id'] }}",
                            "message": msgInp.value
                        })
                    });
                    msgInp.value = "";
                }
            }
        });
    </script>
@endsection
