<?php
require_once "usuarios.php";
$u = new Usuario;
?>
    <head>
        <meta charset="utf-8">
        <title>Área Eleitoral</title>
    </head>
    <body>
        <div id="corpo-form">
        <h1>Login</h1>
        <form method="POST" >
            <input type="email" placeholder="Usuário" name="email">
            <input type="password" placeholder="Senha" name="senha">
            <input type="submit" value="ACESSAR">
            <a href="cadastrar.php">Ainda não tem cadastro para votar?<strong>Cadastre-se já e borá votar!</strong></a>
        </form>
        </div>
        <?php
        if(isset($_POST['email'])){
            $email  = addslashes($_POST['email']);
            $senha  = addslashes($_POST['senha']);

            if(!empty($email) && !empty($senha)){
                $u->conectar("bdprovaw2","localhost","root","");
                if($u->msg == ""){
                    if($u->logar($email, $senha)){
                        header("location: areaprivada.php");
                    }else{
                        echo "Ops! O e-mail ou a senha inseridos estão incorretos.";
                    }
                }else{
                    echo "Ops! Algo deu errado :/ ".$u->msgErro;
                }
            }else{
                echo "Por favor, preencha corretamente todos os campos obrigatórios.";
            }
        }
        ?>
    </body>
</html>
