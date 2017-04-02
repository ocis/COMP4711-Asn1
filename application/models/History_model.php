<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of History
 * 
 * Holds information of plant's history transaction
 * 
 * @author jason
 */
class History_model extends CI_Model {
    var $data = array(
		array('Transaction ID' => '1', 
                      'Transaction Type' => 'Sale', 
                      'Parts ID' => 'A1',
                      'Robot ID' => 'AA', 
                      'Amount' => '100', 
                      'Transaction Time' => '2017-03-31 13:25', 
                      'Description' => 'Sold to Jim'),
		array('Transaction ID' => '2', 
                      'Transaction Type' => 'Return', 
                      'Parts ID' => 'A1',
                      'Robot ID' => 'AA', 
                      'Amount' => '100', 
                      'Transaction Time' => '2017-04-01 11:20', 
                      'Description' => 'Part malfunction')
	);
    
	// Constructor
	public function __construct()
	{
            parent::__construct();
	}
        
	// retrieve all of the data
	public function all()
	{
		return $this->data;
	}
        
}
