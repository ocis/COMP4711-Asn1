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

        public function submit() {
            switch ($this->input->post('action')) {
                //Assemble the robot
                case "Assemble":
                    if (count($this->input->post('1')) != 1
                        || count($this->input->post('2')) != 1
                        || count($this->input->post('3')) !=1) 
                    {
                        echo "Incorrect number of parts";
                        break;
                    }
                    $parts[] = $this->parts->get($this->input->post('1')[0]);
                    $parts[] = $this->parts->get($this->input->post('2')[0]);
                    $parts[] = $this->parts->get($this->input->post('3')[0]);
                    
                    //create empty objects
                    $robot = new StdClass;
                    $transaction = new StdClass;
                    
                    //add parts to the robot
                    $robot->id = "";
                    $robot->head = $parts[0]->certificate;
                    $robot->torso = $parts[1]->certificate;
                    $robot->legs = $parts[2]->certificate;
                    
                    $this->robots->add($robot);
                    
                    //add transaction to the history
                    $transaction->id = "";
                    $transaction->type = "robot_build";
                    $transaction->part_id = 0;
                    $transaction->robot_id = $this->robots->highest();
                    $transaction->amount = 0;
                    
                    $this->history->add($transaction);
                    
                    //make parts no longer available
                    foreach($parts as $part) {
                        $part->available = 0;
                        $this->parts->update($part);
                    }
                    
                    echo "Assembled";
                    
                    break;
                    
                //return the parts to the server
                case "Return":
                    if (count($this->input->post('1')) > 0)
                        foreach($this->input->post('1') as $part)
                            $parts[] = $part;
                    if (count($this->input->post('2')) > 0)
                        foreach($this->input->post('2') as $part)
                            $parts[] = $part;
                    if (count($this->input->post('3')) > 0)
                        foreach($this->input->post('3') as $part)
                            $parts[] = $part;
                    
                    if (count($parts) > 3 || count($parts) == 0)
                        break;
                        
                    $result = $this->umbrella->recycle($parts);

                    if ($result['OK'] == 1) {
                        foreach ($parts as $part) {
                            $transaction = new StdClass;//create empty trasaction
                            //add transaction to the history
                            $transaction->id = "";
                            $transaction->type = "part_sale";
                            $transaction->part_id = $part;
                            $transaction->robot_id = "";
                            $transaction->amount = $result['response'] / count($parts);
                            
                            $this->history->add($transaction);
                            
                            $this->parts->delete($part);
                        }
                    } else {
                        break;
                    }
                    
                    echo "Returned, " . "$" . $result['response'];
                    
                    break;
                default:
                    break;
            }
            redirect($_SERVER['HTTP_REFERER']); //back where we came from
        }
        
        public function ship() {
            if ($this->input->post('ship') != "ship")
                return;
            if ($this->input->post('robot') == null)
                return;
            
            //setup parts into an array
            $robot = $this->robots->get($this->input->post('robot'));
            $parts[] = $robot->head;
            $parts[] = $robot->torso;
            $parts[] = $robot->legs;
            
            //try to sell parts
            $result = $this->umbrella->buymybot($parts);
            if ($result['OK'] != 1) {
                return;
            }
            
            //if successful, delete robot
            $this->robots->delete($robot->id);
            
            echo "Shipped, " . "$" . $result['response'];
            
            redirect($_SERVER['HTTP_REFERER']); //back where we came from
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
		foreach ($sourceRobots as $robot)
		{
                    $head = $this->parts->get($robot->head);
                    $torso = $this->parts->get($robot->torso);
                    $legs = $this->parts->get($robot->legs);
                    
                    $robots[] = array ('id' => $robot->id,
                        'head' => $robot->head,
                        'headImage' => $head->model . $head->piece . '.jpeg',
                        'torso' => $robot->torso,
                        'torsoImage' => $torso->model . $torso->piece . '.jpeg',
                        'legs' => $robot->legs,
                        'legsImage' => $legs->model . $legs->piece . '.jpeg',
                        'built' => $robot->built);
		}

                $this->data['robots'] = $robots;

                //getting parts, categorized by type
                $sourceParts = $this->parts->all();
                $top_parts = array ();
                $torso_parts = array ();
                $bottom_parts = array ();
		foreach ($sourceParts as $part)
		{
                    if ($part->available == 1) {
                        switch ($part->piece) {
                            case 1:
                                $top_parts[] = array (
                                    'piece' => $part->piece,
                                    'image' => $part->model . $part->piece . '.jpeg',
                                    'certificate' => $part->certificate);
                                break;
                            case 2:
                                $torso_parts[] = array (
                                    'piece' => $part->piece,
                                    'image' => $part->model . $part->piece . '.jpeg',
                                    'certificate' => $part->certificate);
                                break;
                            case 3:
                                $bottom_parts[] = array (
                                    'piece' => $part->piece,
                                    'image' => $part->model . $part->piece . '.jpeg',
                                    'certificate' => $part->certificate);
                                break;
                            default:
                                break;
                        }
                    }
		}

                $this->data['top_parts'] = $top_parts;
                $this->data['torso_parts'] = $torso_parts;
                $this->data['bottom_parts'] = $bottom_parts;

		$this->render();
	}
}
