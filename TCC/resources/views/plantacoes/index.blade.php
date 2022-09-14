<x-app-layout>

    <div class="text-center">
        <a  href="{{ route('plantacoes.create') }}">Nova Plantação</a>
    </div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Plantações') }}
        </h2>
    </x-slot>
</x-app-layout>