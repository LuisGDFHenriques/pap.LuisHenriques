function fillNovasOpcoes(idChave, idProduto){
    $.ajax({
        url: "AJAX/AJAXGetOptionChave.php",
        type: "post",
        data: {
            idChave: idChave,
            idProduto: idProduto
        },
        success: function (result) {
            $('#chave').html(result);
        }
    });
}

$('document').ready(function (){
    $('#chaveCategoria').change(function (){
        fillNovasOpcoes($(this).val(),$('#idProduto').val());
    })
})
