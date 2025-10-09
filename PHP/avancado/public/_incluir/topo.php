<header>
    <div id="header_central">
        <?php
        if (isset($_SESSION["usuario"])) {

            $consulta = "SELECT nomecompleto FROM clientes WHERE clienteID = {$_SESSION["usuario"]} ";
            $detalhe = mysqli_query($con, $consulta);
            if (!$detalhe) {
                die("Falha na consulta ao banco");
            }
            $dados = mysqli_fetch_assoc($detalhe);
        }
        ?>
        <?php if (isset($_SESSION["usuario"])) { ?>
            <div id="header_saudacao">
                <h5>Seja bem vindo,
                <?php

                echo "" . $dados["nomecompleto"];
                echo " | <a href='logout.php'>Sair</a>";
            }
                ?>
                </h5>
                <img src="/avancado/public/_assets/logo_andes.gif">
                <img src="/avancado/public/_assets/text_bnwcoffee.gif">
            </div>

    </div>
</header>