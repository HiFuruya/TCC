<x-app-layout>
    <div align="right">
        <a  href="{{ route('negociantes.create') }}" class="btn btn-primary">Adicionar
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
            </svg>
        </a>
    </div>

    <x-slot name="header">
        <h2 class="font-semibold text-xxl text-center text-gray-800 leading-tight">
            {{ __('NEGOCIANTES') }}
        </h2>
    </x-slot>

            <table class="table align-middle table-striped text-center" >
                <thead>
                <tr>
                    <th scope="col">NEGOCIANTE</th>
                    <th scope="col" class="d-none d-md-table-cell">TELEFONE</th>
                    <th scope="col" class="d-none d-md-table-cell">TIPO</th>
                    <th scope="col">OPÇÕES</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($negociantes as $item)
                        <tr>
                            <td>{{ $item->nome }}</td>
                            <td class="d-none d-md-table-cell">{{ $item->telefone }}</td>
                            <td class="d-none d-md-table-cell">@if($item->tipo == 1)
                                    COMPRADOR
                                @else
                                    VENDEDOR
                                @endif
                            </td>
                                <td>
                                        <button class="d-md-none btn btn-primary" nohref style="cursor:pointer" onclick="showInfoModal(['NEGOCIANTE: {{$item->nome}}', 'TELEFONE: {{$item->telefone}}', 'TIPO: @if($item->tipo == 1) COMPRADOR @else VENDEDOR @endif'])" class="btn btn-primary">
                                            <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                            </svg>
                                        </button>

                                        <a href= "{{ route('negociantes.edit', $item->id) }}" class="btn btn-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                        </a>

                                        <button type="submit" onclick="showRemoveModal('{{ $item->id }}', '{{ $item->nome }}')" class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                            </svg>
                                        </button>

                                </td>
                            </td>
                            <form action="{{ route('negociantes.destroy', $item->id) }}" method="POST" id="form_{{$item->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

</x-app-layout>
