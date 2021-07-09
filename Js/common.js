function fillTableTelemoveis(txt = '', id= -1) {
    $.ajax({
        url: "AJAX/AJAXFillTelemoveis.php",
        type: "post",
        data: {
            txt: txt,
            id: id
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