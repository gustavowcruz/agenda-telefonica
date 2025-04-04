<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda Telefônica</title>
    <style>
        div#corpo{
            background-color: #ffffff;
            margin: 0px 300px 10px 475px;
            padding: 50px;
            padding-bottom: 10px;
            border-color: #E5E5E5;
            border-radius: 15px;
        }
        input {
            padding: 15px;
            margin: 7px 10px 10px 7px;
        }
        body{
            margin-right: 250px;
            background-color: blanchedalmond;
            font-family: Arial, Helvetica, sans-serif;
        }
        label.textos{
            margin-left: 30px;
        }
        h1{
            text-align: center;
            color: #868585;
        }
        button{
            padding: 20px;
            margin-top: 10px;
            margin-bottom: 30px;
            border-radius: 7px;
            font-size: 17px;
            cursor: pointer;
        }
        button#apagar:hover{
            background-color: red;
            color: white ;
            transition: 0.25s;
        }
        button#salvar:hover{
            background-color: rgb(114, 199, 132);
            color: white;
            transition: 0.25s;
        }
        button#voltar{
            margin-top: 10px;
        }
        button#voltar:hover{
            background-color: #dfdcdc;
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
        a:hover {
            background-color: #E5E5E5;
        }
        a.info{
            padding: 20px;
            position: relative;
            border-radius: 7px;
            border-width: 2px;
            border-color: black;
        }
        a.info:hover{
            color: white;
            background-color: #6790c5;
            transition: 0.25s;
        }
        b.obrigatorio{
            color:red;
        }
        label.tipos {
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <div id=corpo>
        @isset($contato)
            <h1>{{$contato->nome;}} <i class="fa-solid fa-user"></i></h1><br>
            <form action="{{route('contatos.update', $contato->id)}}" method="POST">
            @method('PUT')
        @else
            <h1> Novo contato <i class="fa-solid fa-user-plus"></i></h1><br>
            <form action={{route('contatos.store')}} method = 'POST' enctype="multipart/form-data">
            @method('POST')
        @endisset
        @csrf
        <div id='contatos'>

            <label>Nome <i class="fa-solid fa-user"></i><b class= obrigatorio> * </b></label><br>
            <label>Adcionar imagem</label>
            <input type="file" name="imagem" accept="image/*" {{isset($form) ? $form : ' ' }}><br>
            <input type='text' name='nome' value="{{isset($contato) ? $contato->nome : null}}" placeholder='Nome' pattern="[a-zA-Z0-9\s]+" required {{isset($form) ? $form : ' ' }}><br>
            <label> Número <i class="fa-solid fa-phone"></i> <b class= obrigatorio> * </b></label><br>

            <input type="text" name='telefone1' value="{{isset($contato) ? $contato->primeiroTelefone : null}}" pattern="[0-9\s\-_\']+"  placeholder="Digite apenas números" required {{isset($form) ? $form : ' ' }}><br>
            <label>Modelo <i class="fa-solid fa-mobile-screen"></i><b class= obrigatorio> * </b></label><br>
                @foreach ($tipos_telefones as $key => $tipo)
                    <input type="radio" name="tipo_telefone1" value="{{$key}}"{{$checked = isset($contato) && $contato->telefones->get(0)->tipo_telefone_id == $key ? 'checked' : null;}} {{$disabled = isset($form) ? $form : null;}}>
                    <label> {{$tipo}} </label><br>
                @endforeach
            <label>Segundo número <i class="fa-solid fa-phone"></i></label><br>
            <input type="tel" name='telefone2' value="{{isset($contato) && null != ($contato->telefones->get(1)) ? $contato->telefones->get(1)->numero : null}}" pattern="[0-9\s\-_\']+" placeholder="Digite APENAS números" {{$disabled = isset($form) ? $form : ' '}}><br>
            <label>Modelo <i class="fa-solid fa-mobile-screen"></i></label><br>
            @foreach ($tipos_telefones as $key => $tipo)
                <input type="radio" name="tipo_telefone2" value="{{$key}}" {{$checked = isset($contato) && isset($contato->telefones->get(1)->tipo_telefone_id) == $key ? 'checked' : ' ';}} {{$disabled = isset($form) ? $form : null;}}>
                <label> {{$tipo}} </label><br>
            @endforeach
        </div>
        <div id='enderecos'>
            <label>Cidade <i class="fa-solid fa-city"></i> <b class= obrigatorio> * </b></label><br>
            <input type='text' name='cidade' placeholder="Cidade" value="{{isset($contato) ? $contato->enderecos->get(0)->cidade:null}}" {{$disabled = isset($form) ? $form : ' ' }} required><br>
            <label> Logradouro <i class="fa-solid fa-tree-city"></i><b class= obrigatorio> * </b><label><br>
            <input type='text' name='logradouro' placeholder="Logradouro" value ="{{isset($contato) ? $contato->enderecos->get(0)->logradouro:null}}" required {{$disabled = isset($form) ? $form : ' ' }}><br>
            <label> Número residencial <i class="fa-solid fa-house"></i></label><br>

            <input type='text' name='numero_endereco' placeholder="Número" value = "{{isset($contato) ? $contato->enderecos->get(0)->numero : null}}" {{$disabled = isset($form) ? $form : ' ' }}><br>
        </div>

        <div id=categorias>
            <label> Categorias <i class="fa-regular fa-pen-to-square"></i></label><br>
                @foreach ($categorias as $key => $categoria)
                    <input type = "checkbox" name="categoria_id[]" value="{{$key}}"{{$checked = isset($contato) && $contato->categorias->contains($key) ? 'checked' : null;}} {{ $disabled = isset($form) ? $form : null;}}> {{$categoria}} <br>
                @endforeach
            </div>
            <br>
        <button id='salvar' type='submit'{{isset($form) ? $form : ' ' }}> Salvar <i class="fa-solid fa-floppy-disk"></i></button><br>
    </form>

    @isset($contato)

        @isset($form)
            <a class='info' href="{{route('contatos.edit', ['id' => $contato->id])}}"> Editar <i class="fa-solid fa-pen"></i></a><br>
                .
        @else
            <a class='info' href="{{route('contatos.show', ['id' => $contato->id])}}"> Visualizar <i class="fa-solid fa-eye"></i></a><br>
                .
        @endisset

        <form action="{{ route('contatos.destroy', $contato->id)}}" method='POST'>
            @csrf
            @method('DELETE')
                <button id=apagar type="submit" onclick="return confirm('Tem certeza que deseja apagar este contato?')" {{isset($form) ? $form : ' ' }}> Apagar <i class="fa-solid fa-trash"></i> </button>
        </form>

    @endisset
    <form action="{{route('contatos.index')}}" method='GET'>
        <button id='voltar' type="submit">Voltar </button>
    </form>
    <div>
    <script src="https://kit.fontawesome.com/331063e240.js" crossorigin="anonymous"></script>

</body>
</html>
