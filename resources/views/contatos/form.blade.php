<?php
    echo isset($contato) ? $contato->nome . '<br>' : null;
    echo '<br>';
    // dump($contatos);
    foreach ($categorias as $categoria) {
        echo $categoria . '<br>' ;
    }

    echo '<br>';

    foreach ($tipos_telefones as $tipo){
        echo $tipo . '<br>';
    }

?>
