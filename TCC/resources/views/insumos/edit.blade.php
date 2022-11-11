<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('insumos.update', $insumo->id) }}">
            @method('PUT')
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="nome" :value="__('NOME')" />

                <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="$insumo->nome" required autofocus />
            </div>

            <!-- descricao -->
            <div class="mt-4">
                <x-input-label for="descricao" :value="__('DESCRIÇÃO')" />

                <textarea name="descricao" cols="43" rows="5" required>{{$insumo->descricao}}</textarea>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('insumos.index') }}">
                    {{ __('Voltar') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
