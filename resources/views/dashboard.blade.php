@extends('layouts.app')

@section('content')
    <div class="bg-zinc-200 dark:bg-zinc-800 w-full h-full">
        <div class="max-w-7xl mx-auto px-8">
            <ul class="bg-zinc-200 dark:bg-zinc-800 py-4 px-4 rounded">
                <li class="w-full flex flex-row py-2 text-zinc-700 dark:text-zinc-300">
                    <strong>Guilds - {{ count(AppHelper::getGuilds()) }}</strong>
                </li>
                @foreach (AppHelper::getGuilds() as $guild)
                    <a href="{{ route('guild.settings', ['guild' => $guild['id']]) }}" class="block">
                        <li class="w-full flex flex-row py-4 border-t-2 border-zinc-300 dark:border-zinc-700">
                            <div class="h-16 w-16">
                                @if ($guild['icon'] != null)
                                    <img src="{{ $guild['icon'] }}" alt="{{ $guild['name'] }}"
                                        class="w-full h-full rounded-lg">
                                @else
                                    <div
                                        class="w-full h-full rounded-lg text-center text-3xl flex justify-center align-center flex-col dark:bg-zinc-700 bg-zinc-300 text-zinc-800 dark:text-zinc-200">
                                        <strong>{{ AppHelper::acronym($guild['name']) }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div
                                class="h-16 flex-grow flex flex-col align-center justify-center text-2xl ml-4 text-zinc-900 dark:text-zinc-100">
                                {{ $guild['name'] }}
                            </div>
                        </li>
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
