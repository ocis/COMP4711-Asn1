<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2016, James L. Parry
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller
{

	/**
	 * Constructor.
	 * Establish view parameters & load common helpers
	 */

	function __construct()
	{
		parent::__construct();

		//  Set basic view parameters
		$this->data = array ();
		$this->data['pagetitle'] = 'Panda Research Centre - Robot Factory';
		$this->data['ci_version'] = (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>'.CI_VERSION.'</strong>' : '';
	}

	/**
	 * Render this page
	 */
	function render($template = 'robots-template')
	{
                $role = $this->session->userdata('userrole');
                $parts = "hidden";
                $assembly = "hidden";
                $history = "hidden";
                $manage = "hidden";
                
                switch ($role) {
                    case "boss":
                        $history = "";
                        $manage = "";
                    case "supervisor":
                        $assembly = "";
                    case "worker":
                        $parts = "";
                    case "guest":
                        break;
                    default:
                        break;
                }
                $this->data['parts_role'] = $parts;
                $this->data['assembly_role'] = $assembly;
                $this->data['manage_role'] = $manage;
                $this->data['history_role'] = $history;

		$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
		$this->parser->parse('robots-template', $this->data);
	}

}
