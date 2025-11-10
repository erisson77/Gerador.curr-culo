$(document).ready(function() {

    // Adicionar Experiência
    $("#add-experiencia").click(function() {
        // HTML que será adicionado
        var novoCampo = `
        <div class="experiencia-item">
            <input type="text" name="cargo[]" placeholder="Cargo">
            <input type="text" name="empresa[]" placeholder="Empresa">
            <input type="text" name="periodo[]" placeholder="Período (Ex: Jan 2020 - Dez 2022)">
        </div>`;
        
        // Adiciona o novo campo dentro do container
        $("#experiencias-container").append(novoCampo);
    });

    // Adicionar Formação
    $("#add-formacao").click(function() {
        // HTML que será adicionado
        var novoCampo = `
        <div class="formacao-item">
            <input type="text" name="curso[]" placeholder="Curso/Formação">
            <input type="text" name="instituicao[]" placeholder="Instituição">
        </div>`;
        
        // Adiciona o novo campo dentro do container
        $("#formacao-container").append(novoCampo);
    });

});