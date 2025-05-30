 <div class="modal exc" id="excluir<?=$usuario->id?>">
        <form id="formExcluir"></form>
        
            <h3>Deseja excluir este usuário?</h3>
            <div class="lixo"> 
                <i class="bi bi-trash"></i>
            </div>            
    
            <div class="botoes-excluir">
                <button class="botaoFecharModalExcluir" onclick="fecharModal('excluir<?=$usuario->id?>')">Cancelar</button>
                <button class="botaoExcluirConfirmar" onclick="fecharModal('excluir<?=$usuario->id?>')">Excluir</button>
                
            </div>
        </form>
    </div>