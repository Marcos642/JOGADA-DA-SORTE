<?php
    require_once "../classes/usuarios.php";
    $c = new usuario;
    $c->restringir();
    $c->conectar("tela_login","localhost","root","1714");
    $c->adicionarJogo();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/styles.css">
    <title>Panel de Gestão</title>
</head>
<body>
    
    <div class="container">
            <div class="sidebar">
                <div class="center">
                    <img src="../img/logo.png" alt="Devs Bet Logo">
                    <h2>Painel - Devs Bet</h2>
                </div> <!--  center -->

                <ul id="list">
                    <li>
                        <label for="jogos">Jogos</label>
                        <ul>
                        <li style="background-color: #2c3e50;"><a href="adicionarBilhete.php">Adicionar Bilhete</a></li>
                            <li><a href="removeJogo.php">Remover modalidade de Jogo</a></li>
                            <li><a href="removeUmBilhete.php">Remover Bilhete</a></li>
                        </ul>
                    </li>
                    <li>
                        <label for="clientes">Clientes</label>
                        <ul>
                            <li><a href="verClientes.php">Ver todos os clientes</a></li>
                            <li><a href="banClient.php">Banir Cliente</a></li>
                            <li><a href="viewBannedClients.php">Ver todos os clientes banidos</a></li>
                        </ul>
                    </li>
                    <li>
                        <label for="sobre">Sobre</label>
                        <ul>
                            <li><a href="editSobreNos.php">Editar Sobre nós</a></li>
                        </ul>
                    </li>
                    <!-- Add more labels and options as needed -->
                </ul>
            </div>

            <div class="content">
                <div id="addGame" class="tab">
                    <h2>Adicionar Modalidade de Jogo</h2>
                    <!-- Add the form or relevant content for adding a game here -->
                </div>
                <div id="removeGame" class="tab">
                    <h2>Remover Modalidade de Jogo</h2>
                    <!-- Add the form or relevant content for removing a game here -->
                </div>
                <div id="removeTicket" class="tab">
                    <h2>Remover Bilhete</h2>
                    <!-- Add the form or relevant content for removing a ticket here -->
                </div>
                <div id="viewClients" class="tab">
                    <h2>Ver Todos os Clientes</h2>
                    <!-- Add the content for viewing all clients here -->
                </div>
                <div id="banClient" class="tab">
                    <h2>Banir Cliente</h2>
                    <!-- Add the form or relevant content for banning a client here -->
                </div>
                <div id="viewBannedClients" class="tab">
                    <h2>Ver Todos os Clientes Banidos</h2>
                    <!-- Add the content for viewing all banned clients here -->
                </div>
                <div id="editAbout" class="tab">
                    <h2>Editar Sobre Nós</h2>
                    <!-- Add the form or relevant content for editing 'About Us' here -->
                </div>
                <!-- Add more tabs as needed -->
            </div>

        <!--//////////////////// LADO DIREITO //////////////////////-->
        <div class="sidebarDireira">
            <p>Cadastrar novo bilhete</p>
            <form method="POST">
                <input type="Nome" name="jogoAdd" placeholder="Nome do jogo">
                <input type="file" id="imagem_bilhete" accept="image/*"> <!--////-->
                <input type="submit" value="Cadastrar" name="cadastrarNovoJogo">
            </form>
        </div> <!-- sidebar-direita -->
    </div>
    


</body>
</html>
