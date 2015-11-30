<!DOCTYPE html>
<?php
         include './include/global.php';
         include './include/estoque.php';
         $title = "Controle de Estoque";
         include './template/header.php';
         excluir();
         editar();
        ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div cass="center">
            <table style="width: 100%;">
                <tr style="background: #ccc;">
                 <th></th>
                 <th></th>
                <th>Id:</th>
                <th>Nome:</th>
                <th>Valor:</th>
                <th>Quantidade:</th>
                <th>Validade:</th>
                
            </tr>
                <?php
        listar();
        
    
        ?>
        </table>
        </div>
        
        
    </body>
</html>
