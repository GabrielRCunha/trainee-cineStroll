<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cine Stroll</title>
    <link rel="stylesheet" href="../../../public/css/landingPage.css">
    <link rel="stylesheet" href="../../../public/css/navbar.css" />
    <link rel="stylesheet" href="../../../public/css/footer.css" />
    <link rel="icon" href="../../../public/assets/logo sem fundo.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
</head>

<body>

    <?php require __DIR__ . '/navbar.view.php'; ?>

    <div class="heroSection">
        <div class="conteudo">
            <div class="apresentacao">
                <div class="textoApresent">
                    <p >Descubra avaliações honestas e recomendações sobre filmes. Compartilhe suas opiniões e
                        explore críticas detalhadas, tudo em um único lugar. </p>
                </div>
                <div class="textoLogo">
                    <h2>CINE STROLL</h2>
                    <img src="/public/assets/Logo_sem_fundo.png" alt="logoPrincipal">
                </div>
            </div>

            <div class="swiper">

                <div class="swiper-wrapper">
                    <?php foreach ($posts as $post): ?>
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="textoImagem">
                                    <div class="textoCard">
                                        <h2><?= mb_strimwidth($post->title, 0, 14, '...') ?></h2>
                                        <p><?= $post->content ?></p>
                                    </div>
                                    <div class="imagemCard">
                                        <img src="/<?= $post->image ?>" alt="">
                                        <div class="estrelas">
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
                                <div class="botaoCard">
                                    <button>
                                        <a href="/postIndividual/<?= $post->id ?>">
                                            <p class="textoBotao">Ver mais</p>
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-prev">
                </div>
                <div class="swiper-button-next">
                </div>

            </div>
        </div>

    </div>
    <div class="descricao">
        <div class="texto-descricao">
            <h2>O que somos?</h2>
            <p class="text">
                <i class="italico">Somos uma comunidade apaixonada por cinema, dedicada a oferecer análises sinceras e profundas. Aqui,
                    você
                    encontra críticas, avaliações e recomendações feitas por amantes da sétima arte, com a liberdade
                    para
                    compartilhar suas próprias opiniões e descobrir novas produções.
                </i>
            </p>
        </div>
    </div>

    <?php require 'footer.view.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="../../../public/js/landingPage.js"></script>


</body>


</html>