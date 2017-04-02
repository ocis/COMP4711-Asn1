<?php

/**
* Manage controller
* Provides boss role access to administrative functions
*
* @author Matt Taylor
*/
class Manage extends Application {
    public function index() {
        $this->data['pagebody'] = 'manage_view';

        if(!array_key_exists('rreg', $this->data)) $this->data['rreg'] = "";
        if(!array_key_exists('redit', $this->data)) $this->data['redit'] = "";
        if(!array_key_exists('rreboot', $this->data)) $this->data['rreboot'] = "";

        $this->data['team'] = $this->properties->get('team')->value;
        $this->data['api_key'] = $this->properties->get('api_key')->value;
        $this->data['server_url'] = $this->properties->get('server_url')->value;

        $sell = "";
        $robots = $this->robots->all();
        if(count($robots) != 0) {
            foreach($robots as $robot) {
                $sell .= "<tr>";
                $sell .= "<td>".$robot->id."</td>";
                $sell .= "<td>".$robot->head."</td>";
                $sell .= "<td>".$robot->torso."</td>";
                $sell .= "<td>".$robot->legs."</td>";
                $sell .= "<td>".$robot->built."</td>";
                $sell .= "<td><a href=\"manage/sell/".$robot->id."\"<button type=\"button\" class=\"btn btn-success\">Sell</button></td>";
                $sell .= "</tr>";
            }
        } else {
            $sell = "<tr><td colspan=\"6\">No robots built</td></tr>";
        }

        $this->data['robots'] = $sell;
        $this->render();
    }

    public function register() {
        $property = $this->properties->get("api_key");
        $register = $this->input->post();

        $response = $this->umbrella->registerme($register['team'], $register['password']);
        if($response['OK']) {
            $property->value = $response['response'];
            $this->properties->update($property);
            $this->data['rreg'] = "<div class=\"has-success\">
                                        <div class=\"help-block\">
                                            Successfully registered with a $".$response["response"]." balance.
                                        </div>
                                   </div>";
        } else {
            $this->data['rreg'] = "<div class=\"has-error\">
                                        <div class=\"help-block\">
                                            Error".$response["response"]."
                                        </div>
                                   </div>";
        }

        $this->index();
    }

    public function editproperties() {
        $property = $this->input->post();
        $update = new stdClass;
        foreach($property as $key => $value) {
            $update->property_name = $key;
            $update->value = $value;
            $this->properties->update($update);
        }

        $this->index();
    }

    public function reboot() {
        $response = $this->umbrella->rebootme();
        if($response['OK']) {
            $this->data['rreboot'] = "<div class=\"has-success\">
                                        <div class=\"help-block\">Successfully rebooted</div>
                                      </div>";
        } else {
            $this->data['rreboot'] = "<div class=\"has-error\">
                                        <div class=\"help-block\">Error".$response['response']."</div>
                                      </div>";
        }
        $this->index();
    }

    public function sell($id) {
        $robot = $this->robots->get($id);
        $parts = array(
            $robot->head,
            $robot->torso,
            $robot->legs
        );
        $response = $this->umbrella->buymybot($parts);
        if($response['OK']) {
            $transaction = array(
                "type" => "robot_sale",
                "part_id" => "",
                "robot_id" => $id,
                "amount" => trim($response['response'])
            );

            $this->transactions->add($transaction);
            $this->parts->delete($robot->head);
            $this->parts->delete($robot->torso);
            $this->parts->delete($robot->legs);
            $this->robots->delete($id);

            $this->data['response'] = "<p class=\"bg-success\">Successfully sold for $".$response['response']."</p>";
        } else {
            $this->data['response'] = "<p class=\"bg-danger\">Error".$response['response']."</p>";
        }

        $this->data['pagebody'] = 'sold_view';
        $this->render();
    }
}
