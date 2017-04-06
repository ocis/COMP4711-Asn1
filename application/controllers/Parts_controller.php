<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Parts
 *
 * @author Billy
 */
class Parts_Controller extends Application {
    //put your code here

    //displays all parts on hand
    public function index()
    {
        $this->data['pagebody'] = 'Parts_View';
        $source = $this->parts->all();
        $parts_onhand = array();
        foreach ($source as $record)
        {
            if($record->available == 1){
                            $model = strtoupper($record->model);
            if(ord($model) >= ord('A') && ord($model) <= ord('L')){
                $line = 'household';
            } else if(ord($model) >= ord('M') && ord($model) <= ord('V')){
                $line = 'butler';
            } else{
                $line = 'companion';
            }
            $parts_onhand[] = array ('part_code' => $record->model.$record->piece, 'image' => $record->model.$record->piece.'.jpeg',
                'certificate' => $record->certificate, 'ahref' => '/part/'.$record->certificate, 'line' => $line);
            }
        }

        usort($parts_onhand, function($a, $b){
            return strcmp($a['line'], $b['line']);
        });

        $this->data['parts'] = $parts_onhand;
        $this->render();
    }

    //displays a single part in single_part_view
    public function single_part($certificate){
        $this->data['pagebody'] = 'Single_part_view';

        $record = $this->parts->getpart($certificate);

        $this->data = array_merge($this->data, $record);
        $this->render();
    }
    public function buildparts() {
        $parts = $this->umbrella->mybuilds();
        $part = new stdClass();
        $transaction = new stdClass();
        foreach($parts as $key => $value){
            $part->certificate = $value->id;
            $part->model = $value->model;
            $part->piece = $value->piece;
            $part->plant = $value->plant;
            $part->built = $value->stamp;
            $this->parts->add($part);
            $transaction->id = "";
            $transaction->type = 'part_build';
            $transaction->part_id = $value->id;
            $transaction->time = date('Y-m-d H:i:s');
            $this->history->add($transaction);
        }
        $this->index();
    }
    public function buybox() {
        $parts = $this->umbrella->buybox();
        $part = new stdClass();
        $transaction = new stdClass();
        foreach($parts as $key => $value){
            $part->certificate = $value->id;
            $part->model = $value->model;
            $part->piece = $value->piece;
            $part->plant = $value->plant;
            $part->built = $value->stamp;
            $this->parts->add($part);
            $transaction->id = "";
            $transaction->type = 'part_purchase';
            $transaction->part_id = $value->id;
            $transaction->amount = -100/count($parts);
            $this->history->add($transaction);
        }
        $this->index();
    }
}
