<?php

/**
 * Links to the Robots database containing information for each robot that has
 * been constructed
 *
 * @author Braden D'Eith
 */
class Robots extends MY_Model {
    public function __construct() {
        parent::__construct('robots','id');
    }
}
