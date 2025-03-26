<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<body>
    <table>
        <tr>
            <th> Nome </th>
            <th> Número </th>
            <th> Cidade </th>
            <th> Logradouro </th>
            <th> Número Res. </th>
            <th> Ações </th>
        </tr>

            @foreach ($contatos as $contato)
                <tr><td> {{$contato->nome}} </td>
                    <td>{{$contato->telefones->first()->numero}}</td>
                    <td>{{$contato->enderecos->first()->cidade}}</td>
                    <td>{{$contato->enderecos->first()->logradouro}}</td>
                    <td>{{$contato->enderecos->first()->numero}}</td>
                    <td>
                        <a href ="{{route('contatos.show', $contato->id)}}">Exibir</a>
                        <a href="{{route('contatos.edit', $contato->id)}}">Editar</a>
                    </td>

            @endforeach
    </table>
    <a href=" {{route('contatos.create')}}"> Criar contato</a>
</body>
</html>
