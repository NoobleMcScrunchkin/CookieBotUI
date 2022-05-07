<aside
    class="w-full sm:w-16 sm:min-h-screen sticky bottom-0 sm:top-0 sm:h-full border-t-2 sm:border-t-0 sm:border-r-2 border-zinc-300 dark:border-zinc-700"
    aria-label="Sidebar">
    <div
        class="overflow-y-auto py-4 px-3 bg-zinc-50 rounded rounded-tl-none rounded-bl-none dark:bg-zinc-800 sm:min-h-screen">
        <ul class="sm:space-y-2 flex sm:block justify-between mx-8 sm:mx-0">
            <li class="sm:float-none float-left">
                <a href="{{ route('index') }}"
                    class="flex items-center p-2 text-base font-normal @if (Route::is('index')) text-zinc-900 dark:text-zinc-100  @else text-zinc-500 @endif rounded-lg hover:text-zinc-900 hover:bg-zinc-100 dark:hover:text-zinc-100 dark:hover:bg-zinc-700">
                    <svg class="flex-shrink-0 w-6 h-6 transition duration-75" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 576 512">
                        <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path
                            d="M575.8 255.5C575.8 273.5 560.8 287.6 543.8 287.6H511.8L512.5 447.7C512.5 450.5 512.3 453.1 512 455.8V472C512 494.1 494.1 512 472 512H456C454.9 512 453.8 511.1 452.7 511.9C451.3 511.1 449.9 512 448.5 512H392C369.9 512 352 494.1 352 472V384C352 366.3 337.7 352 320 352H256C238.3 352 224 366.3 224 384V472C224 494.1 206.1 512 184 512H128.1C126.6 512 125.1 511.9 123.6 511.8C122.4 511.9 121.2 512 120 512H104C81.91 512 64 494.1 64 472V360C64 359.1 64.03 358.1 64.09 357.2V287.6H32.05C14.02 287.6 0 273.5 0 255.5C0 246.5 3.004 238.5 10.01 231.5L266.4 8.016C273.4 1.002 281.4 0 288.4 0C295.4 0 303.4 2.004 309.5 7.014L564.8 231.5C572.8 238.5 576.9 246.5 575.8 255.5L575.8 255.5z">
                        </path>
                    </svg>
                </a>
            </li>
        </ul>
    </div>
</aside>
<div id="body-shadow" class="opacity-50 bg-black fixed top-0 left-0 w-full h-full z-40 hidden"></div>
<div id="search-field"
    class="hidden fixed top-16 sm:mx-0 z-50 sm:bottom-auto sm:top-14 sm:w-96 left-2 right-2 sm:left-16 p-2 bg-zinc-50 dark:bg-zinc-800 dark:text-white rounded-md sm:rounded-bl-none sm:rounded-tl-none border-2 sm:border-l-0 border-zinc-300 dark:border-zinc-700">
    <input
        class="w-full bg-zinc-200 appearance-none dark:bg-zinc-700 rounded border border-zinc-200 dark:border-zinc-700"
        type="text">
</div>
<div id="notification-field"
    class="hidden fixed bottom-20 max-h-96 sm:mx-0 z-50 sm:bottom-auto sm:top-36 sm:w-96 sm:mt-2 left-2 right-2 sm:left-16 p-3 bg-zinc-50 dark:bg-zinc-800 text-black dark:text-white rounded-md sm:rounded-bl-none sm:rounded-tl-none border-2 sm:border-l-0 border-zinc-300 dark:border-zinc-700 overflow-auto">
    <div class="w-full">
        <div class="ml-2 select-none">
            <svg class="w-8 h-8 inline" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path
                    d="M256 32V51.2C329 66.03 384 130.6 384 208V226.8C384 273.9 401.3 319.2 432.5 354.4L439.9 362.7C448.3 372.2 450.4 385.6 445.2 397.1C440 408.6 428.6 416 416 416H32C19.4 416 7.971 408.6 2.809 397.1C-2.353 385.6-.2883 372.2 8.084 362.7L15.5 354.4C46.74 319.2 64 273.9 64 226.8V208C64 130.6 118.1 66.03 192 51.2V32C192 14.33 206.3 0 224 0C241.7 0 256 14.33 256 32H256zM224 512C207 512 190.7 505.3 178.7 493.3C166.7 481.3 160 464.1 160 448H288C288 464.1 281.3 481.3 269.3 493.3C257.3 505.3 240.1 512 224 512z" />
            </svg>
            <div class="inline ml-2 leading-6 align-middle text-2xl">Notifications</div>
        </div>
        <div>
            @for ($i = 0; $i < 20; $i++)
                <div class="mt-4 w-full h-12 flex flex-row align-middle">
                    <img class="rounded-full w-12 h-12 inline-block select-none border border-gray-900 dark:border-gray-100"
                        src="https://via.placeholder.com/640" alt="Profile Picture">
                    <div class="inline-block h-12 grow ml-2 text-zinc-900 dark:text-zinc-100">
                        <div class="w-full break-normal h-6 leading-6 text-ellipsis overflow-hidden select-none">
                            Person's Name
                        </div>
                        <div
                            class="w-full break-normal text-xs text-zinc-700 dark:text-zinc-300 h-6 leading-3 text-ellipsis overflow-hidden select-none">
                            Something happened to something and this is a notification for it.
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>
