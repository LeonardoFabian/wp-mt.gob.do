

<?php
    $custom_fields = get_post_meta( $post->ID, '_instmt_rlt');    

    $datos = $custom_fields;
    
    foreach( $datos as $key => $dato ){
?>



        <div class="card">

             <!-- Map -->
             
             <div id="" class="card-img-top" style="height:150px">                   
                <?php echo $dato['map_iframe']; ?>                    
            </div>


            <!-- Content -->
            <div class="card-body">

                
            <div class="white px-4 pb-4 pt-3-5">

                <!-- Title -->
                <h5 class="map-card-title card-title h5 text-left"><?php echo get_the_title(); ?></h5>

                <div class="d-flex justify-content-between">
                    <h5 class="card-subtitle font-weight-light"><?php echo $dato['representante']; ?></h5>
                </div>

                <div class="d-flex justify-content-between">
                    <h6 class="font-small font-weight-light mt-n1"><?php echo $dato['cargo']; ?></h6>
                </div>

                <hr>              
          

                <table class="table table-borderless">

                    <tbody>

                        <tr>
                            <th scope="row" class="px-0 ">
                                <i class="fa fa-phone"></i>
                            </th>
                            <td class="text-left"><?php echo $dato['telefono']; ?></td>
                        </tr>

                        <tr>
                            <th scope="row" class="px-0 ">
                                <i class="fa fa-mobile"></i>
                            </th>
                            <td class="text-left"><?php echo $dato['flota']; ?></td>
                        </tr>

                        <tr class="mt-1">
                            <th scope="row" class="px-0 ">
                                <i class="fas fa-map-marker-alt"></i>
                            </th>
                            <td class="text-left"><?php echo $dato['direccion_1'] . ", " . $dato['direccion_2']; ?></td>
                        </tr>

                        <tr class="mt-1">
                            <th scope="row" class="px-0 ">
                                <i class="far fa-envelope"></i>
                            </th>
                            <td class=" text-left"><?php echo $dato['correo']; ?></td>
                        </tr>

                        <tr class="mt-1">
                            <th scope="row" class="px-0 ">
                                <i class="far fa-clock"></i>
                            </th>
                            <td class="text-left"><?php echo $dato['horario']; ?></td>
                        </tr>

                    </tbody>

                </table>

            </div>
            <!-- white -->

        </div>
        <!-- card -->     

</div>		



<?php } ?>

