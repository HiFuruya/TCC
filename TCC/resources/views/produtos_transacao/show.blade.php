<x-app-layout>

    <div align="right">
        <a  href="{{ route('produtos_transacao.edit', $id) }}" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
            </svg>
        </a>
    </div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Produtos da Nota
        </h2>
    </x-slot>

    <h2 class="text-center">Tabela de <b>Produtos da Nota</b></h2>
            <table class="table align-middle table-striped text-center" >
                <thead>
                <tr>
                    <th scope="col">PRODUTO</th>
                    <th scope="col">PLANTAÇÃO</th>
                    <th scope="col">INFORMAÇÕES</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($transacoes as $item)
                        <tr>
                            <td>{{ $item->produto->nome}}</td>
                            <td>{{ $item->plantacao->nome}}</td>
                                <td>

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
