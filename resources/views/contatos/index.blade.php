<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <style>
        table, th, td {
          border: 2px solid rgb(0, 0, 0);
          border-collapse: collapse;
          background-color: white;
          text-align: center;
          padding: 15px;
          font-family: Arial;
        }
        body {
            background-color: blanchedalmond;
            margin-left: 17%;
            margin-top: 150px;
            font-family: 'Arial', 'Helvetica Neue', sans-serif;
        }
        a {
            border: 1px solid;
            background-color: #EFEFEF;
            border-color: black;
            color: black;
            padding: 4px;
            display: inline-block;
            text-decoration: none;
            margin-left: 8px;
            margin-right: 8px;
        }

        a:hover {
            background-color: #E5E5E5;
        }

        #apagar:hover{
            background-color: red
        }
        button {
            margin-top: 15px;
            padding: 7px;

        }

    </style>
</head>
<body>
    <table>
        <tr>
            <th> Nome <i class="fa-solid fa-user"></i> </th>
            <th> Telefone <i class="fa-solid fa-phone"></i></th>
            <th> Telefone 2 <i class="fa-solid fa-phone"></i> </th>
            <th> Cidade <i class="fa-solid fa-city"></i></th>
            <th> Logradouro <i class="fa-solid fa-tree-city"></i></th>
            <th> Número Res.<i class="fa-solid fa-house"></i> </th>
            <th> Categorias <i class="fa-regular fa-pen-to-square"></i></th>
            <th> Ações <i class="fa-solid fa-screwdriver-wrench"></i> </th>
        </tr>

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

                        <a href ="{{route('contatos.show', $contato->id)}}">Exibir <i class="fa-solid fa-eye"></i></a>
                        <a href="{{route('contatos.edit', $contato->id)}}">Editar <i class="fa-solid fa-pen"></i></a>
                    </td>

            @endforeach
    </table>
   <form action="{{route('contatos.create')}}" method="GET">
        @method('GET')
        <button type="submit">Novo Contato<i class="fa-solid fa-user-plus"></i></button>
   </form>
   <script src="https://kit.fontawesome.com/331063e240.js" crossorigin="anonymous"></script>
</body>
</html>
