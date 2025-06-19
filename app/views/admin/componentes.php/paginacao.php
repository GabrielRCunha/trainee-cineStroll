<?php
    $pesquisa = '';

    if(isset($_GET['pesquisa']) && !empty($_GET['pesquisa'])){
           $pesquisa = '&pesquisa=' . $_GET['pesquisa'];
        }
?>
<nav class="paginacao">
    <ul class="paginacao">
        <li class="<?= $page <= 1 ? "desligado" : "" ?>"><a href="?paginacaoNumero=<?=$page - 1 ?>" class="voltar">&laquo;</a></li>

        <?php for($page_number = 1; $page_number <= $total_pages; $page_number++): ?>
            <li><a href="?paginacaoNumero=<?= $page_number . $pesquisa?>" class="<?= $page_number == $page ? "pagina ativa" : "pagina"?> <?= $total_pages == 1 ? "desligado" : "" ?>"><?= $page_number ?></a></li>
        <?php endfor?>

        <li class="<?= $page >= $total_pages ? "desligado" : "" ?>"><a href="?paginacaoNumero=<?=$page + 1 ?>" class="passar">&raquo;</a></li>
    </ul>
</nav>