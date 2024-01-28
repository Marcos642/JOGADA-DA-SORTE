<?php
    require_once 'classes/usuarios.php';
    $u = new usuario;
    $u->restringir();
    $pdo = new PDO('mysql:host=localhost;dbname=tela_login', 'root', '1714');
?>
<?php
    // Verifique se a ação está definida e é "adicionar"
if (isset($_GET['acao']) && $_GET['acao'] == 'adicionar') {
    $produto_id = $_GET['id'];

    // Verifique se o produto existe no banco de dados
    $query = "SELECT id,nome FROM bilhetes WHERE id = $produto_id";
    $resultado = $pdo->query($query);

    if ($resultado->rowCount() > 0) {
        $produto = $resultado->fetch(PDO::FETCH_ASSOC);

        // Inicialize o carrinho se ainda não existir
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = array();
        }

        // Adicione o produto ao carrinho se ele não estiver lá
        if (!isset($_SESSION['carrinho'][$produto_id])) {
            $_SESSION['carrinho'][$produto_id] = 1;
        }
    } else {
        echo "Produto não encontrado.";
    }
}


// Verifique se a ação está definida e é "remover"
if(isset($_GET['acao']) && $_GET['acao'] == "remover"){
    $produto_id = $_GET['id'];
    // remover produto
    if(isset($_SESSION['carrinho'][$produto_id])){
        unset($_SESSION['carrinho'][$produto_id]);
        // echo "Produto removido do carrinho.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Carrinho - Devs Bet</title>
    <link rel="stylesheet" href="styler/styleMEUSDADOS.css"/>
</head>
<body>
    <header>
        <a href="inicio.php"><img src="img/logo.png" alt="Jogo da Sorte Logo" class="logo"></a>
        <h1>Devs Bet</h1>
    </header>

    <nav>
        <a href="inicio.php">Bilhetes</a>
        <a style="background-color: #4caf50; color: white;" href="carrinho.php">Carrinho</a>
        <a href="meus_dados.php">Usuário</a>
        <a href="sobre_nos.php">Sobre Nós</a>
    </nav>

    <div class="center">
        <h2>Carrinho</h2>
        <p><strong>Itens no carrinho:</strong></p>
    </div>
    
    <div class="tickets center">
        <!-- Adicione aqui os bilhetes que estão no carrinho -->
        <?php
           if(isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
            foreach($_SESSION['carrinho'] as $produto_id => $quantidade) {
                
            // TRAZER O NOME DO PRODUTO NO CARRINHO USANDO O ID DA SESSAO
            $roda = "SELECT nome FROM bilhetes WHERE id = $produto_id";
            $stmt = $pdo->query($roda);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);      
        ?>

        

            <div class="ticket">
                <h3>Bilhete<?= $produto_id ?></h3>
                <img src="img/<?= $result["nome"] ?>.png" alt="Bilhete 5">
                <p>Descrição do bilhete <?= $produto_id ?></p>
                <button class="remove-button">
                    <?php echo "<a href='carrinho.php?acao=remover&id=$produto_id'>Remover do carrinho</a>" ?>
                </button>
            </div>
        <?php
            }
        }else{
            echo "<spam> Carrinho vazio</spam>";
        }
        ?>
    </div>

    <div class="center">
        <button class="pay-all-button"><a href="pagamento_pix_carrinho.php">Pagar Todos os Bilhetes</a></button>
        <button class="pay-all-button"><a href="inicio.php">Adicionar mais bilhetes ao carrinho</a></button>
    </div>

    <footer>
        <p>Todos os direitos reservados &copy; 2023 Jogo da Sorte</p>
    </footer>
</body>
</html>
