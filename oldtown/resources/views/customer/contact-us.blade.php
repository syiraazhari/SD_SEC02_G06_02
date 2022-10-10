@extends('layouts.app')

@section('content')
    <x-body>

        @livewire('navbar')
        @livewire('customer.contact-us')
        @livewire('footer')

        @include('includes.jquery')
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>

    </x-body>
@endsection
