@props(['Title', 'subtitle'])
<div class="flex items-center py-4 whitespace-nowrap text-gray-600 text-base">

    <span class="text-gray-600">
        {{ $Title }}
    </span>

    <span class="mx-5">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd" />
        </svg>
    </span>

    <span class="text-primary">
        {{ $subtitle }}
    </span>
</div>
