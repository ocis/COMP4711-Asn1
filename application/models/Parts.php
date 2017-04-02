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
class Parts extends MY_Model {
    //put your code here
    	// The data comes from randomly generated musings of my fingers

	// Constructor
	public function __construct()
	{
		parent::__construct('parts', 'certificate');
	}

	// retrieve a single part
	public function getpart($which)
	{
		// iterate over the data until we find the one we want
            $partslist = $this->all();
            foreach ($partslist as $record)
                    if ($record->certificate == $which){
                        return array('part_code' => $record->model.$record->piece, 'image' => $record->model.$record->piece.'.jpeg',
                        'certificate' => $record->certificate, 'ahref' => '/part/'.$record->certificate, 'plant' => $record->plant, 'date' => $record->built);
                    }
            return null;
	}


}
