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
class Parts extends CI_Model{
    //put your code here
    	// The data comes from randomly generated musings of my fingers
	var $data = array(
            array('part_code' => 'A3', 'image' => 'a3.jpeg', 'certificate' => 'A6B0FF27', 'plant' => 'nectarines', 'date' => '01-25-1920', 'ahref' => '/part/A6B0FF27'),
            array('part_code' => 'R1', 'image' => 'r1.jpeg', 'certificate' => 'FFFFFFFF', 'plant' => 'mandarines', 'date' => '07-25-1901', 'ahref' => '/part/FFFFFFFF'),
            array('part_code' => 'M2', 'image' => 'm2.jpeg', 'certificate' => '00000000', 'plant' => 'tangerines', 'date' => '08-03-1620', 'ahref' => '/part/00000000'),
            array('part_code' => 'W1', 'image' => 'w1.jpeg', 'certificate' => 'ABCDEF10', 'plant' => 'peaches', 'date' => '12-25-1999', 'ahref' => '/part/ABCDEF10'),
            array('part_code' => 'C3', 'image' => 'c3.jpeg', 'certificate' => '01234567', 'plant' => 'nectarines', 'date' => '10-31-2050', 'ahref' => '/part/01234567'),
            array('part_code' => 'B2', 'image' => 'b2.jpeg', 'certificate' => 'F2087CE9', 'plant' => 'durians', 'date' => '09-09-2009', 'ahref' => '/part/F2087CE9')
	);

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// retrieve a single quote
	public function get($which)
	{
		// iterate over the data until we find the one we want
		foreach ($this->data as $record)
			if ($record['certificate'] == $which)
				return $record;
		return null;
	}

	// retrieve all of the quotes
	public function all()
	{
            echo '<script>console.log("Inside all function")</script>';
            return $this->data;
	}
}
