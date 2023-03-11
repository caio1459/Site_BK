<?php
    //transformar em int
    $id = (int)$id;

    //selecionar o produto
    $sqlProduto = "select p.*, t.tipo from produto p 
    inner join tipo t on (t.id = p.tipo_id)
    where p.id = {$id} limit 1";
    //executar o sql
    $consulta = mysqli_query($con, $sqlProduto);
    //separar os dados em Array
    $dados = mysqli_fetch_array($consulta);
?>
<div class = "row">
    <div class = "col-12 col-md-4">
        <img src="imagens/<?=$dados["foto"]?>" alt="<?=$dados["produto"]?>" class = "w-100">
    </div>
    <div class = "col-12 col-md-8">
        <h2 class = "text-center">
            <?=$dados["produto"]?>
        </h2>
        <p>Tipo: <?=$dados["tipo"]?></p>
        <p>Valor: R$ <?=number_format($dados["valor"],2,",",".")?></p>
        <p><?=$dados["descricao"]?></p>
    </div>
</div>