<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Posts - Admin</title>
    <link rel="stylesheet" href="../../../public/css/tabelaDePosts.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../public/css/modalEditar.css">
    <link rel="stylesheet" href="../../../public/css/modalExcluirPosts.css">
</head>

<body>
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
                    <?= $post->author ?>
                </td>
                <td class="data fontes">
                    <?=$post->created_at?>
                </td>
                <td class="acoes">
                    <div class="divacoes">
                        <button class="ver" onclick="abrirModais('visualizar-post <?=$post->id?>')">
                            <i class="bi bi-eye"></i>
                        </button>
                        <button class="editar" onclick="abrirModal('modalEdit<?= $post->id ?>')"><i class="bi bi-pencil-square"></i></button>
                        <button class="apagar" onclick="modalExcluirP()"><i class="bi bi-trash3"></i></button>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <ul class="paginacao">
        <li><a href="#" class="voltar">&laquo;</a></li>
        <li><a href="#" class="pagina ativa">1</a></li>
        <li><a href="#" class="pagina">2</a></li>
        <li><a href="#" class="pagina">3</a></li>
        <li><a href="#" class="pagina">4</a></li>
        <li><a href="#" class="pagina">5</a></li>
        <li><a href="#" class="pagina">6</a></li>
        <li><a href="#" class="pagina">7</a></li>
        <li><a href="#" class="pagina">8</a></li>
        <li><a href="#" class="pagina">9</a></li>
        <li><a href="#" class="pagina">10</a></li>
        <li><a href="#" class="passar">&raquo;</a></li>
    </ul>

    <!-- MODAIS -->
    <div class="overlay" id="overlay"></div>

    <!-- CRIAR -->
    <div class="modal-container" id="criar-post">
        <div class="modal-conteudo">
            <h2>Criar Post</h2>
            <form id="form-criar-post" action="/admin/criarPost" method="POST" enctype="multipart/form-data">
                <div class="modal-input-grupo">
                    <label for="imagem" class="image-upload-label">Escolher imagem</label>
                    <input type="file" id="imagem" name="imagem" class="post-image-container botao-post-imagem image-upload-input">
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

                    <div class="modal-input-grupo">
                        <label for="data">Publicado em:</label>
                        <input type="date" id="data" name="created_at" class="post-content" required>
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
                    <img id="modal-imagem" src="" alt="Pré-visualização da imagem selecionada">
                    </div>
                </div>

                <div class="modal-input-grupo">
                    <label for="titulo">Título:</label>
                    <input type="text" id="modal-titulo" class="post-content" value="<?=$post->title?>" readonly>
                </div>

                <div class="div_autor_nota">
                    <div class="modal-input-grupo">
                        <label for="autor">Autor:</label>
                        <input type="text" id="modal-autor" class="post-content" value="<?=$post->author?>" readonly>
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
    <div class="tudo" id="modalEdit<?= $post->id ?>">
        <div class="fundoEditar" onclick="fecharModalEdit('modalEdit<?= $post->id ?>')"></div>
        <div class="modalEditar">
            <div class="containerEditar">
                <form class="formModalEditar" action="/admin/editarPost" method="POST" onsubmit="salvarEdicao(event)">
                    <input type="hidden" name="id" value=<?= $post->id ?>>
                    <div class="imagemEditar">
                        <img id="imgEditar" src="/public/assets/Logo_sem_fundo.png" alt="Imagem atual">
                        <input id="inputImgEditar" type="file" required>
                    </div>

                    <div class="tituloEditar">
                        <label>Título:</label>
                        <input  type="text" id="tituloEditar" name="title" value='<?= $post->title ?>' required >
                    </div>

                    <div class="tituloEditar">
                        <label>Descrição:</label>
                        <textarea id="descricaoEditar" name="content" rows="3" required><?= $post->content ?></textarea>
                    </div>

                    <div class="tituloEditar">
                        <label>Autor:</label>
                        <input type="text" id="autorEditar" name="author" value='<?= $post->author ?>' required>
                    </div>

                    <div class="tituloEditar">
                        <label>Data de Criação:</label>
                        <input value="12/12/2012" type="date" id="dataEditar" name="created_at" value='<?= $post->created_at ?>' required>
                    </div>

                    <div class="botoesModal">
                        <button class="buttonEditP" type="button" onclick="fecharModalEdit('modalEdit<?= $post->id ?>')">Cancelar</button>
                        <button type="submit">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <!-- EXCLUIR -->
    <div class="tude" id="modalExcluir">
        <div class="fundoEditar" onclick="fecharModalExcluir()"></div>
        <form action="/admin/deletePost" method="POST">
        <div class="modalEditar">
            <div class="containerEditar">
                <div class="tituloEditar" style="padding: 30px;">
                    <p style="color: white;">Tem certeza que deseja excluir este post?</p>
                    <div class="lixo">
                        <i class="bi bi-trash"></i>
                    </div>
                </div>
                <div class="botoesModal">
                    <button type="button" onclick="fecharModalExcluir()">Cancelar</button>
                    <button class="botaoExcluirConfirmar">Excluir</button>

                </div>

            </div>
        </div>
        </form>
    </div>

    </div>

    <script src="../../../public/js/tabelaDePosts.js"></script>
    <script src="../../../public/js/modais.js"></script>
    <script src="../../../public/js/modalEditar.js"></script>
    <script src="../../../public/js/modalExcluirPosts.js"></script>
</body>

</html>