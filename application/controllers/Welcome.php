<?php

/**
 * Our homepage.
 * 
 * Present a summary of the completed orders.
 * 
 * controllers/welcome.php
 *
 * ------------------------------------------------------------------------
 */
class Welcome extends Application {

    function __construct() {
        parent::__construct();
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index() {
        $this->data['title'] = 'Jim\'s Joint!';
        $this->data['pagebody'] = 'welcome';

        // Get all the completed orders
        //FIXME
        // we must first intiate/load the order class from the model. Auto loaded
        $completed = $this->orders->some('status', 'c'); //and now we are initializing the model with the perameters

        // Build a multi-dimensional array for reporting
        $orders = array();
        foreach ($completed as $order) {
            $this1 = array(
                'num' => $order->num,
                'datetime' => $order->date,
                'amount' => $order->total
            );
            $orders[] = $this1;
        }

        // and pass these on to the view
        $this->data['orders'] = $orders;
        
        $this->render();
    }

}
