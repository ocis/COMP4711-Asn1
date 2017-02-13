<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * the assembly page, allows you to view your parts and sent them back to head office
 * also allows the assembly and viewing of robots.
 *
 * @author Braden D'Eith
 */
class Assembly extends Application
{

        function __construct()
	{
		parent::__construct();
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/
	 * 	- or -
	 * 		http://example.com/welcome/index
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->data['pagebody'] = 'assembly_view';

                //get all robots
                $sourceRobots = $this->robots->all();
                $robots = array ();
		foreach ($sourceRobots as $record)
		{
			$robots[] = array ('id' => $record['id'],
                            'top' => $record['top'], 'topImage' => $record['topImage'],
                            'torso' => $record['torso'], 'torsoImage' => $record['torsoImage'],
                            'bottom' => $record['bottom'], 'bottomImage' => $record['bottomImage']);
		}

                $this->data['robots'] = $robots;

                //getting parts, categorized by type
                $sourceParts = $this->parts->all();
                $top_parts = array ();
                $torso_parts = array ();
                $bottom_parts = array ();
		foreach ($sourceParts as $record)
		{
                    switch (substr($record['part_code'], -1)) {
                        case 1:
                            $top_parts[] = array (
                                'part_code' => $record['part_code'],
                                'image' => $record['image'],
                                'certificate' => $record['certificate'],
                                'ahref' => $record['ahref']);
                            break;
                        case 2:
                            $torso_parts[] = array (
                                'part_code' => $record['part_code'],
                                'image' => $record['image'],
                                'certificate' => $record['certificate'],
                                'ahref' => $record['ahref']);
                            break;
                        case 3:
                            $bottom_parts[] = array (
                                'part_code' => $record['part_code'],
                                'image' => $record['image'],
                                'certificate' => $record['certificate'],
                                'ahref' => $record['ahref']);
                            break;
                        default:
                            break;
                    }
		}

                $this->data['top_parts'] = $top_parts;
                $this->data['torso_parts'] = $torso_parts;
                $this->data['bottom_parts'] = $bottom_parts;


		$this->render();
	}

}
