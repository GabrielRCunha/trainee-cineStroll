<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Posts - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../public/css/modalEditar.css">
    <link rel="stylesheet" href="../../../public/css/modalExcluirPosts.css">
    <link rel="stylesheet" href="../../../public/css/tabelaDePosts.css">
    <link rel="stylesheet" href="../../../public/css/sidebar.css">
</head>

<body>
    <div class="php">
     <?php require 'sidebar.view.php'; ?>
     </div>
    <div class="barra-superior">
        <img src="../../../public/assets/Logo_sem_fundo.png" alt="Logo do CINE STROLL" class="logo-barra-superior">
        <div class="div-titulo">
            <h1 class="nome">Tabela de Publicações</h1>
        </div>
        <button class="botao-criar" onclick="abrirModais('criar-post')">
            Criar <i class=" bi bi-plus"></i>
        </button>
    </div>
    <div class="div-tabela">
        <table class="tabela">
            <tr>
                <th class="id">ID</th>
                <th class="titulo" id="titulo-main">Título</th>
                <th class="autor">Autor</th>
                <th class="data">Data</th>
                <th class="acoes">Ações</th>
            </tr>
            <?php foreach($posts as $post): ?>
            <tr>
                <td class="id">
                    <?= $post->id ?>
                </td>
                <td class="titulo fontes">
                    <?= $post->title ?>
                </td>
                <td class="autor fontes">
                    <?= $post->nome_autor ?>
                </td>
                <td class="data fontes">
                    <?=$post->created_at?>
                </td>
                <td class="acoes">
                    <div class="divacoes">
                        <button class="ver" onclick="abrirModais('visualizar-post <?=$post->id?>')">
                            <i class="bi bi-eye"></i>
                        </button>
                        <button class="editar" onclick="abrirModais('editar-post <?= $post->id ?>')"><i class="bi bi-pencil-square"></i></button>
                        <button class="apagar" onclick="abrirModais('excluir-post <?= $post->id?>')"><i class="bi bi-trash3"></i></button>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <ul class="paginacao">
        <li><a href="?paginacaoNumero=<?= $page - 1 ?>" class="voltar <?= $page <= 1 ? "none" : "" ?>">&laquo;</a></li>

        <?php for($page_number = 1; $page_number <= $total_pages; $page_number++): ?>
        <li><a href="?paginacaoNumero=<?= $page_number ?>" class="<?= $page_number == $page ? "pagina ativa" : "" ?> <?= $total_pages == 1 ? "none" : "" ?>"><?= $page_number ?></a></li>
        <?php endfor ?>


        <li><a href="?paginacaoNumero=<?= $page + 1 ?>" class="passar <?= $page >= $total_pages ? "none" : "" ?>">&raquo;</a></li>
    </ul>

    <!-- MODAIS -->
    <div class="overlay " id="overlay"></div>

    <!-- CRIAR -->
    <div class="modal-container" id="criar-post">
        <div class="modal-conteudo">
            <h2>Criar Post</h2>
            <form id="form-criar-post" action="/admin/criarPost" method="POST" enctype="multipart/form-data">
                <div class="modal-input-grupo">
                    <label for="imagem" class="image-upload-label">Escolher imagem</label>
                    <input type="file" id="imagem" name="imagem" class="post-image-container botao-post-imagem image-upload-input" required>
                     <div class="imagem-preview-container" id="imagem-preview" style="display: none;" required>
                    <img id="preview-imagem-selecionada" src="#" alt="Pré-visualização da imagem selecionada">
                </div>
                </div>

                <div class="modal-input-grupo">
                    <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="title" class="post-content" required>
                </div>

                <div class="div_autor_nota">
                    <div class="modal-input-grupo">
                        <label for="autor">Autor:</label>
                        <input type="text" id="autor" name="author" class="post-content" required>
                    </div>

                    <div class="modal-input-grupo">
                        <label for="nota">Nota:</label>
                        <input type="number" id="nota" name="rating" class="post-content" min="0" max="10" required>
                    </div>

                </div>

                <div class="modal-input-grupo">
                    <label for="conteudo">Conteúdo:</label>
                    <textarea id="conteudo" name="content" class="post-content" rows="4" required></textarea>
                </div>

                <div class="modal-botoes">
                    <button type="button" class="cancelar" onclick="fecharModais('criar-post')">Fechar</button>
                    <button type="submit" class="salvar">Salvar</button>
                </div>
            </form>
        </div>
    </div>


    <!-- VISUALIZAR -->
   <?php foreach($posts as $post): ?>   
    <div class="modal-container" id="visualizar-post <?=$post->id?>">
        <div class="modal-conteudo">
            <h2>Visualizar Post</h2>
            <form id="form-criar-post">
                <div class="modal-input-grupo">
                    <div class="imagem-preview-container" id="imagem-preview">
                    <img id="modal-imagem" src="/<?= $post->image?>" alt="Pré-visualização da imagem selecionada">
                    </div>
                </div>

                <div class="modal-input-grupo">
                    <label for="titulo">Título:</label>
                    <input type="text" id="modal-titulo" class="post-content" value="<?=$post->title?>" readonly>
                </div>

                <div class="div_autor_nota">
                    <div class="modal-input-grupo">
                        <label for="autor">Autor:</label>
                        <input type="text" id="modal-autor" class="post-content" value="<?=$post->nome_autor?>" readonly>
                    </div>

                    <div class="modal-input-grupo">
                        <label for="nota">Nota:</label>
                        <input type="number" id="modal-nota" class="post-content" min="0" max="5" value="<?=$post->rating?>"readonly>
                    </div>

                    <div class="modal-input-grupo">
                        <label for="data">Publicado em:</label>
                        <input type="date" id="modal-data" class="post-content" value="<?=$post->created_at?>" readonly>
                    </div>
                </div>

                <div class="modal-input-grupo">
                    <label for="conteudo">Conteúdo:</label>
                    <textarea id="modal-conteudo" class="post-content" rows="4" readonly><?=$post->content?></textarea>
                </div>

                <div class="modal-botoes">
                    <button type="button" class="cancelar" onclick="fecharModais('visualizar-post <?=$post->id?>')">Fechar</button>
                </div>
            </form>
        </div>
    </div>
    <?php endforeach; ?>


    <!-- EDITAR -->
    <?php foreach($posts as $post): ?>   
    <div class="modal-container" id="editar-post <?=$post->id?>">
        <div class="modal-conteudo">
            <h2>Editar Post</h2>
            <form id="form-editar-post" action="/admin/editarPost" method="POST" enctype="multipart/form-data" onsubmit="salvarEdicao(event)">
                <input type="hidden" name="id" value="<?= $post->id ?>">
                <input type="hidden" name="fotoAtual" value="<?= $post->image ?>">
                <div class="modal-input-imagem">
                        <div class="imagemEditar">
                            <img 
                                id="imgEditar<?= $post->id ?>" class="imagem-editar-post" src="/<?= $post->image ?>" alt="Imagem atual" onclick="document.getElementById('inputImgEditar<?= $post->id ?>').click()">
                            <input id="inputImgEditar<?= $post->id ?>" type="file" name="imagem" style="display: none;" accept="image/*" onchange="mostrarPreviewImagem(this, 'imgEditar<?= $post->id ?>')">
                        </div>
                </div>

                <div class="modal-input-grupo">
                    <label for="titulo">Título:</label>
                    <input type="text" id="modal-titulo" class="post-content" name="title" value="<?=$post->title?>">
                </div>

                <div class="div_autor_nota">
                    <div class="modal-input-grupo">
                        <label for="autor">Autor:</label>
                        <input type="text" id="modal-autor" class="post-content" name="author" value="<?=$post->nome_autor?>">
                    </div>

                    <div class="modal-input-grupo">
                        <label for="nota">Nota:</label>
                        <input type="number" id="modal-nota" class="post-content" min="0" name="rating" max="10" value="<?=$post->rating?>">
                    </div>

                </div>

                <div class="modal-input-grupo">
                    <label for="conteudo">Conteúdo:</label>
                    <textarea id="modal-conteudo" class="post-content" name="content" rows="4"><?=$post->content?></textarea>
                </div>

                <div class="modal-botoes">
                    <button type="button" class="cancelar" onclick="fecharModais('editar-post <?=$post->id?>')">Fechar</button>
                    <button type="submit" class="salvar">Salvar</button>
                </div>
            </form>
        </div>
    </div>
    <?php endforeach; ?>

    <!-- EXCLUIR -->
     <?php foreach($posts as $post): ?>
        <div class="tude" id="excluir-post <?= $post->id?>">
        <form action="/admin/deletePost" method="POST">
             <input type="hidden" name="id" value="<?= $post->id ?>">
        <div class="modalEditar">
            <div class="containerEditar">
                <p><?= $post->title?></p>
                <div class="tituloEditar" style="padding: 30px;">
                    <p style="color: white;">Tem certeza que deseja excluir este post?</p>
                    <div class="lixo">
                        <i class="bi bi-trash"></i>
                    </div>
                </div>
                <div class="botoesModal">
                    <button type="button" onclick="fecharModais('excluir-post <?= $post->id?>')">Fechar</button>
                    <button class="botaoExcluirConfirmar">Excluir</button>

                </div>

            </div>
        </div>
        </form>
    </div>
    <?php endforeach; ?>
        
    </div>
    

    <script src="../../../public/js/tabelaDePosts.js"></script>
    <script src="../../../public/js/modais.js"></script>
    <script src="../../../public/js/modalEditar.js"></script>
    <script src="../../../public/js/modalExcluirPosts.js"></script>
</body>

</html>