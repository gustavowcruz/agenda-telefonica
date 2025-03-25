<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda Telefonica</title>
</head>
<body>
    @isset($contato)
        <form action="{{ route('contatos.update', $contato->id)}}" method="POST">
        @method('PUT')
    @else
        <form action={{ route('contatos.store')}} method = 'POST'>
        @method('POST')
    @endisset
        @csrf
        <input type='text' name='nome' value="{{isset($contato) ? $contato->nome:null}}" placeholder='Nome:' required {{isset($form) ? $form : ' ' }}>
        <input type="text" name='telefone1' value="{{isset($contato) ? $contato->primeiroTelefone : null}}" placeholder="Número:" required {{isset($form) ? $form : ' ' }}><br>
        <?php
            foreach ($tipos_telefones as $key => $tipo){
                $checked = isset($contato) && $contato->telefones->first()->tipo_telefone_id == $key ? 'checked' : null;
                $disabled = isset($form) ? $form : null;
                echo '<input type="radio" name="tipo_telefone1" value="' . $key .'" '.$checked . ' ' . $disabled . '>';

                echo '<label>' . $tipo . '</label><br>';
            }
        ?>

        <input type="text" name='telefone2' value="{{isset($contato) && null !=($contato->telefones->get(1)) ? $contato->telefones->get(1)->numero : null}}" placeholder="Segundo número:" {{isset($form) ? $form : ' '}}><br>
        <?php
            foreach ($tipos_telefones as $key => $tipo){
                $checked = isset($contato) && $contato->telefones->get(1)->tipo_telefone_id == $key ? 'checked' : null;
                $disabled = isset($form) ? $form : null;
                echo ' <input type="radio" name="tipo_telefone2" value="' . $key .'"' .$checked. ' ' .$disabled.'>';

                echo '<label>' . $tipo . '</label><br>';
            }
        ?>
        <input type='text' name='cidade' placeholder="Cidade:" value="{{isset($contato) ? $contato->enderecos->first()->cidade:null}}" {{isset($form) ? $form : ' ' }}>
        <input type='text' name='logradouro' placeholder="Logradouro:" value ="{{isset($contato) ? $contato->enderecos->first()->logradouro:null}}" required {{isset($form) ? $form : ' ' }}><br>
        <input type='text' name='numero_endereco' placeholder="Número:" value = "{{isset($contato) ? $contato->enderecos->first()->numero:null}}" {{isset($form) ? $form : ' ' }}><br>
            <?php
                foreach ($categorias as $key => $categoria) {
                    $checked = isset($contato) && $contato->categorias->contains($key) ? 'checked' : null;
                    $disabled = isset($form) ? $form : null;
                    echo ' <input type = "checkbox" name="categoria_id[]" value="' . $key .'"'.$checked . ' '.$disabled. '>' . $categoria . ' <br>';
                    // $checked = isset($contato) && $contato->telefones->first()->tipo_telefone_id == $key ? 'checked' : null;
                }
            ?>

            <br>
        <input type='submit' value = 'Salvar' {{isset($form) ? $form : ' ' }}>
    </form>
    @isset($contato)
        <form action="{{ route('contatos.destroy', $contato->id)}}" method='POST'>
            @csrf
            @method('DELETE')
            <button type="submit" {{isset($form) ? $form : ' ' }}> Apagar </button>
    @endisset
</body>
</html>
