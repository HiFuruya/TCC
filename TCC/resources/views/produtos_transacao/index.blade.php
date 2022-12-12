<x-app-layout>

    <div align="right">
        <a  href="{{ route('produtos_transacao.create', $nota[0]->id) }}" class="btn btn-primary">Adicionar
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
            </svg>
        </a>
    </div>

    <x-slot name="header">
        <h2 class="font-semibold text-xxl text-center text-gray-800 leading-tight">
           {{ __('PRODUTOS DA NOTA') }}
        </h2>
    </x-slot>

    <h2 class="text-center">COMPRA FEITA POR: {{$nota[0]->negociante->nome}}</h2>
    <h2 class="text-center">EMITIDO EM: {{$nota[0]->emissao}}</h2>
    <h2 class="text-center">VALOR TOTAL DA VENDA: {{$nota[0]->valor_total}}</h2>

            <table class="table align-middle table-striped text-center" >
                <thead>
                <tr>
                    <th scope="col">PRODUTO</th>
                    <th scope="col" class="d-none d-md-table-cell">PLANTAÇÃO</th>
                    <th scope="col" class="d-none d-md-table-cell">QUANTIDADE</th>
                    <th scope="col" class="d-none d-md-table-cell">MEDIDA</th>
                    <th scope="col" class="d-none d-md-table-cell">VALOR UNITÁRIO</th>
                    <th scope="col" class="d-none d-md-table-cell">DESCONTO</th>
                    <th scope="col" class="d-none d-md-table-cell">TOTAL</th>
                    <th scope="col">OPÇÕES</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($transacoes as $item)
                        <tr>
                            <td>{{ $item->produto->nome}}</td>
                            <td class="d-none d-md-table-cell">{{ $item->plantacao->nome}}</td>
                            <td class="d-none d-md-table-cell">{{ $item->quantidade}}</td>
                            <td class="d-none d-md-table-cell">{{ $item->metodo}}</td>
                            <td class="d-none d-md-table-cell">{{ $item->valor_unitario}}</td>
                            <td class="d-none d-md-table-cell">{{ $item->desconto}}</td>
                            <td class="d-none d-md-table-cell">{{ ($item->valor_total)}}</td>
                                <td>
                                    <button class="d-md-none btn btn-primary" nohref style="cursor:pointer" onclick="showInfoModal(['PRODUTO: {{$item->produto->nome}}', 'PLANTAÇÃO: {{$item->plantacao->nome}}', 'QUANTIDADE: {{$item->quantidade}}', 'VALOR UNITÁRIO: {{$item->valor_unitario}}', 'DESCONTO: {{$item->desconto}}', 'TOTAL: {{$item->valor_total}}'])" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                        </svg>
                                    </button>

                                    <button type="submit" onclick="showRemoveModal('{{ $item->id }}', '{{ $item->nome }}')" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg>
                                    </button>

                                </td>
                            </td>
                            <form action="{{route('produtos_transacao.destroy', $item->id)}}" method="POST" id="form_{{$item->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
</x-app-layout>
