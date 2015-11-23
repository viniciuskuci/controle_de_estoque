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
    $SQL = "DELETE FROM `produtos` WHERE `id`=:id";
    $preparo = conexao()->prepare($SQL);
    $preparo->bindValue(":id", $_GET['excluir']);
    $preparo->execute();
}
function listar(){
    $SQL = "SELECT * FROM produtos WHERE 1;";
    $preparo = conexao()->prepare($SQL);
    $preparo->execute();
    while ($linha  = $preparo->fetch(PDO::FETCH_ASSOC)){
        echo"<tr>";
        echo"<td><a value='excluir' href='?excluir=".$linha['id']."'>Excluir</a></td>";
        echo"<td>".$linha['id']."</td>";
        echo"<td>".$linha['nome']."</td>";
        echo"<td>".$linha['valor']."</td>";
        echo"<td>".$linha['quantidade']."</td>";
        echo"<td>".$linha['validade']."</td>";
        echo"</tr>";
    }
    
}
