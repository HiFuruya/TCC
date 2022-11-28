<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('produtos_transacao.update', $id) }}">
            @csrf

            <div class="mt-4" >
                <x-input-label for="produtos" :value="__('PRODUTO')" />
                <div class="form-floating mb-3">
                    <select name="produto_id" 
                            class="form-control"
                            id="produtos"
                            required>
                        <option value=""></option>
                            @foreach($produtos as $i)                        
                                <option value="{{$i->id}}">
                                    {{$i->nome}}
                                </option>
                            @endforeach
                    </select>
                </div>
            </div>

            <!-- PLANTACAO  -->
            <div class="mt-4" >
                <x-input-label for="plantacao" :value="__('PLANTAÇÃO')" />
                <div class="form-floating mb-3">
                    <select name="plantacao_id" 
                            class="form-control"
                            id="plantacao"
                            required>
                        <option value=""></option>
                            @foreach($plantacoes as $i)                        
                                <option value="{{$i->id}}">
                                    {{$i->nome}}
                                </option>
                            @endforeach
                    </select>
                </div>
            </div>

            <!-- QUANTIDADE  -->
            <div class="mt-4">
                <x-input-label for="valor_unitario" :value="__('QUANTIDADE')"  />
                <x-text-input id="quantidade" class="block mt-1 w-full" type="number" name="quantidade" :value="old('quantidade')" required autofocus />
            </div>

            <!-- VALOR UNITÁRIO -->
            <div class="mt-4">
                <x-input-label for="valor_unitario" :value="__('VALOR UNITÁRIO')"  />
                <x-text-input id="valor_unitario" class="block mt-1 w-full" type="number" name="valor_unitario" :value="old('valor_unitario')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('produtos_transacao.show', $id) }}">
                    {{ __('Voltar') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
