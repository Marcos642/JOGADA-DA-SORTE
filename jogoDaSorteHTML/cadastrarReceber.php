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
    <div id="corpo-form" style="margin-top: 120px">
        <h1>Cadastrar para receber ajuda!</h1>
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
                        echo"cadastrado com sucesso";
                    }else{
                        echo"email já cadastrado!";
                    }
                }else{
                    echo "senhas não coorespondem";
                }
                
            }else{
                echo "erro: ". $u->$msgERRO;
            }
        }else{  
           echo"preencha todos os campos";
        }


    }
?>
</body>
</html>