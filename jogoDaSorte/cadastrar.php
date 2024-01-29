<?php
    require_once 'classes/usuarios.php';
    $u = new usuario;
?>
<html lang="pt-br">
<head>
    <title>sistema de login</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styler/estilo.css">
</head>
<body>
    <!-- Seta voltar -->
    <div class="seta-space">

            <a href="index.php"><img src="img/seta-esquerda.png"></a>
       
    </div><!-- seta-space -->

    <!-- Formulario -->
    <div id="corpo-form" style="margin-top: 55px">
        <h1>Cadastrar!</h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome completo" maxlength="150">
            <input type="text" name="telefone" placeholder="Telefone" maxlength="11">
            <input type="email" name="email" placeholder="E-mail" maxlength="100">
            <input type="password" name="senha" placeholder="Senha" maxlength="15">
            <input type="password" name="confSenha" placeholder="Confirmar senha" maxlength="15">  
            <input type="submit" value="CADASTRAR">
        </form>
    </div>
<?php
// verificar se a pessoa clicou no botão cadastra atravez do metodo post
    if(isset($_POST['nome'])){
        $nome = addslashes($_POST['nome']);  
        $telefone = addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $confirmarSenha = addslashes($_POST['confSenha']);
        // verificar se esta preenchido
        if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)){
            $u->conectar("tela_login","localhost","root","1714");
            if($u->msgERRO == ""){ /// sem erro
                if($senha == $confirmarSenha){
                    if($u->cadastrar($nome,$telefone,$email,$senha)){
                        echo"<h3 id='resposta-certa'>cadastrado com sucesso</h3>";
                    }else{
                        echo"<h3 id='resposta-errada'>E-MAIL JÁ CADASTRADO</h3>";
                    }
                }else{
                    echo "<h3 id='resposta-errada'>SENHAS INCOMPATÍVEIS</h3>";
                }
                
            }else{
                echo "<h3 id='resposta-errada'>ERRO: ". $u->$msgERRO."</h3>";
            }
        }else{  
           echo"<h3 id='resposta-errada'>PREENCHA TODOS OS CAMPOS</h3>";
        }
    }
?>
</body>
</html>