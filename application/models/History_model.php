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
class History_model extends MY_Model {
    public function __construct() {
        parent::__construct('transactions','id');
    }
    
    // retrieve all history transactions
    public function retrieveTransactions()
    {
        return $this->all();
    }
    
    // sort transactions by amount
    public function sortPrice($order)
    {
        // retrieve all history transactions
        $transactions = $this->all();
        foreach($transactions as $transaction)
            $trans[] = (array) $transaction;
        $amount = array();
        foreach($trans as $key => $row)
        {
            $amount[key] = $row['amount'];
        }
        
        if(strcmp($order, "asc") == 0){
            array_multisort($amount, SORT_ASC, $trans);
        } else if(strcmp($order, "desc") == 0){
            array_multisort($amount, SORT_DESC, $trans);
        }
        
        return $trans;
    }
    
    public function sortByTime($order)
    {
        $transactions = $this->all();
        foreach($transactions as $transaction)
            $byTime[] = (array) $transaction;
        if(strcmp($order, "asc") == 0)
        {
            usort($byTime, array($this, "sortTimeAsc"));
        } else if(strcmp($order, "desc") == 0)
        {
            usort($byTime, array($this, "sortTimeDesc"));
        }
        return $byTime;
    }
    
    // sort transactions by ascending time
    public function sortTimeAsc($a, $b)
    {
        return strtotime($a['time']) - strtotime($b['time']);
    }
    
    // sort transactions by descending time
    public function sortTimeDesc($a, $b)
    {
        return strtotime($b['time']) - strtotime($a['time']);
    }
}
