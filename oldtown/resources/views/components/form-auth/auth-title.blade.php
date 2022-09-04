@props(['title', 'subtitle'])

<div class="mb-2 text-center">
    <h1 class="font-Prompt font-medium text-4xl tracking-[.22em] p-5 text-text-slate-800  md:mx-20 uppercase">
        {{ $title }}
    </h1>
    <hr class="border-t border-black mx-16">
    <p class="p-3 font-robotoSlab text-lg text-slate-800 "> {{ $subtitle }} </p>
</div>
