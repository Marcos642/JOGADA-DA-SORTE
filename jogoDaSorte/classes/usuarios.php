<?php
class usuario{
public $pdo;
public $msgERRO = "";

public function conectar($nome, $host, $usuario, $senha){
    global $pdo;
    try{
        $pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);

        // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo  "conexao estbelecida com sucesso!";
    }catch(PDOException $e){
        $msgERRO = $e->getMessage();
    }   
}

public function cadastrar($nome,$telefone,$email,$senha){
    global $pdo;
    // verificar se ja existe email cadastrado
    $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
    $sql->bindValue(":e",$email);
    $sql->execute();
    if($sql->rowCount() > 0){
        return false;
    }else{
        // caso não, cadastre
        $sql = $pdo->prepare("INSERT INTO usuarios(nome, telefone, email, senha) VALUES(:n, :t, :e, :s)");
        $sql->bindValue(":n",$nome);
        $sql->bindValue(":t",$telefone);
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();
        return true;
    }
}

public function logar($email,$senha){
    global $pdo;
    // verificar se email e senha estão cadastrados
    $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
    $sql->bindValue(":e",$email);
    $sql->bindValue(":s",md5($senha));
    $sql->execute();

    if($sql->rowCount() > 0){
        // entrar no sistema
        $dado = $sql->fetch(); // tranformar e array para pegar o id
        session_start();
        $_SESSION['id_usuario'] = $dado['id_usuario']; // epenas um usuario logado
        return true;
    }else{
        return false;
    }
}


public function restringir(){
    session_start();
    if(!isset($_SESSION['id_usuario'])){
        header("location: index.php");
        exit;
    }else if(isset($_SESSION['email'])){
       $v1 = $_SESSION['email'];
       return $v1;
    }
}

// PAINEL DE GESTÃO

// PARA PAGINA: SOBRE NÓS
public function editSobreNos(){
    GLOBAL $pdo;
    if(isset($_POST['submit-sobre'])){
        $infoGerais = $_POST['infoGerais'];
        $endereco = $_POST['endereco'];
        $instagram = $_POST['instagram'];
        $email = $_POST['email'];

        $sql = "UPDATE sobre SET infoGerais ='$infoGerais', endereco ='$endereco', instagram ='$instagram', email ='$email'";
        $pdo->query($sql);
        echo "<p style='color: white; background-color: green; width: calc(100% - 26px); height: 45px; padding-top: 20px'>Atualização realizada!</p>";
    }
}

// ADIVIONAR JOGO
public function adicionarJogo(){
    global $pdo;
    if (isset($_POST['cadastrarNovoJogo'])) {
        $jogoAdd = $_POST['jogoAdd'];
    
            $sql = "INSERT INTO bilhetes(nome) VALUES(:nome)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome', $jogoAdd);
            $stmt->execute();

            // Redirecionar para uma página de confirmação
            header("Location: adicionarBilhete.php");
            exit();
    }
}

// deletea modalidade

public function deletarModalidade(){
    global $pdo;
    if(isset($_POST['deleterJogo'])){
        $jogoAPAGAR = $_POST['jogoAPAGAR'];
        $sql = "DELETE FROM bilhetes WHERE nome='$jogoAPAGAR'";
        $pdo->exec($sql);
        echo "DELETADOS CORRETAMENTE !!!";
    }

}

// deletea um único jogo

public function deletarUmJogo(){
    global $pdo;
    if(isset($_POST['deleterUmBilhete'])){
        $id = $_POST['id_apagar'];
        $sql = "DELETE FROM bilhetes WHERE id='$id'";
        $pdo->exec($sql);
        echo "DELETADOS CORRETAMENTE !!!";
    }

}

}
?>