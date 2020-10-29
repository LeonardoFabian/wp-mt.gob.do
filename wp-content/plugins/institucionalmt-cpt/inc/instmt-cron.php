<?php 

class InstitucionalMT_Cron {

    public function institucionalmt_cron_intervalos( $intervalos ){

        $intervalos['five_seconds'] = [
            'interval' => 5,
            'display' => __('Cada 5 segundos', 'institucionalmt')
        ];

        $intervalos['five_minutes'] = [
            'interval' => 300,
            'display' => __('Cada 5 minutos', 'institucionalmt')
        ];

        $intervalos['half_an_hour'] = [
            'interval' => 1800,
            'display' => __('Cada 30 minutos', 'institucionalmt')
        ];

        return $intervalos;
    }

    // TODO: contador de visitas
    // TODO: notificacion por correo
    // TODO: enviar ultimas publicaciones a los usuarios que lo elijan
    // Los eventos se ejecutan en DOMININIO.COM/WP-CRON.PHP
    //public function institucionalmt_cron_enviar_ultima_publicacion(){
    public function institucionalmt_cron_enviar_ultima_publicacion( $arg1, $arg2 ){

        echo "Se esta enviando la ultima publicacion";
        var_dump( $arg1 );
        var_dump( $arg2 );

    }

    public function institucionalmt_cron_init(){

        $args = [
            'arg1' => 150,
            'arg2' => 250,
        ];

        // // Descomentar y ejecutar para desprogramar un evento y poder agregarle los argumentos
        // // NOTA: el timestamp debe ser exactamente igual a la proxima ejecucion del evento
        // $timestamp = wp_next_scheduled('instmt_cron');
        // wp_unschedule_event( $timestamp, 'instmt_cron', $args );

        // // Desprogramar todos los eventos asociados a un gancho
        // wp_clear_scheduled_hook('instmt_cron' );
        // wp_clear_scheduled_hook('instmt_cron', $args );


        // // // Comentar para ejecutar wp_schedule_event
        if( ! wp_next_scheduled( 'instmt_cron', $args)){

            wp_schedule_event( time()+10, 'five_seconds', 'instmt_cron', $args );

        }

    }
    

}