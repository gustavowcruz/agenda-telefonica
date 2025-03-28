<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <style>
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }
        </style>
</head>
<body>
    <table>
        <tr>
            <th> Nome </th>
            <th> Telefone </th>
            <th>Telefone 2</th>
            <th> Cidade </th>
            <th> Logradouro </th>
            <th> Número Res. </th>
            <th> Categorias </th>
            <th> Ações </th>
        </tr>

        {{-- @dd($contatos->get(7)->telefones->first()->numero) --}}
            @foreach ($contatos as $contato)
                <tr><td> {{$contato->nome}} </td>
                    <td>
                        {{$contato->telefones->first()->numero}}
                        {{$contato->telefones->first()->tipo}}
                    </td>
                    <td>
                        {{isset($contato->telefones->get(1)->numero) ? $contato->telefones->get(1)->numero : ' '}}
                        {{isset($contato->telefones->get(1)->tipo_telefone_id) ? $contato->telefones->get(1)->tipo : ' '}}

                    </td>
                    <td>{{$contato->enderecos->first()->cidade}}</td>
                    <td>{{$contato->enderecos->first()->logradouro}}</td>
                    <td>{{$contato->enderecos->first()->numero}}</td>
                    <td>
                        {{$contato->categorias->pluck('classificacao')->implode(', ')}}
                    <td>

                        <a href ="{{route('contatos.show', $contato->id)}}">Exibir</a>
                        <a href="{{route('contatos.edit', $contato->id)}}">Editar</a>
                    </td>

            @endforeach
    </table>
   <form action="{{route('contatos.create')}}" method="GET">
        @method('GET')
        <button type="submit">Novo Contato</button>
   </form>
</body>
</html>
