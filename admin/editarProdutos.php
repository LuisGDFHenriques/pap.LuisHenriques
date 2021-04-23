<?php
include_once ("includes/body.inc.php");
top();

$id=intval($_GET['id']);
$sql="Select * from produtos inner join marcas on produtoMarcaId = marcaId where produtoId=".$id;
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
                        <h2>Editar<em> Telemovel</em></h2>
                    </div>
                    <form action="confirmaEditaTelemovel.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="telemovelId" value="<?php echo $id?>">
                        <label for="modeloTelemovel">Nome: </label>
                        <input type="text" class="form-control" id="modeloTelemovel" name="modeloTelemovel" value="<?php echo $dados['produtoNome']?>"><br>
                        <label for="preco">Preco:</label>
                        <input type="number" class="form-control" id="preco" name="preco" value="<?php echo $dados['produtoPreco']?>"><br>
                        <label for="myTextarea">Descrição: </label>
                        <textarea class="form-control" id="myTextarea" name="reviewTexto"><?php echo $dados['produtoDescricao']?></textarea><br>
                        <img src="../<?php echo $dados['produtoImagemURL']?>" width="200">
                        <label for="imagemTelemovel">Imagem: </label>
                        <input type="file" id="imagemTelemovel" name="imagemTelemovel"><br>
                        <br>
                        <br>
                        <select name="produtoCategoria">
                            <option value="-1">Escolha a categoria...</option>
                            <?php
                            $sql="select * from categorias order by categoriaNome";
                            $result=mysqli_query($con,$sql);
                            while ($dados=mysqli_fetch_array($result)){
                                ?>
                                <option value="<?php echo $dados['categoriaId']?>"><?php echo $dados['categoriaNome']?></option>
                                <?php
                            }

                            ?>
                        </select>
                        <select name="telemovelMarcaId">
                            <option value="-1">Escolha a marca...</option>
                            <?php
                            $sql="select * from marcas order by marcaNome";
                            $resultMar=mysqli_query($con,$sql);
                            while ($dadosMar=mysqli_fetch_array($resultMar)){
                                ?>
                                <option value="<?php echo $dadosMar['marcaId']?>"
                                    <?php
                                    if($dados['telemovelMarcaId']==$dadosMar['marcaId'])
                                        echo " selected ";
                                    ?>
                                >
                                    <?php echo $dadosMar['marcaNome']?>
                                </option>
                                <?php
                            }

                            ?>

                        </select>
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