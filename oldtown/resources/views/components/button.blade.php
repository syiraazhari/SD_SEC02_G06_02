<button
    {{ $attributes->merge(['class' => 'w-full border max-w-sm p-3 rounded-md bg-slate-800 text-white uppercase font-poppins  font-bold hover:bg-slate-600']) }}>
    {{ $slot }}
</button>
