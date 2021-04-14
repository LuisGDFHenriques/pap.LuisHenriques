function fillNovasOpcoes(idChave){
    $.ajax({
        url: "AJAX/AJAXGetOptionChave.php",
        type: "post",
        data: {
            idChave: idChave
        },
        success: function (result) {
            $('#chave').html(result);
        }
    });
}

$('document').ready(function (){
    $('#chaveCategoria').change(function (){
        fillNovasOpcoes($(this).val());
    })
})
function confirmaElimina(idChave,idTelemovel) {
    var nomeChave, nomeTelemovel;
    $.ajax({
        url:"AJAX/AJAXGetNameChave.php",
        type:"post",
        data:{
            idChave:idChave
        },
        success:function (result){
            nomeChave=result;
        }
    });
    $.ajax({
        url:"AJAX/AJAXGetNameTelemoveisChave.php",
        type:"post",
        data:{
            idTelemovel:idTelemovel
        },
        success:function (result){
            nomeTelemovel=result;
            if(confirm('Confirma que deseja eliminar a chave '+nomeChave+' no telemovel '+nomeTelemovel+'?'))
                window.location="eliminaTelemoveisChaves.php?chvId=" + idChave + "&tlmId=" + idTelemovel;
        }
    });
};