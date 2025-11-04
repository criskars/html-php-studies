<?php
    $callback = isset($_GET['callback']) ? $_GET['callback'] : false;
    // abrir conexao
    $conecta = mysqli_connect("localhost","root","","website");

    $selecao = "SELECT nomeproduto, precounitario, imagempequena FROM produtos";
    $produtos = mysqli_query($conecta,$selecao);

    $retorno = array();
    while($linha = mysqli_fetch_object($produtos)) {
        $retorno[] = $linha;
    }   

    echo ($callback ? $callback . '(' . json_encode($retorno) . ');' : json_encode($retorno));
    
    // fechar conecta
    mysqli_close($conecta);
?>