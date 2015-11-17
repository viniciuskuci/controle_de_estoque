<?php session_start();?>

<?php include_once("template/global.php"); ?>
<?php include_once ("template/header.php");
if(!empty($_SESSION)) {
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
        }
        if (isset($_POST['busca']) and !empty($_POST['busca'])) {
            $b = $_POST['busca'];
            $a = $_POST['a'];

            $sql2 = "SELECT * FROM `produtos` where nome like :nome or valor like :valor;";
            $prepare = $conexao->prepare($sql2);
            $prepare->bindValue(":nome", "%" . $b . "%");
            $prepare->bindValue(":valor", "%" . $b . "%");

            $prepare->execute();
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




                    <tr>
                        <td><?= $linha['id'] ?></td>
                        <td><?= $linha['nome'] ?></td>
                        <td><?= $linha['valor'] ?></td>
                        <td><?= $linha['quantidade'] ?></td>
                        <td><?= $linha['validade'] ?></td>


                    </tr>


                <?php


                }
                ?></table>


            </table>
        </div>
    </center>

<?php
}
else{
    header("Location: /login.php");
}
?>

<?php include_once ("template/footer.php");?>
