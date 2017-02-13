<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{

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
		$this->data['pagebody'] = 'homepage_view';

		$dashboard = array();

		$parts = $this->parts->all();
		$box = array('title' => 'Parts on Hand', 'value' => count($parts));
		array_push($dashboard, $box);

		$robots = $this->robots->all();
		$box = array('title' => 'Assembled Robots', 'value' => count($robots));
		array_push($dashboard, $box);

		$box = array('title' => 'Money Spent', 'value' => '$100');
		array_push($dashboard, $box);

		$box = array('title' => 'Money Earned', 'value' => '$100');
		array_push($dashboard, $box);

    $this->data['modules'] = $dashboard;

    $this->render();
	}

}
