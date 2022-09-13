<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('user.update', $user) }}">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" required />
            </div>

            <!-- CPF -->
            <div class="mt-4">
                <x-input-label for="cpf" :value="__('CPF')" />

                <x-text-input id="cpf" class="block mt-1 w-full" type="number" name="cpf" value="{{ $user->cpf }}"  required />
            </div>

            <!-- Inscrção Estadual -->
            <div class="mt-4">
                <x-input-label for="inscricao_estadual" :value="__('Inscrição Estadual')" />

                <x-text-input id="inscricao_estadual" class="block mt-1 w-full" type="number" name="inscricao_estadual" value="{{ $user->inscricao_estadual }}" required />
            </div>

            <!-- Endereço -->
            <div class="mt-4">
                <x-input-label for="endereco" :value="__('Endereço')" />

                <x-text-input id="endereco" class="block mt-1 w-full" type="text" name="endereco" value=" {{ $user->endereco }}" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/dashboard">
                    {{ __('Voltar') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Confirmar') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
