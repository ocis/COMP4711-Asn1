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
class History extends Application {
    public function index(){
        $this->data['pagebody'] = 'History_View';
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
                                'Shipment Received Date' => $record['Shipment Received Date'],
                                'Shipment Received Time' => $record['Shipment Received Time']);
        }

        $this->data['history'] = $history;
        $this->render();
    }
}
