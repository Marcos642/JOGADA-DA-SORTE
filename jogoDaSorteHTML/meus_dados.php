<?php
    require_once 'classes/usuarios.php';
    $u = new usuario;
    $ema = $u->restringir();
?>

<!-- LER dados do banco de dados atravez da sessão -->
<?php
    /**/
    if($ema){
        $pdo = new PDO('mysql:host=localhost;dbname=tela_login', 'root', '1714');
        $sql = "SELECT nome,telefone,email FROM usuarios WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $ema);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Meus Dados - Devs Bet</title>
    <link rel="stylesheet" href="styler/styleMEUSDADOS.css"/>
</head>
<body>
    <header>
        <a href="inicio.php"><img src="img/logo.png" alt="Jogo da Sorte Logo" class="logo"></a>
        <h1>Devs Bet</h1>
    </header>

    <nav>
        <a href="inicio.php">Bilhetes</a>
        <a href="carrinho.php">Carrinho</a>
        <a style="background-color: #4caf50; color: white;" href="meus_dados.php">Usuário</a>
        <a href="sobre_nos.php">Sobre Nós</a>
    </nav>

    <div class="center">
        <h2>Meus Dados</h2>
        <p><strong>Nome: </strong><?= $row['nome'] ?></p>
        <p><strong>Telefone: </strong> <?= $row['telefone'] ?></p>
        <p><strong>E-mail: </strong> <?= $row['email'] ?></p>
        <p><strong>Bilhetes Comprados:</strong></p>
    </div>
    
    <div class="tickets center">
        <div class="ticket">
            <h3>Bilhete 5</h3>
            <img src="img/loteria.png" alt="Bilhete 5">
            <p>Descrição do bilhete 5</p>
        </div>
        
        <div class="ticket">
            <h3>Bilhete 8</h3>
            <img src="img/futebol.png" alt="Bilhete 8">
            <p>Descrição do bilhete 8</p>
        </div>
        
        <div class="ticket">
            <h3>Bilhete 12</h3>
            <img src="img/basquete.png" alt="Bilhete 12">
            <p>Descrição do bilhete 12</p>
        </div>
    </div>

    <footer>
        <p>Todos os direitos reservados &copy; 2023 Jogo da Sorte</p>
    </footer>
</body>
</html>

