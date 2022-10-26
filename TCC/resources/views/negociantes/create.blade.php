<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('negociantes.store') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="nome" :value="__('NOME')" />

                <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus />
            </div>

            <!-- Telefone -->
            <div class="mt-4">
                <x-input-label for="telefone" :value="__('TELEFONE')" />

                <x-text-input id="telefone" class="block mt-1 w-full" type="number" name="telefone" :value="old('telefone')" required />
            </div>

            <div class="row">
                <div class="mb-4">
                    <div class="form-check form-check-inline p-0 m-0 ">
                        <label class="btn-group" data-toggle="buttons" ">
                            <input type="radio" name="tipo" value="1"/>COMPRADOR
                        </label>
                        <label class="btn btn-primary ">
                            <input type="radio" name="tipo" value="0"/>VENDEDOR
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('negociantes.index') }}">
                    {{ __('Voltar') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
