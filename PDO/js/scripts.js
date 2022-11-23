function addServico(id, nome, valor){
    bootstrap.Modal.getOrCreateInstance(document.getElementById('modalOS')).hide();
    const tcorpo = document.getElementById('itemOS');
    const linha = document.createElement('tr');
    var inputId = '<td><input name="servId[]" value="' + id + '"readonly size="5" class="form-control-plaintext" id="id'+id+'"></td>';
    var inputNome = '<td>'+nome+'</td>';
    var inputValor = '<td><input name="servValor[]" value="' + valor + '"readonly size="5" class="form-control-plaintext" id="valor'+id+'"></td>';
    var inputQtde = '<td><input name="servQtde[]" value="1" size="5" class="form-control"></td>';
    var inputTotal = '<td><input name="servTotal[]" value="' + valor + '"readonly size="5" class="form-control-plaintext"></td>';
    linha.innerHTML = inputId+inputNome+inputValor+inputQtde+inputTotal;
    tcorpo.appendChild(linha);
}