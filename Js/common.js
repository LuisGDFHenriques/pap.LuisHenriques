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

    $.ajax({
        url:"AJAX/AJAXNovoProdutoCarrinho.php",
        type:"post",
        data: {
            idPrd:id
        },
        success:function(result){
            alert("O produto foi adicionado ao carrinho!");
        }
    });
}

function confirmaEliminaCarrinho(idProduto) {
    var nomeProduto;
    $.ajax({
        url:"admin/AJAX/AJAXGetNameTelemoveis.php",
        type:"post",
        data:{
            idProduto:idProduto
        },
        success:function (result){
            nomeProduto=result;
            if(confirm('Confirma que deseja eliminar o produto:'+nomeProduto+'?')){
                $.ajax({
                    url:"AJAX/AJAXEliminaProdutoCarrinho.php",
                    type:"post",
                    data: {
                        idPrd:idProduto
                    },
                    success:function(result){
                        alert("O produto foi eliminado do carrinho!");
                    }
                });
            }
        }
    });
}

function atualizaCarrinho(valor,idProduto){
    if(valor>0){
        $.ajax({
            url:"AJAX/AJAXAtualizaProdutoCarrinho.php",
            type:"post",
            data:{
                idPrd:idProduto,
                quant:valor
            },
            success:function (result){
                 location.reload();
            }
        });
    }


}

function atualizaComparativo(idProduto, idCat){
    $.ajax({
        url:"AJAX/AJAXAtualizaProdutoComparativo.php",
        type:"post",
        data:{
            idPrd:idProduto
        },
        success:function (result){

            $('#nComparativo').html(parseInt(result)>0?parseInt(result):'');
            fillTableProdutos($('#search'). val(), $('#searchMarca'). val(),idCat,$('#ordenar'). val());
        }
    });
}
