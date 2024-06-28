@props(['active' => false])

<a {{ $attributes }}
    class=" block {{ $active ? 'bg-gray-100 text-blue-700' : 'hover:bg-gray-100 hover:text-blue-700' }}
            py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none
             focus:z-10 focus:ring-4 focus:ring-gray-100 "
            aria-current="{{ $active ? 'page' : 'false' }}">{{ $slot }}</a>
