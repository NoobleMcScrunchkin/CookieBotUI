<aside class="w-16 h-screen sticky top-0 border-r-2 border-zinc-400 dark:border-zinc-600 flex flex-col"
    aria-label="Sidebar">
    <div class="overflow-y-auto py-4 px-3 bg-zinc-100 dark:bg-zinc-900 flex-grow noscrollbar">
        <ul class="space-y-2 block">
            <li class="float-none">
                <a href="{{ route('index') }}"
                    class="flex items-center p-2 text-base font-normal @if (Route::is('index')) text-zinc-900 dark:text-zinc-100 bg-zinc-400 dark:bg-zinc-600 @else text-zinc-500 @endif rounded-lg dark:bg-zinc-700 bg-zinc-300 text-zinc-800 dark:text-zinc-200 hover:text-zinc-900 hover:bg-zinc-400 dark:hover:text-zinc-100 dark:hover:bg-zinc-600">
                    <svg class="flex-shrink-0 w-6 h-6 transition duration-75" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 576 512">
                        <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path
                            d="M575.8 255.5C575.8 273.5 560.8 287.6 543.8 287.6H511.8L512.5 447.7C512.5 450.5 512.3 453.1 512 455.8V472C512 494.1 494.1 512 472 512H456C454.9 512 453.8 511.1 452.7 511.9C451.3 511.1 449.9 512 448.5 512H392C369.9 512 352 494.1 352 472V384C352 366.3 337.7 352 320 352H256C238.3 352 224 366.3 224 384V472C224 494.1 206.1 512 184 512H128.1C126.6 512 125.1 511.9 123.6 511.8C122.4 511.9 121.2 512 120 512H104C81.91 512 64 494.1 64 472V360C64 359.1 64.03 358.1 64.09 357.2V287.6H32.05C14.02 287.6 0 273.5 0 255.5C0 246.5 3.004 238.5 10.01 231.5L266.4 8.016C273.4 1.002 281.4 0 288.4 0C295.4 0 303.4 2.004 309.5 7.014L564.8 231.5C572.8 238.5 576.9 246.5 575.8 255.5L575.8 255.5z">
                        </path>
                    </svg>
                </a>
            </li>
            @foreach (AppHelper::getGuilds() as $sideBarGuild)
                <li class="float-none">
                    <a href="{{ route('guild.settings', ['guild' => $sideBarGuild['id']]) }}"
                        class="flex items-center p-1 text-base font-normal @if (Route::is('guild.settings') && $sideBarGuild['id'] == Request::segment(1)) text-zinc-900 dark:text-zinc-100 bg-zinc-400 dark:bg-zinc-600 @endif rounded-lg dark:bg-zinc-700 bg-zinc-300 text-zinc-800 dark:text-zinc-200 hover:text-zinc-900 hover:bg-zinc-400 dark:hover:text-zinc-100 dark:hover:bg-zinc-600">
                        <div class="flex-shrink-0 w-full h-full transition duration-75">
                            @if ($sideBarGuild['icon'] != null)
                                <img src="{{ $sideBarGuild['icon'] }}" alt="{{ $sideBarGuild['name'] }}"
                                    class="w-full h-full rounded-lg">
                            @else
                                <div
                                    class="w-full h-full rounded-lg text-center text-xl flex justify-center align-center flex-col">
                                    <strong>{{ AppHelper::acronym($sideBarGuild['name']) }}</strong>
                                </div>
                            @endif
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="py-4 px-3 bg-zinc-100 dark:bg-zinc-900">
        <ul>
            <li class="float-none">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="flex items-center p-2 text-base font-normal text-zinc-500 rounded-lg dark:bg-zinc-700 bg-zinc-300 text-zinc-800 dark:text-zinc-200 hover:text-zinc-900 hover:bg-zinc-400 dark:hover:text-zinc-100 dark:hover:bg-zinc-600">
                    <svg class="flex-shrink-0 w-6 h-6 transition duration-75" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 512 512">
                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path
                            d="M160 416H96c-17.67 0-32-14.33-32-32V128c0-17.67 14.33-32 32-32h64c17.67 0 32-14.33 32-32S177.7 32 160 32H96C42.98 32 0 74.98 0 128v256c0 53.02 42.98 96 96 96h64c17.67 0 32-14.33 32-32S177.7 416 160 416zM502.6 233.4l-128-128c-12.51-12.51-32.76-12.49-45.25 0c-12.5 12.5-12.5 32.75 0 45.25L402.8 224H192C174.3 224 160 238.3 160 256s14.31 32 32 32h210.8l-73.38 73.38c-12.5 12.5-12.5 32.75 0 45.25s32.75 12.5 45.25 0l128-128C515.1 266.1 515.1 245.9 502.6 233.4z" />
                    </svg>
                </a>
            </li>
        </ul>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</aside>
