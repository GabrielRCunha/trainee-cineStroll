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
        <button class="botao-criar" onclick="abrirModais('criar-post')"">
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
                <td class="id"><?=htmlspecialchars($post['id'])?></td>
                <td class="titulo fontes"><?=htmlspecialchars($post['title'])?></td>
                <td class="autor fontes"><?=htmlspecialchars($post['author'])?></td>
                <td class="data fontes"><?=htmlspecialchars($post['created_at'])?></td>
                <td class="acoes">
                    <div class="divacoes">
                        <button class="ver"
                            onclick="abrirModalVisualizar(this)"
                            data-titulo="<?= htmlspecialchars($post['title']) ?>"
                            data-autor="<?= htmlspecialchars($post['author']) ?>"
                            data-data="<?= htmlspecialchars($post['created_at']) ?>"
                            data-nota="<?= htmlspecialchars($post['rating']) ?>"
                            data-conteudo="<?= htmlspecialchars($post['content']) ?>">
                            <i class="bi bi-eye"></i>
                        </button>

                        <button class="editar" onclick="modalEditar()"><i class="bi bi-pencil-square"></i></button>
                        <button class="apagar" onclick="modalExcluirP()"><i class="bi bi-trash3"></i></button>
                    </div>
                </td>
            <?php endforeach ?>
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
            <h2>Criar Novo Post</h2>
            <div class="modal-input-grupo">
                <label>Imagem:</label>
                <label class="botao-post-imagem" for="post-imagem">Escolher arquivo</label>
                <input type="file" id="post-imagem" accept="image/*" onchange="previewImagemSelecionada(event)">
                <div class="imagem-preview-container" id="imagem-preview" style="display: none;">
                    <img id="preview-imagem-selecionada" src="#" alt="Pré-visualização da imagem selecionada">
                </div>
            </div>
            <div class="modal-input-grupo">
                <label for="post-titulo">Título:</label>
                <input type="text" id="post-titulo" placeholder="Digite o título">
            </div>
            <div class="modal-input-grupo">
                <label for="post-conteudo">Conteúdo:</label>
                <textarea id="post-conteudo" placeholder="Digite o conteúdo"></textarea>
            </div>
            <div class="modal-botoes">
                <button class="criar">Criar</button>
                <button class="cancelar" onclick="fecharModais('criar-post')">Cancelar</button>
            </div>
        </div>
    </div>

    <!-- VISUALIZAR --> 
    <?php foreach($posts as $post): ?>
    <div class="modal-container" id="visualizar-post">
        <div class="modal-conteudo">
            <h2>Visualizar Post</h2>
            <div class="modal-input-grupo">
                <label>Imagem:</label>
                <div class="post-image-container">
                    <img id="visualizar-post-imagem" src="#" alt="Imagem do post">
                </div>
            </div>
            <div class="modal-input-grupo">
                <label>Título:</label>
                <div class="post-content" id="modal-titulo"></div>
            </div>
            <div class="div_autor_nota">
                <div class="modal-input-grupo">
                    <label>Autor:</label>
                    <div class="post-content" id="modal-autor"></div>
                </div>
                <div class="modal-input-grupo">
                    <label>Nota:</label>
                    <div class="post-content" id="modal-nota"></div>
                </div>
                <div class="modal-input-grupo">
                    <label>Publicado em:</label>
                    <div class="post-content" id="modal-data"></div>
                </div>
            </div>
            <div class="modal-input-grupo">
                <label>Conteúdo:</label>
                <div class="post-content" id="modal-conteudo"></div>
            </div>
            <div class="modal-botoes">
                <button class="cancelar" onclick="fecharModais('visualizar-post')">Fechar</button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    </div>

    <!-- EDITAR -->
    <div class="tudo" id="modalEdit">
    <div class="fundoEditar" onclick="fecharModalEditar()"></div>
    <div class="modalEditar">
        <div class="containerEditar">
        <form class="formModalEditar" onsubmit="salvarEdicao(event)">
            <div class="imagemEditar">
            <img id="imgEditar" src="/public/assets/Logo_sem_fundo.png" alt="Imagem atual">
            <input id="inputImgEditar" type="file" required>
            </div>

            <div class="tituloEditar">
            <label>Título:</label>
            <input type="text" id="tituloEditar" required>
            </div>

            <div class="tituloEditar">
            <label>Descrição:</label>
            <textarea id="descricaoEditar" rows="3" required></textarea>
            </div>

            <div class="tituloEditar">
            <label>Autor:</label>
            <input type="text" id="autorEditar" required>
            </div>

            <div class="tituloEditar">
            <label>Data de Criação:</label>
            <input value="12/12/2012" type="date" id="dataEditar" required>
            </div>

            <div class="botoesModal">
            <button class="buttonEditP" type="button" onclick="fecharModalEditar()">Cancelar</button>
            <button type="submit">Salvar</button>
            </div>
        </form>
        </div>
    </div>
    </div>

    <!-- EXCLUIR -->
    <div class="tudo" id="modalExcluir">
    <div class="fundoEditar" onclick="fecharModalExcluir()"></div>
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
            <button type="button" onclick="confirmarExclusao()">Excluir</button>
        </div>
        </div>
    </div>
    </div>

        </div>

        <script src="../../../public/js/tabelaDePosts.js"></script>
        <script src="../../../public/js/modais.js"></script>
        <script src="/public/js/modalEditar.js"></script>
        <script src="/public/js/modalExcluirPosts.js"></script>
</body>

</html>
