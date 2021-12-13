<?php
require_once "usuarios.php";
$u = new Usuario;
?>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Área de Login</title>
    </head>

    <body>
        <div id="corpo-form">
        <h1>Área de cadastro</h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome e Sobrenome:" maxlength="30">
            <input type="email" name="email" placeholder="Usuário:" maxlength="40">
            <input type="password" name="senha" placeholder="Senha:" maxlength="32">
            <input type="password" name="csenha" placeholder="Confirme sua senha:" maxlength="32">
            <input type="submit" value="Realizar Cadastro">
        </form>
        </div>

        <?php
        if(isset($_POST['nome'])){
            $nome = addslashes($_POST['nome']);
            $email  = addslashes($_POST['email']);
            $senha  = addslashes($_POST['senha']);
            $cSenha  = addslashes($_POST['csenha']);

            if(!empty($nome) && !empty($email) && !empty($senha) && !empty($cSenha)){
                $u->conectar("bdprovaw2","localhost","root","");
                if($u->msgErro == ""){
                    if($senha == $cSenha){
                        if($u->cadastrar($nome, $email, $senha)){
                            ?>
                            <a href="index.php">Eleitor cadastrado com sucesso. Agora é só fazer o Login para votar.</a>
                            <?php
                        }else{
                            echo "O usuário já é cadastrado no sistema.";
                        }
                    }else{
                        echo "Senhas diferem. Certifique-se que as duas senhas digitadam coincidem.";
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
