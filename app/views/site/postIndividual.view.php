<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../public/css/postIndividual.css" />
    <link rel="stylesheet" href="../../../public/css/navbar.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
    />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <title>Post Individual</title>
  </head>
  <body>
    <?php require __DIR__  . '/navbar.view.php'; ?>
    <div class="postIndividual">
      <div class="infoContainer">
        <div class="usuario">
          <div class="perfil">
            <div class="perfilImg">
              <img src="../../../../<?=$usuario->imagem?>" alt="foto do perfil" />
            </div>
            <h1><?=$usuario->nome?></h1>
          </div>
          <div class="avaliacao">
            <h1>Avaliação:</h1>
            <div class="estrelas">
              <?php $nota = (int) $posts->rating;
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
          <div class="div-diretor-ano">
            <div class="diretor">
              <h1>Diretor:</h1>
              <h2><?=$posts->diretor?></h2>
            </div>
            <div class="anoLancamento">
              <h2>Ano de Lançamento: <?=$posts->ano?></h2>
            </div>
          </div>
        </div>
        
        <div class="container-filme">
          <div class="filme">
            <img src="../../../../<?=$posts->image?>" alt="Cães de Aluguel" />
            <h1><?=$posts->title?></h1>
          </div>
        </div>
      </div>
      <div class="comentario">
        <h1>Comentou:</h1>
        <p>
           <?=nl2br($posts->content)?>
        </p>
        <p id="data">Postado em: <?=date("d/m/Y", strtotime($posts->created_at))?></p>
      </div>
      <!--<div class="likes">
        <i class="bi bi-arrow-up-circle-fill" id="up"></i>
        <p class="count">32</p>
        <i class="bi bi-arrow-down-circle-fill" id="down"></i>
        <p class="count">12</p>
      </div>-->
    </div>
    <?php require __DIR__  . '/footer.view.php'; ?>
  </body>
</html>
