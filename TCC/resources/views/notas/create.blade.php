<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('notas.store') }}">
            @csrf

                <div class="mt-4" >
                    <x-input-label for="negociante" :value="__('NEGOCIANTE')" />
                    <div class="form-floating mb-3">
                        <select name="negociante_id" 
                                class="form-control"
                                id="negociante"
                                required>
                            <option value=""></option>
                            @foreach($negociantes as $i)                        
                                <option value="{{$i->id}}">
                                    {{$i->nome}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

            <!-- Emissão  -->
            <div class="mt-4">
                <x-input-label for="emissao" :value="__('DATA DO PLANTIO')"  />
                <x-text-input id="emissao" class="block mt-1 w-full" type="date" name="emissao" :value="old('emissao')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route($tipo.'.index') }}">
                    {{ __('Voltar') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
