<div
    class="bg-zinc-200 dark:bg-zinc-800 border-r-2 border-zinc-400 dark:border-zinc-600 h-full w-56 py-4 px-3 text-zinc-700 dark:text-zinc-300">
    <a href="{{ route('guild.settings', ['guild' => $guild['id']]) }}"
        class="w-full py-2 block text-center bg-zinc-300 dark:bg-zinc-700 rounded"><i
            class="fa-solid fa-gear mr-2"></i><strong>Settings</strong></a>
    <ul class="mt-2">
        @foreach ($guild['channels'] as $channel)
            @if ($channel['parentId'] == null)
                @if ($channel['type'] == 'GUILD_CATEGORY')
                    <li>
                        <ul class="mb-4">
                            <li class="mb-1"><strong>{{ $channel['name'] }}</strong></li>
                            @php
                                $innerChannels = $guild['channels'];
                                usort($innerChannels, function ($a, $b) {
                                    return $a['rawPosition'] > $b['rawPosition'];
                                });
                            @endphp
                            @foreach ($innerChannels as $innerChannel)
                                @if ($innerChannel['parentId'] == $channel['id'])
                                    @if ($innerChannel['type'] == 'GUILD_VOICE')
                                        <li><i class="fa-solid fa-volume-high mr-2"></i>{{ $innerChannel['name'] }}
                                        </li>
                                    @elseif ($innerChannel['type'] == 'GUILD_TEXT')
                                        <a
                                            href="{{ route('guild.channel', ['guild' => $guild['id'], 'channel' => $innerChannel['id']]) }}">
                                            <li><i class="fa-solid fa-hashtag mr-2"></i>{{ $innerChannel['name'] }}
                                            </li>
                                        </a>
                                    @endif
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @elseif ($channel['type'] == 'GUILD_VOICE')
                    <li><i class="fa-solid fa-volume-high mr-2"></i>{{ $channel['name'] }}</li>
                @elseif ($channel['type'] == 'GUILD_TEXT')
                    <a
                        href="{{ route('guild.channel', ['guild' => $guild['id'], 'channel' => $channel['id']]) }}">
                        <li><i class="fa-solid fa-hashtag mr-2"></i>{{ $channel['name'] }}</li>
                    </a>
                @endif
            @endif
        @endforeach
    </ul>
</div>
