<?php 

class InstitucionalMT_Loader{

    protected $actions;
    protected $filters;

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
            'hook'          => $hook,
            'component'     => $component,
            'callback'      =>  $callback,
            'priority'      =>  $priority,
            'accepted_args' =>  $accepted_args
        ];

        return $hooks;

    }

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