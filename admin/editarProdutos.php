<?php
include_once ("includes/body.inc.php");
top();

$id=intval($_GET['id']);
$sql="Select * from produtos inner join marcas on produtoMarcaId = marcaId inner join categorias on produtoCategoriaId = categoriaId where produtoId=".$id;
$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);

?>

    <link href="summernote.css" rel="stylesheet">
    <script src='js/tinymce/tinymce.min.js'></script>

    <script>

        tinymce.init({
            selector: 'textarea#myTextarea',
            plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
            imagetools_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            autosave_ask_before_unload: true,
            autosave_interval: "30s",
            autosave_prefix: "{path}{query}-{id}-",
            autosave_restore_when_empty: false,
            autosave_retention: "2m",
            image_advtab: true,
            /*content_css: '//www.tiny.cloud/css/codepen.min.css',*/
            link_list: [
                { title: 'My page 1', value: 'https://www.codexworld.com' },
                { title: 'My page 2', value: 'https://www.xwebtools.com' }
            ],
            image_list: [
                { title: 'My page 1', value: 'https://www.codexworld.com' },
                { title: 'My page 2', value: 'https://www.xwebtools.com' }
            ],
            image_class_list: [
                { title: 'None', value: '' },
                { title: 'Some class', value: 'class-name' }
            ],
            importcss_append: true,
            file_picker_callback: function (callback, value, meta) {
                /* Provide file and text for the link dialog */
                if (meta.filetype === 'file') {
                    callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
                }
                /* Provide image and alt text for the image dialog */
                if (meta.filetype === 'image') {
                    callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
                }
                /* Provide alternative source and posted for the media dialog */
                if (meta.filetype === 'media') {
                    callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
                }
            },
            templates: [
                { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
                { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
                { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
            ],
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            height: 600,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_noneditable_class: "mceNonEditable",
            toolbar_mode: 'sliding',
            contextmenu: "link image imagetools table",
        });
    </script>
    <div class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Editar<em> Produto</em></h2>
                    </div>
                    <form action="confirmaEditaProduto.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="produtoId" value="<?php echo $id?>">
                        <div class="form-group">
                        <label for="nomeProduto">Nome: </label>
                        <input type="text" class="form-control" id="nomeProduto" name="nomeProduto" value="<?php echo $dados['produtoNome']?>">
                        </div><br>
                        <div class="form-group">
                        <label for="preco">Preco:</label>
                        <input type="number" class="form-control" id="preco" name="preco" value="<?php echo $dados['produtoPreco']?>">
                        </div><br>
                        <div class="form-group">
                        <label for="myTextarea">Descrição: </label>
                        <textarea class="form-control" id="myTextarea" name="reviewTexto"><?php echo $dados['produtoDescricao']?></textarea>
                        </div><br>
                        <div class="form-group">
                        <img src="../<?php echo $dados['produtoImagemURL']?>" width="200">
                        <label for="imagemProduto">Imagem: </label>
                        <input type="file" id="imagemProduto" name="imagemProduto">
                        </div><br>
                        <br>
                        <br>
                        <div class="form-group">
                        <label for="produtoCategoria"> Categoria:</label>
                        <select name="produtoCategoria" class="form-control">
                            <option value="-1">Escolha a categoria...</option>
                            <?php
                            $sql="select * from categorias order by categoriaNome";
                            $result=mysqli_query($con,$sql);
                            while ($dados=mysqli_fetch_array($result)){
                                ?>
                                <option value="<?php echo $dados['categoriaId']?>"
                                    <?php
                                    if($dados['categoriaChaveId']==$dados['categoriaId'])
                                        echo " selected ";
                                    ?>
                                >
                                    <?php echo $dados['categoriaNome']?>
                                </option>
                                <?php
                            }

                            ?>
                        </select>
                        </div>
                        <br>
                        <div class="form-group">
                        <label for="produtoMarca"> Marca:</label>
                        <select name="prodotuMarcaId" class="form-control">
                            <option value="-1">Escolha a marca...</option>
                            <?php
                            $sql="select * from marcas order by marcaNome";
                            $resultMar=mysqli_query($con,$sql);
                            while ($dadosMar=mysqli_fetch_array($resultMar)){
                                ?>
                                <option value="<?php echo $dadosMar['marcaId']?>"
                                    <?php
                                    if($dados['produtoMarcaId']==$dadosMar['marcaId'])
                                        echo " selected ";
                                    ?>
                                >
                                    <?php echo $dadosMar['marcaNome']?>
                                </option>
                                <?php
                            }

                            ?>
                        </select>
                        </div>
                        <br>
                            <label>Destaque:</label>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="destaqueProduto" id="inlineRadio1" value="nao">
                                    <label class="form-check-label" for="inlineRadio1">Não</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="destaqueProduto" id="inlineRadio2" value="sim">
                                    <label class="form-check-label" for="inlineRadio2">Sim</label>
                                </div>
                            </div>


                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary">Confirma alterações</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
bottom();
?>