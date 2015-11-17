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
        
        
        $SQL = "";
        $preparo = conexao()->prepare($SQL);
        //$preparo->bindValue($preparo, $SQL)
        //$preparo->bindValue($preparo, $SQL)
        //$preparo->bindValue($preparo, $SQL)
        //$preparo->bindValue($preparo, $SQL)
        $preparo->execute();
        if($preparo->rowCount()== 1){
            echo"Sucesso!";
            
        }
        else{
            echo"Falha ao registrar!";
        }
           
            }
}