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