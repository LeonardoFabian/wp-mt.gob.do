<?php 

class InstitucionalMT_Http {

    public function print_data(){

        $response = wp_remote_get( "https://api.github.com/users/wordpress" );
       // $response = wp_remote_get( "https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA" );

        /**
         * FLICKR API
         */
        //$response = wp_remote_get( "https://www.flickr.com/photos/190711652@N03/albums/" );
        

        //var_dump( json_decode( $response['body'], true ) );
        //var_dump( $response['response'] );
        //var_dump( $response['cookies'] );
        //var_dump( $response['filename'] );

        /**
         * FUNCIONES WORDPRESS
         */
        //var_dump(wp_remote_retrieve_body($response));
        var_dump(wp_remote_retrieve_response_code($response));

        /**
         * HEADERS
         */
        //var_dump(wp_remote_retrieve_headers( $response ) );
        var_dump(wp_remote_retrieve_header( $response, 'last-modified' ) );



        /**
         * PETICIONES USANDO PHP
         */
        $c = curl_init(); //inicializar

        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'User-Agent: https://api.github.com/users'
        ];

        //$array = [];

        curl_setopt( $c, CURLOPT_RETURNTRANSFER, 1); // cambios en las opciones
        curl_setopt( $c, CURLOPT_HTTPHEADER, $headers); // User-agent

        //curl_setopt( $c, CURLOPT_POST, 1); // Convirtiendolo a metodo POST (Defalt: GET), se deben pasar valores
        //curl_setopt( $c, CURLOPT_CUSTOMREQUEST, "POST"); // POST, GET, HEAD
        //curl_setopt( $c, CURLOPT_POSTFIELDS, $array); // Convirtiendolo a metodo POST (Defalt: GET), se deben pasar valores

        curl_setopt( $c, CURLOPT_URL, 'https://api.github.com/users/wordpress');
        curl_setopt( $c, CURLOPT_TIMEOUT, 5); // el parametro cantidad (3er) se pasa en segundos

        $response = curl_exec( $c );

        if( ! curl_errno( $c ) ){

            $info = curl_getinfo( $c );
            //var_dump( $info );
            var_dump( $info['http_code'] );

            //var_dump( $response );

        }

        

        curl_close($c);

    }

}