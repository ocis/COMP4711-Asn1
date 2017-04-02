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
                $parts_onhand[] = array ('part_code' => $record->model.$record->piece, 'image' => $record->model.$record->piece.'.jpeg',
                    'certificate' => $record->certificate, 'ahref' => '/part/'.$record->certificate);
        }
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
        foreach($parts as $key => $value){
            $part->certificate = $value->id;
            $part->model = $value->model;
            $part->piece = $value->piece;
            $part->plant = $value->plant;
            $part->built = $value->stamp;
            $this->parts->add($part);
        }
        $this->index();
    }
    public function buybox() {
        $parts = $this->umbrella->buybox();
        $part = new stdClass();
        foreach($parts as $key => $value){
            $part->certificate = $value->id;
            $part->model = $value->model;
            $part->piece = $value->piece;
            $part->plant = $value->plant;
            $part->built = $value->stamp;
            $this->parts->add($part);
        }
        $this->index();
    }
}
