<div
    class="bg-zinc-200 dark:bg-zinc-800 border-l-2 border-zinc-400 dark:border-zinc-600 h-screen overflow-y-auto w-56 py-4 px-3 dark:text-zinc-300 text-zinc-700">
    <ul>
        <li class="w-full flex flex-row mb-2 text-zinc-700 dark:text-zinc-300">
            <strong>Members - {{ count($guild['members']) }}</strong>
        </li>
        @php
            $members = $guild['members'];
            usort($members, function ($a, $b) {
                return strcmp($a['displayName'], $b['displayName']);
            });
        @endphp
        @foreach ($members as $member)
            <li class="flex flex-row mb-2">
                <div class="w-8 h-8">
                    @if ($member['displayAvatarURL'] != null)
                        <img src="{{ $member['displayAvatarURL'] }}" alt="{{ $member['displayName'] }}"
                            class="w-full h-full rounded-lg">
                    @else
                        <div
                            class="w-full h-full rounded-lg text-center text-3xl flex justify-center align-center flex-col dark:bg-zinc-700 bg-zinc-300 text-zinc-800 dark:text-zinc-200">
                            <strong>{{ AppHelper::acronym($member['displayName']) }}</strong>
                        </div>
                    @endif
                </div>
                <div class="h-8 w-[calc(100%-2rem)] pl-2 overflow-hidden whitespace-nowrap text-ellipsis">
                    {{ $member['displayName'] }}
                </div>
            </li>
        @endforeach
    </ul>
</div>
