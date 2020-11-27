<?php
//$new_item_slug = admin_url( 'admin.php?page=instmt_items&action=new&id=1', 'http' );   

?>

<div class="had-container">

    <!-- Page title -->
    <div class="row">
        <div class="col s12">
            <h5 class="wp-heading-inline"><?php echo esc_html(get_admin_page_title()); ?></h5>
        </div>
    </div>

    <!-- Add item button -->
    <div class="row">
        <div class="col s12">
            <button class="add-instmt-table btn-floating btn-large pulse modal-trigger" name="action" value="new"><i class="material-icons">add</i></button>
            <?php #TODO: Añadir boton "Crear nuevo Item" ?>
            
            <!-- <form action="<?php echo $new_item_slug; ?>" method="get">
                <a href="" class="add-instmt-table btn-floating btn-large pulse modal-trigger"><i class="material-icons">add</i></a>
            </form> -->
            <span style="font-size:16px; margin-top:5px;">Crear nueva tabla de datos</span>
        </div>
    </div>

    <!-- Elementos de la tabla -->
    <div class="row">
        <div class="col l12">

            <table class="responsive-table white highlight">

                <thead>
                    <tr>
                        <th colspan="2">Nombre</th>
                        <th>ID</th>
                        <th>Archivo</th>
                        <th>Categoría</th>
                        <th>Estatus</th>
                        <th>Autor</th>
                        <th>Descargas</th>
                        <th>Fecha de publicación</th>
                        <th></th>

                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td class="center"><img src="<?php echo INSTMT_PLUGIN_DIR_URL . 'admin/image/pdf.svg'; ?>" style="max-width:60px;" alt=""></td>
                        <td>
                            <a href="#"><span class="title">Documento 1</span></a>
                        </td>
                        <td>1</td>
                        <td><a href="#">https://localhost/archivo.pdf</a></td>
                        <td>Leyes</td>
                        <td>Publicado</td>
                        <td>Ramon.Fabian</td>
                        <td><span style="margin-right:5px;">1000</span><span class="download new badge">1</span></td>
                        <td>10/11/2020 a las 00:52</td>
                        <td>
                            <span class="btn btn-floating waves-effect waves-light tooltipped" data-position="bottom" data-tooltip="Editar"><i class="tiny material-icons">mode_edit</i></span>
                            <span class="btn btn-floating waves-effect waves-light red darken-1 tooltipped" data-position="bottom" data-tooltip="Eliminar"><i class="tiny material-icons">close</i></span>
                        </td>
                    </tr>
                    <tr>
                    <td class="center"><img src="<?php echo INSTMT_PLUGIN_DIR_URL . 'admin/image/mime/xlsx.svg'; ?>" style="max-width:60px;" alt=""></td>
                        <td><a href="#"><span>Documento 2</span></a></td>
                        <td>2</td>
                        <td><a href="#">https://localhost/archivo2.pdf</a></td>
                        <td>Decretos</td>
                        <td>Publicado</td>
                        <td>Ramon.Fabian</td>
                        <td>800<span class="download badge">1</span></td>
                        <td>12/11/2020 a las 00:52</td>
                        <td>
                            <span class="btn btn-floating waves-effect waves-light tooltipped" data-position="bottom" data-tooltip="Editar"><i class="tiny material-icons" >mode_edit</i></span>
                            <span class="btn btn-floating waves-effect waves-light red darken-1 tooltipped" data-position="bottom" data-tooltip="Eliminar"><i class="tiny material-icons">close</i></span>
                        </td>
                    </tr>
                </tbody>

            </table>

        </div>
    </div>


</div>

<!-- Modal Structure -->
<div id="modal_add_instmt_table" class="modal">
    <div class="modal-content">

        <!-- Preloader -->
        <div class="instmt-preloader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>

        <form method="post" class="col s12">
            <!-- select -->
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">article</i>
                    <select id="instmt-table-post-type" name="instmt-table-post-type" class="instmt-select-cpt">
                        <option value="" disabled selected>Selecciona un tipo de publicación</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                    <label>Tipo de publicación</label>
                </div>
                <!-- select -->
                <div class="input-field col s6">
                    <i class="material-icons prefix">category</i>
                    <select id="instmt-table-term-id" name="instmt-table-term-id" class="instmt-select-document-categories">
                        <option value="" disabled selected>Selecciona una categoría</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                    <label>Categoría</label>
                </div>
            </div>
            <!-- input -->
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">border_all</i>
                    <input type="text" id="instmt-table-name" class="validate">
                    <label for="instmt-table-name">Nombre de la tabla</label>
                    <span class="helper-text" data-error="Incorrecto" data-success="Correcto">El nombre de la tabla no debe contener espacios en blanco</span>
                </div>
            </div>
            <!-- file -->
            <div class="row file-field input-field">
                <div class="file-path-wrapper col s10">
                    <i class="material-icons prefix">attachment</i>
                    <input class="file-path validate" type="text" id="instmt-table-filename" name="instmt-table-filename" placeholder="Seleccione un archivo">
                </div>
                <div class="btn amber accent-1">
                    <span class="black-text">Archivo</span>
                    <input type="file" id="instmt-table-url" name="instmt-table-url">
                </div>
            </div>
            <div class="row">
                <!-- datepicker -->
                <div class="input-field col s6">
                    <i class="material-icons prefix">event_available</i>
                    <input type="text" class="datepicker" id="instmt-table-publish_date" name="instmt-table-publish_date">
                    <label for="instmt-table-publish_date">Fecha de publicación</label>
                </div>
                <!-- datepicker -->
                <div class="input-field col s6">
                    <i class="material-icons prefix">event_busy</i>
                    <input type="text" class="datepicker" id="instmt-table-unpublish_date" name="instmt-table-unpublish_date">
                    <label for="instmt-table-unpublish_date">Anular la publicación</label>
                </div>
            </div>
            <!-- button -->
            <div class="row">
                <div class="col s12">
                    <button class="btn waves-effect waves-light" type="button" id="btn-create-instmt-table" name="action">Crear tabla
                        <i class="material-icons right">add</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>