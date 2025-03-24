<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda Telefonica</title>
</head>
<body>
    <form action={{'/store'}} method = 'post'>
        @csrf
        <input type='text' name='nome' placeholder='Nome:' required>
        <input type="text" name='telefone1' placeholder="Número:" required>
        <select name = 'tipo_telefone1'>
            <option> -- </option>
            <?php
                foreach ($tipos_telefones as $key => $tipo){
                    echo ' <option name="aparelho1" value="' . $key . '">' . $tipo . '</option>';
                }
                ?>
        </select>
        <input type="text" name='telefone2' placeholder="Segundo Número:">
        <select name = 'tipo_telefone2'>
            <option> -- </option>
            <?php
                foreach ($tipos_telefones as $key => $tipo){
                    echo ' <option  name="aparelho2" value="' . $key . '">' . $tipo . '</option>';
                }
                ?>
        </select><br>
        <input type='text' name='cidade' placeholder="Cidade:">
        <input type='text' name='logradouro' placeholder="Endereço:" required><br>
        <input type='text' name='numero_endereco' placeholder="numero:"><br>
            <?php
                foreach ($categorias as $key => $categoria) {
                    echo ' <input type = "checkbox" name="categoria_id[]" value="' . $key .'">' . $categoria . '<br>';
                }
            ?>

            <br>
        <input type='submit'>
    </form>
</body>
</html>
