<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of History
 *
 * @author jason
 */
class History extends Application{
    
    //constructor
    function __construct(){
        parent::_construct();
        $this->load->model('history');
    }
    
    public function index(){
        $this->data['pagebody'] = 'History_Model';
        $source = $this->history->all();
        $history = array();
        foreach($source as $record){
            $history[] = array( 'TransID' => $record['TransID'],
                                'RobotID' => $record['RobotID'],
                                'PartsID' => $record['PartsID'],
                                'Transaction Type' => $record['Transaction Type'],
                                'Transaction Date' => $record['Transaction Date'],
                                'Transaction Time' => $record['Transaction Time'],
                                'Shipment Status' => $record['Shipment Status'],
                                'Shipment Date' => $record['Shipment Date'],
                                'Shipment Recieved Date' => $record['Shipment Recieved Date'],
                                'Shipment Recieved Time' => $record['Shipment Recieved Time']);
        }
        
        $this->data['history'] = $history;
        $this->render();
    }
}
