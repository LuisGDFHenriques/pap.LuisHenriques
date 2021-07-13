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


function confirmaEliminaProdutoChave(idChave,idProduto) {
    var nomeChave, nomeProduto;
    $.ajax({
        url:"AJAX/AJAXGetNameTelemoveisChave.php",
        type:"post",
        data:{
            idChave:idChave
        },
        success:function (result){
            nomeChave=result;
        }
    });
    $.ajax({
        url:"AJAX/AJAXGetNameTelemoveis.php",
        type:"post",
        data:{
            idProduto:idProduto
        },
        success:function (result){
            nomeProduto=result;
            if(confirm('Confirma que deseja eliminar a chave '+nomeChave+' no produto '+nomeProduto+'?'))
                window.location="eliminaTelemoveisChaves.php?chaveId=" + idChave + "&produtoId=" + idProduto;
        }
    });
};
