<?php
    // dump($contatos);
    foreach ($contatos as $contato) {
        echo $contato->nome . '<br>' ;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<body>
    <a href=" {{route('contatos.create')}}"> Criar contato</a>
</body>
</html>
