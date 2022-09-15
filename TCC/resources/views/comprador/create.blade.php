<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('comprador.store') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="nome" :value="__('Name')" />

                <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nmoe')" required autofocus />
            </div>

            <!-- Documento -->
            <div class="mt-4">
                <x-input-label for="doc" :value="__('CPF/CNPJ')" />

                <x-text-input id="doc" class="block mt-1 w-full" type="number" name="doc" :value="old('doc')" required />
            </div>

            <!-- Inscrção Estadual -->
            <div class="mt-4">
                <x-input-label for="inscricao_estadual" :value="__('Inscrição Estadual')" />

                <x-text-input id="inscricao_estadual" class="block mt-1 w-full" type="number" name="inscricao_estadual" :value="old('inscricao_estadual')" required />
            </div>

            <!-- Município -->
            <div class="mt-4">
                <x-input-label for="municipio" :value="__('Município')" />

                <x-text-input id="municipio" class="block mt-1 w-full" type="text" name="municipio" :value="old('municipio')" required />
            </div>

            <!-- Endereço -->
            <div class="mt-4">
                <x-input-label for="endereco" :value="__('Endereço')" />

                <x-text-input id="endereco" class="block mt-1 w-full" type="text" name="endereco" :value="old('endereco')" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('comprador.index') }}">
                    {{ __('Voltar') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
