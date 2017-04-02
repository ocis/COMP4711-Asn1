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
    /*public function index(){
        $this->data['pagebody'] = 'History_view';
        $source = $this->history->all();
        $history = array();
        foreach($source as $record){
            $history[] = array( 'Transaction ID' => $record['Transaction ID'],
                                'Transaction Type' => $record['Transaction Type'],
                                'Parts ID' => $record['Parts ID'],
                                'Robot ID' => $record['Robot ID'],
                                'Amount' => $record['Amount'],
                                'Transaction Time' => $record['Transaction Time'],
                                'Description' => $record['Description']);
        }

        $this->data['history'] = $history;
        $this->render();
    }*/
    
    // set number of transactions per page
    private $num_transactions = 25;
    
    public function index()
    {
        $this->page(1);
    }
    
    private function show_page($transactions)
    {
        $result = '';
        foreach($transactons as $transaction)
        {
            $result .= $this->parser->parse('onetransaction', (array) $transaction, true);
        }
        $this->data['display_transactions'] = $result;
    }
    
    
}
