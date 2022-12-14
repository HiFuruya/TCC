<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('produtos.update', $produto->id) }}">
            @method('PUT')
            @csrf
            
            <!-- Name -->
            <div class="mt-4">
                <x-input-label for="nome" :value="__('NOME')" />

                <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="$produto->nome" required autofocus />
            </div>

            <!-- Planta  -->

                <div class="mt-4" >
                    <x-input-label for="planta" :value="__('TIPO DA PLANTAÇÃO')" />
                    <div class="form-floating mb-3 ">
                        <select name="planta_id" 
                                class="form-control"
                                id="planta"
                                disabled>
                            <option>{{$produto->planta->nome}}</option>
                        </select>
                    </div>
                </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('produtos.index') }}">
                    {{ __('Voltar') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Registrar') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
