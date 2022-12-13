<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('insumos_transacao.update', $transacao->id) }}">
            @method('PUT')
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
                                <option value="{{$i->id}}" @if($i->id == $transacao->insumo_id) selected @endif>
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
                                <option value="{{$i->id}}" @if($i->id == $transacao->plantacao_id) selected @endif>
                                    {{$i->nome}}
                                </option>
                            @endforeach
                    </select>
                </div>
            </div>

            <!-- QUANTIDADE  -->
            <div class="mt-4">
                <x-input-label for="quantidade" :value="__('QUANTIDADE')"  />
                <x-text-input id="quantidade" min="0.1" class="block mt-1 w-full" type="number" min="0.01" step=".01" name="quantidade" :value="$transacao->quantidade" required autofocus />
            </div>

            <!-- METODO  -->
            <div class="mt-4" >
                <x-input-label for="metodo" :value="__('MEDIDA')" />
                <div class="form-floating">
                    <select name="metodo" 
                                class="form-control"
                                id="metodo"
                                required>
                        <option value="UNIDADE" @if($i->metodo == 'SACO') selected @endif>UNIDADE</option>
                        <option value="QUILO" @if($i->metodo == 'SACO') selected @endif>QUILO</option>
                        <option value="LITRO" @if($i->metodo == 'SACO') selected @endif>LITRO</option>
                        <option value="CAIXA" @if($i->metodo == 'SACO') selected @endif>CAIXA</option>
                        <option value="SACO" @if($i->metodo == 'SACO') selected @endif>SACO</option>
                    </select>
                </div>
            </div>

            <!-- VALOR UNITÁRIO -->
            <div class="mt-4">
                <x-input-label for="valor_unitario" :value="__('VALOR UNITÁRIO')"  />
                <x-text-input id="valor_unitario" min="0.1" class="block mt-1 w-full" type="number" min="0.01" step=".01" name="valor_unitario" :value="$transacao->valor_unitario" required autofocus />
            </div>

            <!-- DESCONTO -->
            <div class="mt-4">
                <x-input-label for="desconto" :value="__('DESCONTO')"  />
                <x-text-input id="desconto" min="0.1" class="block mt-1 w-full" type="number" step=".01" name="desconto" :value="$transacao->desconto" autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('insumos_transacao.index', $transacao->nota_id) }}">
                    {{ __('Voltar') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Registrar') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
