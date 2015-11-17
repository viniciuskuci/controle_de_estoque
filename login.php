<?php
session_start();

include_once("template/global.php");

if(isset($_SESSION['adm'])){header("Location: /listagem.php");
}
if(isset($_SESSION['usuario'])){
    header("Location: /usuario.php");
}
if(isset($_SESSION['vereditar'])){
    header("Location: /listagem.php");
}
if(isset($_SESSION['add'])){
    header("Location: /cadastro.php");
}
if(
    isset($_POST['email']) and
    isset($_POST['senha'])
) {
    $sql = "SELECT email, nome, id FROM `usuario` WHERE `email`=:email and `senha` = :senha;";
    $preparo = $conexao->prepare($sql);
    $preparo->bindValue(":email", $_POST['email']);
    $preparo->bindValue(":senha", $_POST['senha']);
    $preparo->execute();

    if ($preparo->rowCount() == 1) {
        $linha = $preparo->fetch(PDO::FETCH_ASSOC);
        $_SESSION['usuario'] = $linha;
    }
    if (
        isset($_POST['email']) and
        isset($_POST['senha'])
    ) {
        $sql = "SELECT email, nome, id FROM `vereditar` WHERE `email`=:email and `senha` = :senha;";
        $preparo = $conexao->prepare($sql);
        $preparo->bindValue(":email", $_POST['email']);
        $preparo->bindValue(":senha", $_POST['senha']);
        $preparo->execute();

        if ($preparo->rowCount() == 1) {
            $linha = $preparo->fetch(PDO::FETCH_ASSOC);
            $_SESSION['vereditar'] = $linha;
        }

        if (
            isset($_POST['email']) and
            isset($_POST['senha'])
        ) {
            $sql = "SELECT email, nome, id FROM `loginadd` WHERE `email`=:email and `senha` = :senha;";
            $preparo = $conexao->prepare($sql);
            $preparo->bindValue(":email", $_POST['email']);
            $preparo->bindValue(":senha", $_POST['senha']);
            $preparo->execute();

            if ($preparo->rowCount() == 1) {
                $linha = $preparo->fetch(PDO::FETCH_ASSOC);
                $_SESSION['add'] = $linha;
            } else {
                $sql = "SELECT email, nome, id FROM `adm` WHERE `email`=:email and `senha` = :senha;";
                $preparo = $conexao->prepare($sql);
                $preparo->bindValue(":email", $_POST['email']);
                $preparo->bindValue(":senha", $_POST['senha']);
                $preparo->execute();

                if ($preparo->rowCount() == 1) {
                    $linha = $preparo->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['adm'] = $linha;
                }
            }
        }
        if (
            !isset($_SESSION['adm']) and
            !isset($_SESSION['usuario']) and
            !isset($_SESSION['add'])
        ) {
            $msg = "Login incorreto!";
        } else {
            if (isset($_SESSION['adm'])) {
                header("Location: /listagem.php");
            }
            if (isset($_SESSION['usuario'])) {
                header("Location: /usuario.php");
            }
            if (isset($_SESSION['add'])) {
                header("Location: /cadastro.php");
            }
        }
    }
}
?>

<?php include_once ("template/header.php"); ?>

<?php  if(isset($msg)){ ?>
    <div data-alert class="alert-box alert">
        <?= $msg ?>
        <a href="#" class="close">&times;</a>
    </div>
<?php } ?>
<center>
    <form method="post" class="log">
        <div class="row">
            <div class="large-12 small-12 medium-12 columns">
                <label>
                    Email:
                    <input type="text" name="email" />
                </label>
            </div>
            <div class="large-12 small-12 medium-12 columns">
                <label>
                    Senha:
                    <input type="password" name="senha" />
                </label>
            </div>
            <div class="large-12 small-12 medium-12 columns">
                <input class="button tiny" type="submit" value="Entrar" />
            </div>
        </div>
    </form>

</center>
<?php include_once ("template/footer.php"); ?>