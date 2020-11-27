<?php 

/**
 * Registrar todas las acciones y filtros para el complemento
 * 
 * @link            https://misitioweb.com
 * @since           1.0.0
 * 
 * @package         InstitucionalMT-CTA
 * @subpackage      InstitucionalMT-CTA/includes
 */

/**
 * Registrar todas las acciones y filtros del plugin
 * 
 * Mantener una lista de todos los ganchos que están registrados
 * en todo el plugin, y registrarlos con la API de WordPress.
 * Llame a la función run() para ejecutar la lista de acciones y filtros.
 * 
 * @since           1.0.0
 * @package         InstitucionalMT-CTA
 * @subpackage      InstitucionalMT-CTA/includes
 * @author          Ramón Fabián <ramonlfabian@gmail.com>
 * 
 * @property        array       $actions
 * @property        array       $filters
 */
class InstitucionalMT_CTA_Loader{

    /**
     * Array de acciones registradas en WordPress
     * 
     * @since       1.0.0
     * @access      protected
     * @var         array       $actions    Las acciones registradas en WordPress para ejecutar cuando se carga el plugin
     */
    protected $actions;

    /**
     * Array de filtros registrados en WordPress
     * 
     * @since       1.0.0
     * @access      protected
     * @var         array       $filters    Los filtros registrados en WordPress para ejecutar cuando se carga el plugin
     */
    protected $filters;

    /**
     * Método Constructor
     * 
     * Inicializa las propiedades utilizadas para mantener las acciones y filtros.
     * 
     * @since       1.0.0
     */
    public function __construct(){

        $this->actions = [];
        $this->filters = [];

    }

    public function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ){

        $this->actions = $this->add( $this->actions, $hook, $component, $callback, $priority, $accepted_args );

    }

    public function add_filter( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ){

        $this->filters = $this->add( $this->filters, $hook, $component, $callback, $priority, $accepted_args );
        
    }

    public function add( $hooks, $hook, $component, $callback, $priority, $accepted_args ){

        $hooks[] = [
            'hook'          =>  $hook,
            'component'     =>  $component,
            'callback'      =>  $callback,
            'priority'      =>  $priority,
            'accepted_args' =>  $accepted_args
        ];

        return $hooks;

    }

    /**
     * Registre todas las acciones y filtros con WordPress
     * 
     * @since           1.0.0
     * @access          public
     */
    public function run(){

        foreach( $this->actions as $action ){

            extract( $action, EXTR_OVERWRITE );

            add_action( $hook, [ $component, $callback ], $priority, $accepted_args );

        }

        foreach( $this->filters as $filter ){

            extract( $filter, EXTR_OVERWRITE );

            add_filter( $hook, [ $component, $callback ], $priority, $accepted_args );

        }

    }

}