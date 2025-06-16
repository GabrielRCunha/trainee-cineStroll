<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Posts</title>
   

<link rel="stylesheet" href="../../../public/css/listaDePosts.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />


</head>
<body>
    
    
    <div class="linhaInicial">
        <h2>Encontre seu proximo filme favorito aqui!</h2> 
          <div class="pesquisa">
            <input type="text" class="lupa">
            <span class="material-symbols-outlined">search</span>
          </div>
    </div>

    
    <div class="container">
    <?php foreach($posts as $post): ?>
      <div class="movie-card">
        <img class="imagem-filme" src="/<?= $post->image?>" alt="Imagem do filme avaliado">
        <div class="movie-info">
          <div>
            <span class="titulo"><?= $post->title ?></span>
            <span class="ano"><?= $post->created_at ?></span>
            <p class="conteudo-post"><?= $post->content ?></p>
          </div>
          <div class="info-extra">
            <span class="diretor">Autor do post : <strong><?= $post->author ?><strong></span>
            <div class="avaliacao">
              Avaliação:
              <?php for($i = 0; $i < $post->rating; $i++): ?>
                <span class="material-icons-outlined">star</span>
              <?php endfor; ?>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <ul class="paginacao">
        <li><a href="#">&laquo;</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#" class="ativo">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">6</a></li>
        <li><a href="#">7</a></li>
        <li><a href="#">8</a></li>
        <li><a href="#">9</a></li>
        <li><a href="#">10</a></li>
        <li><a href="#">&raquo;</a></li>
      </ul>

    
</body>
</html>
