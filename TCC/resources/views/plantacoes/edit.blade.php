<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('plantacoes.update', $plantacao) }}">
            @csrf
            @method('PUT')
            
            <!-- Name -->
            <div>
                <x-input-label for="nome" :value="__('NOME')" />

                <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="$plantacao->nome" required autofocus />
            </div>

            <!-- Planta  -->

            <div class="row">
                <div class="mt-4" >
                    <x-input-label for="planta" :value="__('TIPO DA PLANTAÇÃO')" />
                    <div class="form-floating mb-3 ">
                        <select name="planta_id" 
                                class="form-control"
                                id="planta"
                                required>
                            </option>
                            @foreach($plantas as $i)                        
                                <option value="{{$i->id}}"
                                    @if($plantacao->planta_id == $i->id) 
                                        selected
                                    @endif>
                                    {{$i->nome}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Lua  -->
            <div class="row">
                <div class="mt-4" >
                    <x-input-label for="lua" :value="__('LUA DO PLANTIO')" />
                    <div class="form-floating mb-3 ">
                        <select name="lua" 
                                class="form-control"
                                id="lua"
                                required>
                            <option value="CHEIA" @if($plantacao->lua == 'CHEIA') selected @endif>CHEIA</option>
                            <option value="NOVA" @if($plantacao->lua == 'NOVA') selected @endif>NOVA</option>
                            <option value="CRESCENTE" @if($plantacao->lua == 'CRESCENTE') selected @endif>CRESCENTE</option>
                            <option value="MINGUANTE" @if($plantacao->lua == 'MINGUANTE') selected @endif>MINGUANTE</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Mudas  -->
            <div class="mt-4">
                <x-input-label for="mudas" :value="__('QUANTIDADE DE MUDAS')" />

                <x-text-input id="mudas" class="block mt-1 w-full" type="number" name="mudas" :value="$plantacao->mudas" required autofocus />
            </div>

            <!-- Plantio  -->
            <div class="mt-4">
                <x-input-label for="plantio" :value="__('DATA DO PLANTIO')"  />
                
                <x-text-input id="plantio" class="block mt-1 w-full" type="date" name="plantio" :value="$plantacao->plantio" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('plantacoes.index') }}">
                    {{ __('Voltar') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Registrar') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
