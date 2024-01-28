<?php
    session_start();
    require_once "classes/usuarios.php";
    $u = new usuario;
?>
<html lang="pt-br">
<head>
    <title>sistema de login</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styler/estilo.css">
</head>
<body>
<div class="center">
    <div id="corpo-form2">
        <div class="center-content">
            <ul>
                <li>D</li>
                <li>E</li>
                <li>V</li>
                <li>S</li>
                <div id="space">
                <li>B</li>
                <li>E</li>
                <li>T</li>
                </div><!--space-->
                <!-- <li>S</li>
                <li>O</li>
                <li>R</li>
                <li>T</li>
                <li>E</li> -->
            </ul>
        </div>
    </div>
</div>

    <div id="corpo-form">
        <h1>Entrar!</h1>
        <form method="POST">
            <input type="email" name="email" placeholder="E-mail" maxlength="100">
            <input type="password" name="senha" placeholder="Senha" maxlength="15"> 
            <input type="submit" value="ACESSAR">
            <a href="cadastrar.php">Ainda não é inscrito?<strong>Cadastre-se!</strong></a>
        </form>
    </div>
<?php
    if(isset($_POST['email'])){
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $_SESSION['email'] = $email;

        if(!empty($email) && !empty($senha)){
            $u->conectar("tela_login","localhost","root","1714");
            if($u->msgERRO == ""){ /// sem erro
            if($u->logar($email,$senha)){
                header("location: inicio.php");

            }else{
                echo "Email ou senha incorreto!";
            }
        }else{
            echo "Preencha todos os campos!!";
        }
        }else{
            echo "erro: ". $u->$msgERRO;
        }    
    }
?>
</body>
</html>

