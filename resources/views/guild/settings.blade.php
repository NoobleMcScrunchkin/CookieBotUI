@extends('layouts.app')

@section('content')
    <div class="flex flex-row w-full h-screen overflow-y-auto">
        @include('layouts.guild-channels')
        <div class="h-full flex-grow py-4 px-3">
            <div class="mb-4">
                <label class="block dark:text-zinc-300 text-zinc-700 text-sm font-bold mb-2" for="test1">
                    Test Setting 1
                </label>
                <input
                    class="shadow appearance-none border border-zinc-100 dark:border-zinc-900 rounded w-full py-2 px-3 dark:text-zinc-300 text-zinc-700 leading-tight focus:outline-none focus:shadow-outline bg-zinc-200 dark:bg-zinc-800"
                    id="test1" type="text" placeholder="Test">
            </div>
            <div class="mb-4">
                <label class="block dark:text-zinc-300 text-zinc-700 text-sm font-bold mb-2" for="test2">
                    Test Setting 2
                </label>
                <input
                    class="shadow appearance-none border border-zinc-100 dark:border-zinc-900 rounded w-full py-2 px-3 dark:text-zinc-300 text-zinc-700 leading-tight focus:outline-none focus:shadow-outline bg-zinc-200 dark:bg-zinc-800"
                    id="test2" type="text" placeholder="Test">
            </div>
        </div>
        @include('layouts.guild-members')
    </div>
@endsection
