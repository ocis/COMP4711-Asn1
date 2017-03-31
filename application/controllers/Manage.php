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
        $this->data['team'] = $this->properties->get('team')->value;
        $this->data['api_key'] = $this->properties->get('api_key')->value;
        $this->data['server_url'] = $this->properties->get('server_url')->value;

        $this->render();
    }

    public function register() {
        $property = $this->properties->get("api_key");
        $register = $this->input->post();

        $response = $this->umbrella->registerme($register['team'], $register['password']);
        if($response['OK']) {
            $property->value = $response['response'];
            $this->properties->update($property);
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
        $this->umbrella->rebootme();
        $this->index();
    }
}
