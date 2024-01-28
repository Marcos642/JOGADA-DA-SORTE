<?php
    require_once 'classes/usuarios.php';
    $u = new usuario;
    $u->restringir();
    $u->conectar("tela_login","localhost","root","1714");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sobre Nós - Devs Bet</title>
    <link rel="stylesheet" href="styler/styleSOBRENOS.css"/>
</head>
<body>
    <header>
        <a href="inicio.php"><img src="img/logo.png" alt="Jogo da Sorte Logo" class="logo"></a>
        <h1>Devs Bet</h1>
    </header>

    <nav>
        <a href="inicio.php">Bilhetes</a>
        <a href="carrinho.php">Carrinho</a>
        <a href="meus_dados.php">Usuário</a>
        <a style="background-color: #4caf50; color: white;" href="sobre_nos.php">Sobre Nós</a>
    </nav>

    <div class="content">
        <h2>Sobre Nós</h2>
        
          <?php
                $result = $pdo->query("SELECT * FROM sobre");
                foreach ($result as $thiss):
          ?>
              <p>  <?= $thiss['infoGerais'] ?> </p>
              <p>Entre em contato conosco para mais informações:</p>
              <ul>
                <li><strong>Endereço:</strong><?= $thiss['endereco'] ?></li>
                <li><strong>Instagram:</strong> <a href="https://www.instagram.com/jogodasorte"><?= $thiss['instagram'] ?></a></li>
                <li><strong>Gmail:</strong> <a href="mailto:contato@jogodasorte.com"><?= $thiss['email'] ?></a></li>
              </ul>
              <form class="contact-form">
                <label for="pergunta">Faça sua pergunta:</label>
                <input type="text" id="pergunta" name="pergunta" required>
                <input type="submit" value="Enviar Pergunta" name="enviar_pergunta">
              </form>

          <?php endforeach ?>
    </div>
    <footer>
        <p>Todos os direitos reservados &copy; 2023 Jogo da Sorte</p>
    </footer>
</body>
</html>
