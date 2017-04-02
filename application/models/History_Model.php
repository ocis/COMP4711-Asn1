<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of History_Model
 *
 * @author jason
 */
class History_Model extends My_Model {
    var $data = array(
		array('TransID' => '1', 'RobotID'=> 'Nectarine', 'PartsID' => 'N1', 'Transaction Type' => 'Sell', 'Transaction Date' => '2017-02-10', 'Transaction Time' => '09:21',
                    'Shipment Status' => 'Received', 'Shipment Date' => '2017-02-12', 'Shipment Received Date' => '2017-02-12', 'Shipment Received Time' => '13:25'),
		array('TransID' => '2', 'RobotID'=> 'Durian', 'PartsID' => 'D2', 'Transaction Type' => 'Sell', 'Transaction Date' => '2017-02-05', 'Transaction Time' => '12:21',
                    'Shipment Status' => 'Received', 'Shipment Date' => '2017-02-07', 'Shipment Received Date' => '2017-02-07', 'Shipment Received Time' => '11:20'),
		array('TransID' => '3', 'RobotID'=> 'Oragnes', 'PartsID' => 'O3', 'Transaction Type' => 'Sell', 'Transaction Date' => '2017-02-09', 'Transaction Time' => '07:36',
                    'Shipment Status' => 'Received', 'Shipment Date' => '2017-02-11', 'Shipment Received Date' => '2017-02-11', 'Shipment Received Time' => '16:33'),
		array('TransID' => '4', 'RobotID'=> 'Nectarine', 'PartsID' => 'N2', 'Transaction Type' => 'Sell', 'Transaction Date' => '2017-02-12', 'Transaction Time' => '07:15',
                    'Shipment Status' => 'Pending', 'Shipment Date' => '2017-02-13', 'Shipment Received Date' => '', 'Shipment Received Time' => ''),
		array('TransID' => '5', 'RobotID'=> 'Durian', 'PartsID' => 'D3', 'Transaction Type' => 'Sell', 'Transaction Date' => '2017-02-12', 'Transaction Time' => '09:21',
                    'Shipment Status' => 'Pending', 'Shipment Date' => '2017-02-13', 'Shipment Received Date' => '', 'Shipment Received Time' => '')
	);
	// Constructor
	public function __construct()
	{
		parent::__construct('transactions', 'id');
	}
	// retrieve all of the data
	public function all()
	{
		return $this->data;
	}
}
