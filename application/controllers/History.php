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
    } */

    private $items_per_page = 25;

    public function index()
    {
        $this->page(1);
    }

    private function display_page($transactions)
    {
        $role = $this->session->userdata('userrole');
        if($role == "boss") {
            $result = "";
            foreach($transactions as $trans) {
                switch($trans->type) {
                    case "part_build":
                        $trans->type = "Part Built";
                        break;
                    case "part_purchase":
                        $trans->type = "Part Purchased";
                        break;
                    case "part_sale":
                        $trans->type = "Part Sold";
                        break;
                    case "robot_purchase":
                        $trans->type = "Robot Purchased";
                        break;
                    case "robot_sale":
                        $trans->type = "Robot Sold";
                        break;
                    case "part_recycle":
                        $trans->type = "Part Recycled";
                        break;
                    case "robot_build":
                        $trans->type = "Robot Built";
                        break;
                }

                if($trans->amount > 0) {
                    $trans->amt_style = "text-success";
                } else if ($trans->amount < 0) {
                    $trans->amt_style = "text-danger";
                } else {
                    $trans->amt_style = "";
                    $trans->amount = "-";
                }

                $result .= $this->parser->parse('history_item', (array) $trans, true);
            }

            $this->data['display_history'] = $result;

            $this->data['pagebody'] = 'history_view';
            $this->render();
        }
    }

    public function page($num = 1) {
        $sort = $this->input->get('sort');
        if(isset($sort))
            $history = $this->history->getSorted($sort);
        else
            $history = $this->history->all();

        $transactions = array();

        $index = 0;
        $count = 0;
        $start = ($num - 1) * $this->items_per_page;
        foreach($history as $trans) {
            if($index++ >= $start) {
                $transactions[] = $trans;
                $count++;
            }
            if($count >= $this->items_per_page) break;
        }

        $this->data['pagination'] = $this->pagenav($num);

        $this->display_page($transactions);
    }

    private function pagenav($num) {
        $lastpage = ceil($this->history->size() / $this->items_per_page);
        $parms = array(
          'first' => 1,
          'previous' => (max($num-1,1)),
          'next' => min($num+1,$lastpage),
          'last' => $lastpage
        );
        return $this->parser->parse('history_nav',$parms,true);
    }
}
