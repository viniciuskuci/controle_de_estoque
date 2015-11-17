 <?php
         include './include/global.php';
         $title = "Controle de Estoque";
        include './template/header.php';
         
        ?>

<form method="post">
    <div class="center">
        Nome: <input type="text" name="nome"/>
        Valor: <input type="text" name="valor"/>
        Quantidade: <input type="text" name="quantidade"/>
        Validade: <input type="text" name="validade"/>
        <input type="submit" value="Cadastrar"/>
        
    </div>
</form>

<?php
        include './template/footer.php';
        ?>


