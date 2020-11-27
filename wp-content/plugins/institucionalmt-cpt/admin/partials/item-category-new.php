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
                    <div class="card-content">                        
                        <!-- select -->
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">local_offer</i>
                                <select id="instmt-category-parent-category" name="instmt-category-parent-category" class="instmt-select-document-categories">
                                    <option value="" disabled selected>Selecciona una categoría</option>
                                    <option value="1" data-icon="<?php echo INSTMT_PLUGIN_DIR_URL . 'admin/image/mime/folder.svg'; ?>">Category 1</option>
                                    <option value="2" data-icon="<?php echo INSTMT_PLUGIN_DIR_URL . 'admin/image/mime/folder.svg'; ?>">Category 2</option>
                                    <option value="3" data-icon="<?php echo INSTMT_PLUGIN_DIR_URL . 'admin/image/mime/folder.svg'; ?>">Category 3</option>
                                </select>
                                <label>Categoría principal</label>
                            </div>
                        </div>
                        <ul class="collection with-header">
                            <li class="collection-header"><h6>Categoría padre</h6></li>
                            <li class="collection-item">
                                <div class="row" style="margin-bottom:0;">
                                    <div class="col s1 left"><img src="<?php echo INSTMT_PLUGIN_DIR_URL . 'admin/image/mime/folder.svg'; ?>" style="max-width:25px;" alt=""></div>
                                    <div class="col s9" style="margin-left: 10px;">
                                        <p class="title">Categoría 1</p>                                    
                                    </div>
                                    <div class="col s1 right valign-wrapper" style="padding-top: 8px;">
                                        <label><input type="checkbox" checked="checked"><span></span></label>
                                    </div>
                                </div>                                
                            </li>
                            <li class="collection-item">
                                <div class="row" style="margin-bottom:0;">
                                    <div class="col s1 left"><img src="<?php echo INSTMT_PLUGIN_DIR_URL . 'admin/image/mime/folder.svg'; ?>" style="max-width:25px;" alt=""></div>
                                    <div class="col s9" style="margin-left: 10px;">
                                        <p class="title">Categoría 2</p>                                    
                                    </div>
                                    <div class="col s1 right valign-wrapper" style="padding-top: 8px;">
                                        <label><input type="checkbox"><span></span></label>
                                    </div>
                                </div>                                
                            </li>
                            <li class="collection-item">
                                <div class="row" style="margin-bottom:0;">
                                    <div class="col s1 left"><img src="<?php echo INSTMT_PLUGIN_DIR_URL . 'admin/image/mime/folder.svg'; ?>" style="max-width:25px;" alt=""></div>
                                    <div class="col s9" style="margin-left: 10px;">
                                        <p class="title">Categoría 3</p>                                    
                                    </div>
                                    <div class="col s1 right valign-wrapper" style="padding-top: 8px;">
                                        <label><input type="checkbox"><span></span></label>
                                    </div>
                                </div>                                
                            </li>
                        </ul>
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
                    <div class="card-content">
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
            </div>
            <div class="col s12 m6 l12 xl3 right">
                <div class="card-panel hoverable col m12 l5 xl12">
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
                <div class="card-panel hoverable col m12 l6 offset-l1 xl12">
                    <div class="section">
                        <h5 class="teal-text text-darken-2">Publicar</h5>
                    </div>
                    <div class="divider"></div>
                    <div class="card-content">
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
                        <div class="row">
                            <div class="col s12">
                                <button class="waves-effect waves-light btn-large" type="button" id="btn-create-instmt-item" name="action">Publicar
                                    <i class="material-icons right">add</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>

        </form>
    </div>
</div>