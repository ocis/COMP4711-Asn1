<?php

/**
 * Holds information on each robot that has been constructed
 *
 * @author Braden D'Eith
 */
class Robots extends CI_Model {
    
    //list of assembled robots
    var $data = array(
		array('id' => '1', 'top' => 'a1', 'topImage' => 'a1.jpeg',
                      'torso' => 'a2', 'torsoImage' => 'a2.jpeg',
                      'bottom' => 'a3', 'bottomImage' => 'a3.jpeg'),
                array('id' => '2', 'top' => 'b1', 'topImage' => 'b1.jpeg',
                      'torso' => 'c2', 'torsoImage' => 'c2.jpeg',
                      'bottom' => 'a3', 'bottomImage' => 'a3.jpeg'),
                array('id' => '3', 'top' => 'b1', 'topImage' => 'b1.jpeg',
                      'torso' => 'b2', 'torsoImage' => 'b2.jpeg',
                      'bottom' => 'b3', 'bottomImage' => 'b3.jpeg',)
		
	);
    
    // retrieve a single robot
    public function get($which)
    {
            // iterate over the data until we find the one we want
            foreach ($this->data as $robots)
                    if ($robots['id'] == $which)
                            return $robots;
            return null;
    }

    // retrieve all of the robots
    public function all()
    {
            return $this->data;
    }
}
