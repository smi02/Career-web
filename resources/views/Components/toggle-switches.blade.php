<label class="ml-0.5 inline-flex items-center cursor-pointer">
    <input type="checkbox" value="" class="sr-only peer" required>
    <div
        class="relative w-7 h-4 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 
    dark:peer-focus:ring-blue-800 rounded-xl peer dark:bg-gray-700 peer-checked:after:translate-x-full
    rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute 
    after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-3 
    after:w-3 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
    </div>
    {{ $slot }}
</label>
