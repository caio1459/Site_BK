<?php
    // mostrar 1 banner aleatorio por vez
    $sqlBanner = "SELECT * FROM banner ORDER BY RAND() LIMIT 1";
    // executar o sql
    $consultaBanner = mysqli_query($con, $sqlBanner);
    // separar os dados
    $dados = mysqli_fetch_array($consultaBanner);
    $titulo = $dados["titulo"];
    $banner = $dados["banner"];
?>
<div class="banner">
    <img src="imagens/<?=$banner?>" alt="<?=$titulo?>" class="w-100">
</div>

<h1 class="text-center">
    Lanches em Destaque
</h1>

<div class="row">
    <?php
        $sqlLanches = "SELECT * FROM produto ORDER BY RAND() LIMIT 3";
        $consultaLanches = mysqli_query($con, $sqlLanches);

        while ($dados = mysqli_fetch_array($consultaLanches)) {
            $id = $dados["id"];
            $produto = $dados["produto"];
            $foto = $dados["foto"];
            ?>
            <div class="col-12 col-md-4 text-center">
                <div class="card">
                    <img src="imagens/<?=$foto?>" alt="<?=$produto?>" class="w-100">
                    <p>
                        <b><?=$produto?></b>
                    </p>
                    <p>
                        <a href="produto/<?=$id?>" class="btn btn-primary">
                        Detalhes
                    </a>
                    </p>
                </div>
            </div>
            <?php
        }
    ?>
</div>