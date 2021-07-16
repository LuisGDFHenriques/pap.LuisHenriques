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

function adicionaCarrinho(id){
    alert("O produto esta adicionado ao carrinho!");
    $.ajax({
        url:"AJAX/AJAXNovoProdutoCarrinho.php",
        type:"post",
        data: {
            idPrd:id
        },
        success:function(result){

        }
    });
}

function confirmaEliminaCarrinho(idProduto) {
    var nomeProduto;
    $.ajax({
        url:"AJAX/AJAXGetNameProduto.php",
        type:"post",
        data:{
            idProduto:idProduto
        },
        success:function (result){
            nomeProduto=result;
            if(confirm('Confirma que deseja eliminar o produto:'+nomeProduto+'?'))
                window.location="removeCarrinho.php?id=" + idProduto;
        }
    });
}