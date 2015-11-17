<?php session_start();?>

<?php include_once("template/global.php"); ?>
<?php include_once ("template/header.php"); ?>
<?php
if(isset($_SESSION['usuario'])){
    header("Location: /usuario.php");
}

if(!empty($_SESSION)){

    ?>
    <center>


        <a href="sair.php" class="button tiny left">SAIR</a>

        <div class="row">
            <div class="large-12 small-12 medium-12">
                <form method="post">

                    <input type="text" placeholder="Buscar" name="busca"/>
                    <input type="submit" class="button tiny" value="Buscar" name="a"/>

                </form>
            </div>
        </div>
        <?php
        if (empty($_POST['busca']) and isset($_POST['a'])) {
            echo "<font color='red' size='3.5px'>Digite um valor/nome para achar o que deseja!</font>";
            echo "<br/>";
            echo "<br/>";
        }
        if (isset($_POST['busca']) and !empty($_POST['busca'])) {
            $b = $_POST['busca'];
            $a = $_POST['a'];

            $sql2 = "SELECT * FROM `produtos` where nome like :nome or valor like :valor;";
            $prepare = $conexao->prepare($sql2);
            $prepare->bindValue(":nome", "%" . $b . "%");
            $prepare->bindValue(":valor", "%" . $b . "%");

            $prepare->execute();
            if($prepare->rowCount() == 0){
                $linha = $prepare->fetch(PDO::FETCH_ASSOC);
                echo "<font color='red'>nenhum produto encontrado!</font>";
            }
            while ($linha = $prepare->fetch(PDO::FETCH_ASSOC)) {


                echo " <table style='width: 100%;'>";
                echo "<tr>";
                echo "<td>Id:";
                echo $linha['id'];
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Nome: ";
                echo $linha['nome'];
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Valor: ";
                echo $linha['valor'];
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Quantidade:";
                echo $linha['quantidade'];
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Validade:";
                echo $linha['validade'];
                echo "</td>";
                echo "</tr>";

                echo "</table>";
            }
        }

        ?>

        <div class="large-12 small-12 medium-12 columns">Produtos Disponíveis:
            <br/>
            <br/>
            <table id="vizualizar" style="width: 100%">
                <tr>
                    <th>ID:</th>
                    <th>Nome:</th>
                    <th>Valor:</th>
                    <th>Quantidade:</th>
                    <th>Validade:</th>
                    <th></th>
                </tr>

                <?php
                $sql = "SELECT * FROM `produtos`";
                $prepare = $conexao->prepare($sql);
                $prepare->execute();
                while ($linha = $prepare->fetch(PDO::FETCH_ASSOC)) {

                    ?>


    '

                    <tr>
                        <td><?= $linha['id'] ?></td>
                        <td><?= $linha['nome'] ?></td>
                        <td><?= $linha['valor'] ?></td>
                        <td><?= $linha['quantidade'] ?></td>
                        <td><?= $linha['validade'] ?></td>

                        <?php if (isset($_SESSION['adm'])) { ?>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="excluir" value="<?= $linha['id'] ?>"/>
                                    <input style="width: 100%" type="submit" class="button tiny botao"
                                           value="Fechar">
                                </form>
                            </td>
                            
                        <?php } ?>
                        <?php if (isset($_SESSION['vereditar'])) { ?>

                            <td>
                                <form method="post">
                                    <input type="hidden" name="editar" value="<?= $linha['id'] ?>"/>
                                    <input type="submit" id="<?= $linha['id'] ?>" style="width: 100%"
                                           class="button tiny botao" value="Editar">
                                </form>
                            </td>
                        <?php } ?>
                    </tr>


                <?php


                }
                ?></table> <?php
            if (isset($_POST['excluir'])) {
                $sql0 = "insert into historico select *from produtos where `id`=:id;";
                $prepare = $conexao->prepare($sql0);
                $prepare->bindValue(":id", $_POST['excluir']);
                $prepare->execute();
                $sql_delete = "DELETE FROM produtos where `id`=:id;";
                $prepare = $conexao->prepare($sql_delete);
                $prepare->bindValue(":id", $_POST['excluir']);
                $prepare->execute();
            }
            if (isset($_POST['editar'])) {
                $sqla = "SELECT * FROM `produtos` WHERE `id`=:id;";
                $prepare = $conexao->prepare($sqla);
                $prepare->bindValue(":id", $_POST['editar']);
                $prepare->execute();
                while ($linha = $prepare->fetch(PDO::FETCH_ASSOC)) {


                    ?>
                    <form method="post">
                        <div class="row">
                            <div class="small-12 medium-12 large-12 columns">

                                <label>
                                    Nome:
                                    <input type="text" value="<?= $linha['nome'] ?>" name="nome"/>
                                </label>
                            </div>
                            <div class="small-12 medium-12 large-12 columns">

                                <label>
                                    Valor:
                                    <input type="text" value="<?= $linha['valor'] ?>" name="valor"/>
                                </label>
                            </div>
                            <div class="small-12 medium-12 large-12 columns">

                                <label>
                                    Quantidade:
                                    <input type="text" value="<?= $linha['quantidade'] ?>" name="quantidade"/>
                                </label>
                            </div>
                            <div class="small-12 medium-12 large-12 columns">

                                <label>
                                    Validade:
                                    <input type="text" value="<?= $linha['validade'] ?>" name="validade"/>
                                </label>
                            </div>
                            <div class="small-12 medium-12 large-12 columns">

                                <label>
                                    <input type="hidden" name="editar" value="<?= $linha['id'] ?>"/>
                                    <input name="editenviar" class="button tiny" type="submit" value="Enviar"/>
                                </label>
                            </div>
                        </div>
                    </form>
                <?php
                }
                ?>

            <?php

            }

            if (isset($_POST['editenviar'])) {
                $sqeditar = "UPDATE `produtos` SET  `nome`=:nome,`valor`=:valor,`quantidade`=:quantidade,`validade`=:validade WHERE `id`=:id;";
                $prepare = $conexao->prepare($sqeditar);
                $prepare->bindValue(":id", $_POST['editar']);
                $prepare->bindValue(":nome", $_POST['nome']);
                $prepare->bindValue(":valor", $_POST['valor']);
                $prepare->bindValue(":quantidade", $_POST['quantidade']);
                $prepare->bindValue(":validade", $_POST['validade']);
                $prepare->execute();
            }
            ?>


            </table>
        </div>
    </center>
<?php }
else{
    header("Location: /login.php");
}
?>
<?php include_once ("template/footer.php");?>
