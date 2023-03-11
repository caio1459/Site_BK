<?php
    //transformar em inteiro
    $id = (int)$id;
    //selecionar o tipo
    $sqlTipo = "select * from tipo where id = {$id} limit 1";

    //executa o comando SQL e guarda o resultado
    $consulta = mysqli_query($con, $sqlTipo);
    //separar o resultado em um array
    $dados = mysqli_fetch_array($consulta);

    $tipo = $dados["tipo"];
    ?>
    <h2 class="text-center">
        <?=$tipo?>
    </h2>
    <div class = "row">
        <?php
            $sqlProduto = "select id, produto, valor, foto from produto where tipo_id = {$id}";
            // executar o sql e guardar o resultado
            $consulta = mysqli_query($con, $sqlProduto);
            // separar os resultados em Array
            while ($dados = mysqli_fetch_array($consulta)) {
                $id = $dados["id"];
                $valor = $dados["valor"];
                $foto = $dados["foto"];
                $produto = $dados["produto"];
                ?>
                <div class = "col-12 col-md-4">
                    <div class = "card text-center">
                        <img src="imagens/<?=$foto?>" alt="<?=$produto?>" class="w-100">
                        <p>
                            <strong><?=$produto?></strong>
                        </p>
                        <p>
                            R$ <?=number_format($valor, 2, ",", ".");?>
                        </p>
                        <p>
                            <a href="produto/<?=$id?>" class="btn btn-danger">
                                Detalhes do Produto
                            </a>
                        </p>
                    </div>
                </div>
                <?php
            }// fim do while
        ?>
    </div>