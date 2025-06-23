<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Posts</title>
   

<link rel="stylesheet" href="../../../public/css/listaDePosts.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="../../../public/css/footer.css" />
<link rel="icon" href="../../../public/assets/logo sem fundo.png" type="image/png">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

</head>
<body>
    
    <?php require __DIR__  . '/navbar.view.php'; ?>    

    <div class="linhaInicial">
        <h2>Encontre seu proximo filme favorito aqui!</h2> 
          <form class="pesquisa" method="get" action="/listaDePosts">
            <input type="text" class="lupa" name="pesquisa">
            <span class="material-icons">search</span>
          </form>
    </div>

    
    <div class="container">
    <?php foreach($posts as $post): ?>
    <a href="/postIndividual/<?=$post->id?>" class="botao-movie-card">
      <div class="movie-card">
        <img class="imagem-filme" src="/<?= $post->image?>" alt="Imagem do filme avaliado">
        <div class="movie-info">
         
        <div class="informacoes-post">
          <div class="cabecalho-post">
            <span class="titulo"><?= mb_strimwidth($post->title, 0, 50, '...') ?></span>
             <span class="ano"><?= $post->ano ?></span>
          </div>
            <p class="conteudo-post"><?= $post->content ?></p>
        </div>
          
          <div class="info-extra">
            <span class="diretor">Diretor : <strong><?= mb_strimwidth($post->diretor, 0, 20, '...') ?><strong></span>
            <div class="avaliacao">
              Avaliação:
              <?php $nota = (int) $post->rating;
              $cheias = floor($nota / 2);
              $meia = $nota % 2 === 1 ? 1 : 0;
              $vazias = 5 - $cheias - $meia; ?>
              <?php for ($i = 0; $i < $cheias; $i++): ?>
                <span class="material-icons">star</span>
              <?php endfor; ?>
              <?php if ($meia): ?>
                <span class="material-icons">star_half</span>
              <?php endif; ?>
              <?php for ($i = 0; $i < $vazias; $i++): ?>
                <span class="material-icons">star_outline</span>
              <?php endfor; ?>
            </div>
          </div>
        </div>
      </div>
    </a>
      <?php endforeach; ?>
    </div>

   
    <?php require('app\views\admin\componentes.php\paginacao.php') ?>
     <?php require 'footer.view.php'; ?>
  </body>
</html>
