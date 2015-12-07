<?php
if(file_exists("global.php")){
include './global.php';
}
else if(file_exists("include/global.php")){
    include_once './include/global.php';
}
function salvar(){
    if(
            
        isset($_POST['nome']) and    
        isset($_POST['valor']) and  
        isset($_POST['quantidade'])  
            ){
        $nome = $_POST['nome'];
        $valor = $_POST['valor']; 
        $quantidade = $_POST['quantidade'];
        $validade = (isset($_POST['validade']) ? $_POST['validade'] : "");
        
        $SQL = "INSERT INTO `produtos`(`nome`, `valor`, `quantidade`, `validade`)VALUES (:nome,:valor,:quantidade,:validade)";
        $preparo = conexao()->prepare($SQL);
        $preparo->bindValue("nome", $nome);
        $preparo->bindValue("valor", $valor);
        $preparo->bindValue("quantidade", $quantidade);
        $preparo->bindValue("validade", $validade);
        $preparo->execute();
        if($preparo->rowCount()== 1){
            echo"Sucesso!";
            
        }
        else{
            echo"Falha ao registrar!";
        }
           
            }
}

function excluir(){
    if(isset($_GET['excluir'])){
    $id = $_GET['excluir']; 
    $SQL = "DELETE FROM `produtos` WHERE `id`=:id";
    $preparo = conexao()->prepare($SQL);
    $preparo->bindValue(":id", $id);
    $preparo->execute();
    if($preparo->rowCount() == 1){
        echo 'Sucesso!';
        
    }
    else{
        echo 'Erro!';
    }
}
}
function listar(){
    $SQL = "SELECT * FROM produtos WHERE 1;";
    $preparo = conexao()->prepare($SQL);
    $preparo->execute();
    while ($linha  = $preparo->fetch(PDO::FETCH_ASSOC)){
        echo"<tr>";
        echo"<td><a value='excluir' href='?excluir=".$linha['id']."'>Excluir</a></td>";
        echo"<td><a value='editar' href='?editar=".$linha['id']."'>Editar</a></td>";
        echo"<td>".$linha['id']."</td>";
        echo"<td>".$linha['nome']."</td>";
        echo"<td>".$linha['valor']."</td>";
        echo"<td>".$linha['quantidade']."</td>";
        echo"<td>".$linha['validade']."</td>";
        echo"</tr>";
    }
    
}
function editar(){
     if (isset($_GET['editar'])) {
                $sqla = "SELECT * FROM `produtos` WHERE `id`=:id;";
                $prepare = conexao()->prepare($sqla);
                $prepare->bindValue(":id", $_GET['editar']);
                $prepare->execute();
                while ($linha = $prepare->fetch(PDO::FETCH_ASSOC)) {


                    ?>
                    <form method="post">
                        <div class="row">
                            <div class="small-12 medium-12 large-12 columns">

                                <label>
                                    Nome:
                                    <br/>
                                    <input type="text" value="<?= $linha['nome'] ?>" name="nome"/>
                                </label>
                            </div>
                            <div class="small-12 medium-12 large-12 columns">

                                <label>
                                    Valor:<br/>
                                    <input type="text" value="<?= $linha['valor'] ?>" name="valor"/>
                                </label>
                            </div>
                            <div class="small-12 medium-12 large-12 columns">

                                <label>
                                    Quantidade:<br/>
                                    <input type="text" value="<?= $linha['quantidade'] ?>" name="quantidade"/>
                                </label>
                            </div>
                            <div class="small-12 medium-12 large-12 columns">

                                <label>
                                    Validade:<br/>
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
                $prepare = conexao()->prepare($sqeditar);
                $prepare->bindValue(":id", $_POST['editar']);
                $prepare->bindValue(":nome", $_POST['nome']);
                $prepare->bindValue(":valor", $_POST['valor']);
                $prepare->bindValue(":quantidade", $_POST['quantidade']);
                $prepare->bindValue(":validade", $_POST['validade']);
                $prepare->execute();
            }
    
    
    
}
