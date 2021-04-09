function fillTableTelemoveis(txt = '') {
    $.ajax({
        url: "AJAX/AJAXFillTelemoveis.php",
        type: "post",
        data: {
            txt: txt
        },
        success: function (result) {
            $('#tableContent').html(result);
        }
    });


}