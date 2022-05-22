@extends('layouts.app')

@section('content')
    <div class="flex flex-row w-full h-screen overflow-y-auto">
        @include('layouts.guild-channels')
        <div class="h-screen flex-grow flex flex-col">
            <div class="flex-grow h-[calc(100vh-4rem)] w-full pl-3">
                <ul id="messageContainer" class="flex flex-col h-full w-full overflow-y-auto">
                    @foreach (array_reverse($messages) as $messageObj)
                        <li class="flex flex-row border-t-2 border-zinc-400 dark:border-zinc-600 py-2">
                            <div class="w-12">
                                <img class="aspect-square w-12 rounded-full"
                                    src="{{ $messageObj['member']['displayAvatarURL'] }}" alt="{{ $messageObj['member']['displayName'] }}">
                            </div>
                            <div class="flex flex-col flex-grow pl-2">
                                <div><strong>{{ $messageObj['member']['displayName'] }}</strong></div>
                                <div>{{ $messageObj['message']['cleanContent'] }}</div>
                            </div>
                        </li>
                    @endforeach
                </ul>
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

        let messageContainer = document.getElementById("messageContainer");
        messageContainer.scrollTop = messageContainer.scrollHeight;

        const guild = "{{ $guild['id'] }}";
        const channel = "{{ $channel['id'] }}";

        const url = "ws{{ env('WS_SSL', false) == true ? 's' : '' }}://" + new URL(window.location.href).hostname + ":5000";
        webSocket = io(url);

        webSocket.on('connect', () => {
            console.log(`WebSocket connected to ${url}: ${webSocket.id}`);

            webSocket.emit('setChannel', {
                "guild": guild,
                "channel": channel,
            });
        });

        webSocket.on('disconnect', () => {
            webSocket.connect();
        });

        webSocket.on('newMessage', message => {
            let listItem = document.createElement('li');
            listItem.className = 'flex flex-row border-t-2 border-zinc-400 dark:border-zinc-600 py-2';

            profileDiv = document.createElement('div');
            profileDiv.className = "w-12";

            profileImg = document.createElement('img');
            profileImg.className = "aspect-square w-12 rounded-full";
            profileImg.src = message.member.displayAvatarURL;
            profileImg.alt = message.member.displayName;

            contentDiv = document.createElement('div');
            contentDiv.className = "flex flex-col flex-grow pl-2";

            nameDiv = document.createElement('div');
            nameStrong = document.createElement('strong');
            nameStrong.textContent = message.member.displayName;

            messageDiv = document.createElement('div');
            messageDiv.textContent = message.message.cleanContent;

            nameDiv.appendChild(nameStrong);
            contentDiv.appendChild(nameDiv);
            contentDiv.appendChild(messageDiv);
            profileDiv.appendChild(profileImg);
            listItem.appendChild(profileDiv);
            listItem.appendChild(contentDiv);
            messageContainer.appendChild(listItem);

            messageContainer.scrollTop = messageContainer.scrollHeight;
        });

    </script>
@endsection
