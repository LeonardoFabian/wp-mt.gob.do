<?php 

class InstitucionalMT_Meta_Field_Dependencias {

    public function add_meta_field(){

        $html = "
        <div class='form-field term-parent-wrap'>
            <label for='tipo'>Tipo</label>
            <input type='text' name='tipo'>
            <p>Puede agregar un catgoría a la taxonomía actual, para ver la categoría de una taxonomía, haga click en Editar</p>
        </div>
        ";

        echo $html;

    }

    public function edit_meta_field( $term ){

        $tipo = get_term_meta( $term->term_id, 'tipo', true );
        $tipo = isset( $tipo ) ? $tipo : '';

        $html = "
        <tr class='form-field form-required term-name-wrap'>
            <th scope='row'><label for='tipo'>Tipo</label></th>
            <td>
                <input type='text' name='tipo' id='tipo' size='40' value='$tipo'>
            </td>
            <p class='description'>Tipo de Dependencia</p>
        </tr>
        ";

        echo $html;

    }

    public function save_meta_field( $termID ){

        // TO DO: nonces

        $tipo = get_term_meta( $termID, 'tipo', true );

        if( isset( $_POST['tipo'] ) ) {

            update_term_meta( $termID, 'tipo', $_POST['tipo'] );

        } else {

            delete_term_meta( $termID, 'tipo', $_POST['tipo'] );
        }

    }

}

?>



