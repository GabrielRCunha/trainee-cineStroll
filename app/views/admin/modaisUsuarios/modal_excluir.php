 <div class="modal exc" id="excluir<?=$usuario->id?>">
        
            <h3>Deseja excluir este usuário?</h3>
            <div class="lixo"> 
                <i class="bi bi-trash"></i>
            </div>            
    
            <div class="botoes-excluir">
                <button class="botaoFecharModalExcluir" onclick="fecharModal('excluir<?=$usuario->id?>', event )">Cancelar</button>
                <form method="POST" action="/listaDeUsuarios/delete">
                <input type="hidden" name="id" value="<?=$usuario->id?>">
                
                <button class="botaoExcluirConfirmar" onclick="fecharModal('excluir<?=$usuario->id?>')">Excluir</button>
                </form>
            </div>
        </form>
    </div>