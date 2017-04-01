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
		array('Transaction Type' => 'Sell', 'Transaction Date' => '2017-02-10', 'Transaction Time' => '09:21',
                    'Shipment Date' => '2017-02-12', 'Shipment Received Date' => '2017-02-12', 'Shipment Received Time' => '13:25', 'Description' => 'Sold to Jim'),
		array('Transaction Type' => 'Return', 'Transaction Date' => '2017-02-05', 'Transaction Time' => '12:21',
                    'Shipment Date' => '2017-02-07', 'Shipment Received Date' => '2017-02-07', 'Shipment Received Time' => '11:20', 'Description' => 'Part malfunction'),
		array('Transaction Type' => 'Assemble', 'Transaction Date' => '2017-02-09', 'Transaction Time' => '07:36',
                    'Shipment Date' => '2017-02-11', 'Shipment Received Date' => '2017-02-11', 'Shipment Received Time' => '16:33', 'Description' => 'Robot Assmbled'),
		array('Transaction Type' => 'Sell', 'Transaction Date' => '2017-02-12', 'Transaction Time' => '07:15',
                    'Shipment Date' => '2017-02-13', 'Shipment Received Date' => '2017-02-15', 'Shipment Received Time' => '14:30', 'Description' => 'Sold to Matt'),
		array('Transaction Type' => 'Sell', 'Transaction Date' => '2017-02-12', 'Transaction Time' => '09:21',
                    'Shipment Date' => '2017-02-13', 'Shipment Received Date' => '2017-02-18', 'Shipment Received Time' => '10:30', 'Description' => 'Sold to Billy')
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
