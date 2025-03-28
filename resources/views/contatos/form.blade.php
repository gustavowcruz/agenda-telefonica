<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda Telefonica</title>
    <style>
        div{
            background-color: #ffffff;
            margin: 10px 300px 10px 400px;
            padding: 50px;
            border-color: #E5E5E5;
            border-radius: 15px;
        }
        input {
            padding: 10px;
            margin: 7px 10px 10px 7px;
        }
        body{
            margin-right: 250px;
            margin-bottom: 290px;
            background-color: blanchedalmond;
            font-family: Arial, Helvetica, sans-serif;
        }
        label{
            margin-left: 30px;
        }
        h1{
            text-align: center;
            color: #868585;
        }
        button{
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        a {
            border: 1px solid;
            border-color: rgb(129, 115, 115);
            border-radius: 4px;
            padding: 10px;
            background-color: #EFEFEF;
            margin-top: 50px;
            margin-bottom: 20px;
            color:black;
            text-decoration: none;
        }

        #apagar:hover{
            background-color: red;
            border-color: red;
            color: white ;
        }

        a:hover {
            background-color: #E5E5E5;
        }

    </style>
</head>
<body>
    <div id=corpo>
    @isset($contato)
        <form action="{{route('contatos.update', $contato->id)}}" method="POST">
        @method('PUT')
    @else
        <h1>Novo contato <i class="fa-solid fa-user-plus"></i></h1><br>
        <form action={{route('contatos.store')}} method = 'POST'>
        @method('POST')

    @endisset
        @csrf

        <label>Nome</label><br>
        <i class="fa-solid fa-user"></i>
        <input type='tel' name='nome' value="{{isset($contato) ? $contato->nome : null}}" placeholder='Nome:' required {{isset($form) ? $form : ' ' }}>
        <i class="fa-solid fa-phone"></i>
        <input type="text" name='telefone1' value="{{isset($contato) ? $contato->primeiroTelefone : null}}" placeholder="Número:" required {{isset($form) ? $form : ' ' }}><br>
            @foreach ($tipos_telefones as $key => $tipo)
                <input type="radio" name="tipo_telefone1" value="{{$key}}"{{$checked = isset($contato) && $contato->telefones->get(0)->tipo_telefone_id == $key ? 'checked' : null;}} {{$disabled = isset($form) ? $form : null;}}>
                <label> {{$tipo}} </label><br>
            @endforeach
        <i class="fa-solid fa-phone"></i>
        <input type="text" name='telefone2' value="{{isset($contato) && null != ($contato->telefones->get(1)) ? $contato->telefones->get(1)->numero : null}}" placeholder="Segundo número:" {{$disabled = isset($form) ? $form : ' '}}><br>


        @foreach ($tipos_telefones as $key => $tipo)
            <input type="radio" name="tipo_telefone2" value="{{$key}}" {{$checked = isset($contato) && isset($contato->telefones->get(1)->tipo_telefone_id) == $key ? 'checked' : ' ';}} {{$disabled = isset($form) ? $form : null;}}>
            <label> {{$tipo}} </label><br>
        @endforeach

        <i class="fa-solid fa-city"></i>
        <input type='text' name='cidade' placeholder="Cidade:" value="{{isset($contato) ? $contato->enderecos->get(0)->cidade:null}}" {{$disabled = isset($form) ? $form : ' ' }}>
        <i class="fa-solid fa-tree-city"></i>
        <input type='text' name='logradouro' placeholder="Logradouro:" value ="{{isset($contato) ? $contato->enderecos->get(0)->logradouro:null}}" required {{$disabled = isset($form) ? $form : ' ' }}><br>
        <i class="fa-solid fa-house"></i>
         <input type='text' name='numero_endereco' placeholder="Número:" value = "{{isset($contato) ? $contato->enderecos->get(0)->numero : null}}" {{$disabled = isset($form) ? $form : ' ' }}><br>

            @foreach ($categorias as $key => $categoria)
                <input type = "checkbox" name="categoria_id[]" value="{{$key}}"{{$checked = isset($contato) && $contato->categorias->contains($key) ? 'checked' : null;}} {{ $disabled = isset($form) ? $form : null;}}> {{$categoria}} <br>
            @endforeach

            <br>
        <button type='submit'{{isset($form) ? $form : ' ' }}> Salvar <i class="fa-solid fa-floppy-disk"></i></button><br>
    </form>

    @isset($contato)
        @isset($form)
            <a href="{{route('contatos.edit', ['id' => $contato->id])}}"> Editar <i class="fa-solid fa-pen"></i></a>
        @else
            <a href="{{route('contatos.show', ['id' => $contato->id])}}"> Visualizar <i class="fa-solid fa-eye"></i></a><br>
        @endisset

        <form action="{{ route('contatos.destroy', $contato->id)}}" method='POST'>
            @csrf
            @method('DELETE')
                <button id=apagar type="submit" onclick="return confirm('Tem certeza que deseja apagar este contato?')" {{isset($form) ? $form : ' ' }}> Apagar <i class="fa-solid fa-trash"></i> </button>
        </form>

    @endisset
    <form action="{{route('contatos.index')}}" method='GET'>
        <button type="submit">Voltar </button>
    </form>
    <div>
    <script src="https://kit.fontawesome.com/331063e240.js" crossorigin="anonymous"></script>
</body>
</html>
