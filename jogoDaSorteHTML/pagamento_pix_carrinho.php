<?php
    require_once 'classes/usuarios.php';
    $u = new usuario;
    $u->restringir();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento - Devs Bet</title>
    <link rel="stylesheet" href="styler/stylePAGAMENTO.css"/>
</head>
<body>
    <header>
        <a href="inicio.php"><img src="img/logo.png" alt="Jogo da Sorte Logo" class="logo"></a>
        <h1>Devs Bet</h1>
    </header>

    <nav>
        <a href="inicio.php">Bilhetes</a>
        <a href="meus_dados.php">Usuário</a>
        <a href="carrinho.php">Carrinho</a>
        <a href="sobre_nos.php">Sobre Nós</a>
    </nav>

    <div class="content">
        <h2>Pagar todos os bilhetes</h2>
        <h2>Opções de Pagamento</h2>

        <div class="payment-options">
            <div class="payment-option" id="pix-option">
                <h3>Pagamento via PIX</h3>
                <p>Realize o pagamento escaneando o QR Code abaixo ou utilizando a chave PIX fornecida:</p>
                <img src="img/qr.jpg" alt="QR Code PIX" width="300">
                <p>Chave PIX: 1234567890</p>
                <p>Após efetuar o pagamento, aguarde a confirmação para receber os bilhetes comprados.</p>
            </div>

            <div class="payment-option" id="credit-card-option">
                <h3>Pagamento com Cartão de Crédito</h3>
                <p>Preencha os detalhes do seu cartão de crédito abaixo:</p>
                <img src="img/cartaoCredito.jpg" alt="QR Code PIX" width="300">
                <!-- Adicione os campos do cartão de crédito aqui -->
            </div>

            <div class="payment-option" id="boleto-option">
                <h3>Pagamento via Boleto Bancário</h3>
                <p>Imprima o boleto abaixo e efetue o pagamento em uma agência bancária:</p>
                <img src="img/boleto.jpg" alt="QR Code PIX" width="300">
                <!-- Adicione o boleto bancário aqui -->
            </div>
        </div>
    </div>

    <footer>
        <p>Todos os direitos reservados &copy; 2023 Jogo da Sorte</p>
    </footer>
</body>
</html>