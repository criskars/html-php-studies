<?php require_once("../../conexao/conexao.php"); 
// Verificação de login
if (isset($_POST["usuario"])) {
    $login = "SELECT * FROM clientes WHERE usuario = '{$_POST["usuario"]}' AND senha = '{$_POST["senha"]}' ";
    $acesso = mysqli_query($con, $login);
    if (!$acesso) {
        die("Falha na consulta ao banco");
    }
    $informacao = mysqli_fetch_assoc($acesso);
    if (empty($informacao)) {
        echo "<script>alert('Login sem sucesso!');</script>";
    } else {
        // Criar a sessão
        session_start();
        $_SESSION["usuario"] = $informacao["clienteID"];
        header("location: listagem.php");
    }
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP Integração com MySQL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/login.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("../_incluir/topo.php"); ?>
        <?php include_once("../_incluir/funcoes.php"); ?>
        
        <main>  
            <div id="janela_login">
                <form action="login.php" method="post">
                    <h2>Tela de login</h2>
                    <input type="text" name="usuario" placeholder="Digite seu usuário">
                    <input type="password" name="senha" placeholder="Digite sua senha">
                    <input type="submit" value="Login">
                </form>
            </div>
        </main>

        <?php include_once("../_incluir/rodape.php"); ?>  
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($con);
?>