function fillTableProdutos(txt = '', marca= -1, cat=-1, ordem=1) {
    $.ajax({
        url: "AJAX/AJAXFillTelemoveis.php",
        type: "post",
        data: {
            txt: txt,
            idMarca: marca,
            idCategoria: cat,
            ordem: ordem
        },
        success: function (result) {
            $('#tableContent').html(result);
        }
    });


}

function abreRegista(){
    $('#login').modal('hide');
    $('#regista').modal('show');
}
function abreLogin(){
    $('#login').modal('show');
    $('#regista').modal('hide');
}