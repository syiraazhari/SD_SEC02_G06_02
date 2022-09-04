<div
    {{ $attributes->merge(['class' => 'flex items-center px-4 py-2 transition-colors duration-200 transform rounded-md  hover:border-primary hover:border  hover:text-primary']) }}>
    {{ $slot }}
</div>
