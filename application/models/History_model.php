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

    public function getSorted($sort) {
        $transactions = $this->all();
        usort($transactions, "order_by_".$sort);

        return $transactions;
    }
}

function order_by_id($a, $b) {
    if($a->id < $b->id)
      return -1;
    elseif ($a->id > $b->id)
      return 1;
    else
      return 0;
}

function order_by_type($a, $b) {
    if($a->type < $b->type)
      return -1;
    elseif ($a->type > $b->type)
      return 1;
    else
      return 0;
}

function order_by_part_id($a, $b) {
    if($a->part_id < $b->part_id)
      return -1;
    elseif ($a->part_id > $b->part_id)
      return 1;
    else
      return 0;
}

function order_by_robot_id($a, $b) {
    if($a->robot_id < $b->robot_id)
      return -1;
    elseif ($a->robot_id > $b->robot_id)
      return 1;
    else
      return 0;
}

function order_by_amount($a, $b) {
    if($a->amount < $b->amount)
      return -1;
    elseif ($a->amount > $b->amount)
      return 1;
    else
      return 0;
}

function order_by_time($a, $b) {
    if($a->time < $b->time)
      return -1;
    elseif ($a->time > $b->time)
      return 1;
    else
      return 0;
  }
