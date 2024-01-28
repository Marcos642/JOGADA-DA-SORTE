<?php
    require_once 'classes/usuarios.php';
    $u = new usuario;
    $u->restringir();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inicio - Devs Bet</title>
    <link rel="stylesheet" href="styler/styleINICIO.css"/>
</head>
<body>
    <header>
        <a href="inicio.php"><img src="img/logo.png" alt="Jogo da Sorte Logo" class="logo"></a> 

        <!-- SISTEMA DE PESQUISA - INICIO -->
        <form method="POST">
                <input type="text" name="nome" list="esporte" placeholder="Pesquisar tipo de aposta"> 

                <datalist id="esporte">
                    <option value="futebol">
                    <option value="basquete">
                    <option value="tenis">
                    <option value="loteria">
                </datalist>

                <input  name="submit-pesquisa" type="submit" value="pesquisar">
        </form>

        <!-- SISTEMA DE PESQUISA - FIM -->

        <h1>Devs Bet</h1>
    </header>

    <nav>
        <a style="background-color: #282433; color: white;" href="inicio.php">Bilhetes</a>
        <a href="carrinho.php">Carrinho</a>
        <a href="meus_dados.php">Usuário</a>
        <a href="sobre_nos.php">Sobre Nós</a>
    </nav>
<!--/////////////// PAGINÇÃO ///////////////-->
    <?php
// CONEXÃO COM BANCO DE DADOS E AFINS
        $pagina = 1;
        if(isset($_GET['pagina'])){
            $pagina = filter_input(INPUT_GET, "pagina", FILTER_VALIDATE_INT);
        }
        if(!$pagina){
            $pagina = 1;
        }
        $limite = 9;
        $inicio = ($pagina * $limite) - $limite;
        /*SISTEMA DE PESQUISA*/
        if(isset($_POST['submit-pesquisa'])){
            $nome = $_POST['nome'];
        
            $pdo = new PDO('mysql:host=localhost;dbname=tela_login', 'root', '1714');
            $result = $pdo->query("SELECT id,nome FROM bilhetes WHERE nome = '$nome'")->fetchAll();
            /***/
            $registro = $pdo->query("SELECT COUNT(id) AS COUNT FROM bilhetes")->fetch()["COUNT"];
            // $paginas = ceil($registro / $limite);
        }else{
            $pdo = new PDO('mysql:host=localhost;dbname=tela_login', 'root', '1714');
            $result = $pdo->query("SELECT id,nome FROM bilhetes LIMIT $inicio,$limite")->fetchAll();
            /***/
            $registro = $pdo->query("SELECT COUNT(id) AS COUNT FROM bilhetes")->fetch()["COUNT"];
            $paginas = ceil($registro / $limite);
        }
    ?>
<!-- PARTE DO HTML -->
    
<div class="tickets">

    <?php foreach ($result as $item): ?>
        <div class="ticket">
            <h2>Bilhete <?= $item['id'] ?></h2> <!-- passar id via banco de dados -->
            <img src="img/<?= $item['nome'] ?>.png" alt="Bilhete 10">
            <p>Apostar em <?= $item['nome'] ?></p>
            <p>Compre ou adicione ao carrinho</p>
            <button>
                <a style="text-decoration: none;" href="pagamento_pix.php?id=<?= $item['id'] ?>">Comprar</a>
            </button>
            <button>
                <!-- <spam>Adicionar ao carrinho</spam> -->
                <?php
                    echo "<spam><a href='carrinho.php?acao=adicionar&id={$item['id']}'>Adicionar</a></spam>";
                ?>
                
            </button>
        </div>
    <?php endforeach ?>
</div>

  <!-- PASSAR OU VOLTAR PAGINAS -->
<div class="listar">
        <?php
             if(isset($_POST['submit-pesquisa'])){
                false;
             }else{
        ?>
                <?php if($pagina > 1): ?>
                    <a href="?pagina=1">primeiro</a>
                    <a href="?pagina=<?=$pagina - 1?>"><<</a>
                <?php endif ?>

                <?= "Page $pagina of $paginas" ?>

                <?php if($pagina < $paginas): ?>
                    <a href="?pagina=<?= $pagina + 1 ?>">>></a>
                    <a href="?pagina=<?= $paginas ?>">Última</a>
                <?php endif ?>
        <?php
             }
        ?>
    
<!-- </div> listar -->
<!--//////////////////////////////-->

    <footer>
        <p>Todos os direitos reservados &copy; 2023 Jogo da Sorte</p>
    </footer>
</body>
</html>





