 <?php
         include './include/global.php';
         include './include/estoque.php';
         $title = "Controle de Estoque";
        include './template/header.php';
         
        ?>

<?php salvar(); ?>
<a href="listagem.php">Ver Lista</a>
<center>
<form method="post">
    <div class="center">
        Nome:<br/> <input type="text" name="nome"><br/><br/>
        Valor:<br/> <input type="text" name="valor"/><br/><br/>
        Quantidade:<br/> <input type="text" name="quantidade"/><br/><br/>
        Validade:<br/> <input type="text" name="validade"/><br/><br/>
        <input type="submit" value="Cadastrar"/>
        
    </div>
</form>
</center>
<?php
        include './template/footer.php';
        ?>


