<?php session_start();?>

    <?php include_once("template/global.php"); ?>
    <?php include_once("template/header.php"); ?>
    <?php
    if (isset($_SESSION['add'])) {
    if (isset($_SESSION['adm'])) {
        if (isset($_SESSION['usuario'])) {
            header("Location: /usuario.php");
        }
        if (isset($_SESSION['vereditar'])) {
            header("Location: /listagem.php");
        }

        if (
            isset($_POST['nome']) and
            isset($_POST['valor']) and
            isset($_POST['quantidade'])
        ) {
            $sql = "INSERT INTO `produtos`(nome, valor, quantidade, validade) VALUES (:nome, :valor, :quantidade, :validade);";
            $prepare = $conexao->prepare($sql);
            $prepare->bindValue(":nome", $_POST['nome']);
            $prepare->bindValue(":valor", $_POST['valor']);
            $prepare->bindValue(":quantidade", $_POST['quantidade']);
            $prepare->bindValue(":validade", $_POST['validade']);
            $prepare->execute();


        }
        ?>
        <a href="listagem.php" class="button tiny right">Ver Lista</a>
        <a href="sair.php" class="button tiny left">SAIR</a>
        <form method="post">
            <div class="row">
                <div class="small-12 medium-12 large-12 columns">

                    <label>
                        Nome:
                        <input type="text" name="nome"/>
                    </label>
                </div>
                <div class="small-12 medium-12 large-12 columns">

                    <label>
                        Valor:
                        <input type="text" name="valor"/>
                    </label>
                </div>
                <div class="small-12 medium-12 large-12 columns">

                    <label>
                        Quantidade:
                        <input type="text" name="quantidade"/>
                    </label>
                </div>
                <div class="small-12 medium-12 large-12 columns">

                    <label>
                        Validade:
                        <input type="text" name="validade"/>
                    </label>
                </div>
                <div class="small-12 medium-12 large-12 columns">

                    <label>
                        <input class="button tiny" type="submit" value="Enviar"/>
                    </label>
                </div>
            </div>
        </form>
    <?php

    }} else {
        header("Location: /usuario.php");

}
?>
<?php include_once ("template/footer.php"); ?>