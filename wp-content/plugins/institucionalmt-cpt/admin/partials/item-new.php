<div class="had-container">
    <h4 class="wp-heading-inline"><?php echo get_admin_page_title(); ?></h4>
    <div class="divider"></div>

    <!-- Modal Structure -->
    <div class="row">
        <form method="post" class="col s12 m12 l12">
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
            </div><!-- preloader -->
            <div class="col s12 m6 l6 xl4 left">
                <div class="card-panel hoverable">
                    <div class="section">
                        <h5 class="teal-text text-darken-2">Tipo de item</h5>
                    </div>
                    <div class="divider"></div>
                    <div class="card-content mt30">
                        <!-- select -->
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">format_list_bulleted</i>
                                <select id="instmt-item-post-type" name="instmt-item-post-type" class="instmt-select-cpt">
                                    <option value="" disabled selected>Selecciona un tipo</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                                <label>Tipo de publicación</label>
                            </div>
                        </div>
                        <!-- select -->
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">local_offer</i>
                                <select disabled id="instmt-table-term-id" name="instmt-table-term-id" class="instmt-select-document-categories">
                                    <option value="" disabled selected>Selecciona una categoría</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                                <label>Categoría</label>
                            </div>
                        </div>
                        <div class="row">
                            <ul class="collection with-header yellow lighten-3">
                                <li class="collection-header yellow lighten-3"><h6>Publicaciones de esta categoría</h6></li>
                                <li class="collection-item yellow lighten-3">
                                    <label><input type="checkbox" checked="checked"><span>Item 1</span></label>
                                </li>
                                <li class="collection-item yellow lighten-3">
                                    <label><input type="checkbox"><span>Item 2</span></label>
                                </li>
                                <li class="collection-item yellow lighten-3">
                                    <label><input type="checkbox"><span>Item 3</span></label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CENTER -->
            <div class="col s12 m6 l6 xl5">
                <div class="card-panel hoverable">
                    <div class="section">
                        <h5 class="teal-text text-darken-2">Detalles</h5>
                    </div>
                    <div class="divider"></div>
                    <div class="card-content mt30">
                        <!-- input -->
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">title</i>
                                <input type="text" id="instmt-item-name" class="char-counter validate" data-length="255">
                                <label for="instmt-item-name">Nombre</label>
                                <span class="helper-text" data-error="Incorrecto" data-success="Correcto">El nombre de la tabla no debe contener espacios en blanco</span>
                                <div class="row" style="margin:16px 0 0 45px;">
                                <span class="item-slug-anchor">Slug: <a href="#" id="item-slug" name="item-slug" class="item-slug">documentos/nombre.pdf</a></span>
                                </div>
                            </div>
                        </div>     
                        <!-- textarea -->
                        <div class="row">
                            <div class="input-field col s12">
                            <i class="material-icons prefix">subject</i>
                            <textarea id="instmt-item-description" class="char-counter materialize-textarea" data-length="500"></textarea>
                            <label for="instmt-item-description">Decripción</label>
                            </div>
                        </div>          
                    </div>
                </div>
                <div class="card-panel hoverable">
                    <div class="section">
                        <h5 class="teal-text text-darken-2">Archivo</h5>
                    </div>
                    <div class="divider"></div>
                    <div class="card-content pt30">
                        <!-- file -->
                        <div class="row">
                            <label for="instmt-input-file-url">Seleccione un archivo</label>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">attachment</i>
                                <input class="validate" type="text" id="instmt-input-file-url" name="instmt-input-file-url">                                
                            </div>                            
                        </div>
                        <span class="url"></span>
                        <div class="row center">
                                <div class="col s6">
                                    <button class="btn waves-effect waves-light blue lighten-2 tooltipped" data-tooltip="Subir un archivo al gestor de medios" type="button" id="instmt-btn-upload-new-file" name="instmt-btn-upload-new-file">Subir archivo
                                        <i class="material-icons right">file_upload</i>
                                    </button>                                    
                                </div>
                                <div class="col s6">
                                    <button class="btn waves-effect waves-light amber accent-4 tooltipped" data-tooltip="Seleccionar un archivo del gestor de medios" type="button" id="instmt-btn-search-uploaded-file" name="instmt-btn-search-uploaded-file">Buscar archivo
                                        <i class="material-icons right">folder</i>
                                    </button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l12 xl3 right">
                <div class="card-panel hoverable col s12 m12 l5 xl12">
                    <div class="section">
                        <h5 class="teal-text text-darken-2">Ajustes</h5>
                    </div>
                    <div class="divider"></div>
                    <div class="card-content">
                        <ul class="collection">
                            <li class="collection-item">
                                Publicado:
                                <div class="right">
                                    <label><input name="item-status" type="radio" class="with-gap"><span>No</span></label>
                                    <label><input name="item-status" type="radio" class="with-gap"><span>Si</span></label>
                                </div>
                            </li>
                            <li class="collection-item">
                                Visible:
                                <div class="right">
                                    <label><input name="item-searchable" type="radio" class="with-gap"><span>No</span></label>
                                    <label><input name="item-searchable" type="radio" class="with-gap"><span>Si</span></label>
                                </div>
                            </li>
                            <li class="collection-item">
                                Publico:
                                <div class="right">
                                    <label><input name="item-access" type="radio" class="with-gap"><span>No</span></label>
                                    <label><input name="item-access" type="radio" class="with-gap"><span>Si</span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-panel hoverable col s12 m12 l6 xl12">
                    <div class="section">
                        <h5 class="teal-text text-darken-2">Publicar</h5>
                    </div>
                    <div class="divider"></div>
                    <div class="card-content">
                        <!-- input -->
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">timeline</i> <!-- linear_scale -->
                                <input type="number" id="instmt-item-version" class="validate">                                
                                <label for="instmt-item-version">Versión</label>                                
                            </div>
                        </div>    
                        <div class="row">
                            <!-- datepicker -->
                            <div class="input-field col s12">
                                <i class="material-icons prefix">event_available</i>
                                <input type="text" class="datepicker" id="instmt-table-publish_date" name="instmt-table-publish_date">
                                <label for="instmt-table-publish_date">Fecha de publicación</label>
                            </div>
                        </div>
                        <div class="row">
                            <!-- datepicker -->
                            <div class="input-field col s12">
                                <i class="material-icons prefix">event_busy</i>
                                <input type="text" class="datepicker" id="instmt-table-unpublish_date" name="instmt-table-unpublish_date">
                                <label for="instmt-table-unpublish_date">Anular la publicación</label>
                            </div>
                        </div>
                        <!-- button -->
                        <div class="row right">
                        <div class="col s12">
                                <button class="btn btn-large waves-effect waves-light" type="button" id="btn-create-instmt-item" name="action">Publicar
                                    <i class="material-icons right">save</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>

        </form>
    </div>
</div>