<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-block items-center px-1 py-1  border hover:border-white border-transparent rounded-md font-semibold text-xs hover:text-gray-500 text-gray-400 uppercase tracking-widest bg-white hover:bg-white focus:bg-white active:bg-white focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
