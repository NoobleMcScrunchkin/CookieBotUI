<a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-zinc-800 dark:bg-zinc-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-black uppercase tracking-widest hover:bg-zinc-700 dark:hover:bg-zinc-300 active:bg-zinc-900 dark:active:bg-zinc-100 focus:outline-none focus:border-zinc-900 dark:focus:border-zinc-100 focus:ring ring-zinc-300 dark:ring-zinc-700 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
