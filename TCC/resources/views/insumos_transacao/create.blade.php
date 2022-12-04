<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('insumos_transacao.store', $id) }}">
            @csrf

            <div class="mt-1" >
                <x-input-label for="insumo" :value="__('INSUMO')" />
                <div class="form-floating mb-3">
                    <select name="insumo_id" 
                            class="form-control"
                            id="insumo"
                            required>
                        <option value=""></option>
                            @foreach($insumos as $i)                        
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
                <x-input-label for="quantidade" :value="__('QUANTIDADE')"  />
                <x-text-input id="quantidade" min="0.1" class="block mt-1 w-full" type="number" min="0.01" step=".01" name="quantidade" :value="old('quantidade')" required autofocus />
            </div>

            <!-- METODO  -->
            <div class="mt-4" >
                <x-input-label for="metodo" :value="__('MEDIDA')" />
                <div class="form-floating">
                    <select name="metodo" 
                                class="form-control"
                                id="metodo"
                                required>
                        <option value=""></option>
                        <option value="UNIDADE">UNIDADE</option>
                        <option value="QUILO">QUILO</option>
                        <option value="LITRO">LITRO</option>
                        <option value="CAIXA">CAIXA</option>
                        <option value="SACO">SACO</option>
                    </select>
                </div>
            </div>

            <!-- VALOR UNITÁRIO -->
            <div class="mt-4">
                <x-input-label for="valor_unitario" :value="__('VALOR UNITÁRIO')"  />
                <x-text-input id="valor_unitario" min="0.1" class="block mt-1 w-full" type="number" min="0.01" step=".01" name="valor_unitario" :value="old('valor_unitario')" required autofocus />
            </div>

            <!-- DESCONTO -->
            <div class="mt-4">
                <x-input-label for="desconto" :value="__('DESCONTO')"  />
                <x-text-input id="desconto" min="0.1" class="block mt-1 w-full" type="number" min="0.01" step=".01" name="desconto" :value="old('desconto')" autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('insumos_transacao.index', $id) }}">
                    {{ __('Voltar') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
