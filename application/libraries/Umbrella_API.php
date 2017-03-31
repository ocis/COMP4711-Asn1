<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Library for interacting with the Umbrella API
*
* @author Matt Taylorc
*/
class Umbrella_API {

    /**
    * Request new API key from the server. Resets balance of the factory and
    * voids all certificates.
    *
    * @param $team Name of the team to register
    * @param $password Super secret token for the team
    * @return Array: "OK" - boolean of response status; "response" - API key
    */
    public function registerme($team, $password) {
        $response = file_get_contents($this->get_server_url() . "work/registerme/" . $team . "/" . $password);
        return $this->parse_response($response);
    }

    /**
    * Buy a box of parts from server.
    *
    * Part format: "id" - Certificate number; "model" - Model letter for part;
    *              "piece" - "Part type"; "plant" - Plant manufactured at;
    *              "stamp" - Time created;
    *
    * @return Array of purchased parts
    */
    public function buybox() {
        $response = file_get_contents($this->get_server_url() . "work/buybox" . $this->get_api_string());
        return json_decode($response);
    }

    /**
    * Gets parts built by this factory.
    *
    * @return Array of built parts
    */
    public function mybuilds() {
        $response = file_get_contents($this->get_server_url() . "work/mybuilds" . $this->get_api_string());
        return json_decode($response);
    }

    /**
    * Recycles/returns up to 3 parts to the server.
    *
    * @param $parts Array of up to 3 part certificates to be recycled
    * @return Array: "OK" - boolean of response status; "response" - amount of money credited
    */
    public function recycle($parts) {
        $request = $this->get_server_url() . "work/recycle";
        foreach($parts as $cert)
            $server_url .= "/" . $cert;

        $request .= $this->get_api_string();
        $response = file_get_contents($request);
        return $this->parse_response($response);
    }

    /**
    * Sell a robot to the server.
    *
    * @param $parts Array of the 3 part certificates that make up the robot
    * @return Array: "OK" - boolean of response status; "response" - amount of money credited
    */
    public function buymybot($parts) {
        $request = $this->get_server_url() . "work/buymybot";
        foreach($parts as $cert)
            $server_url .= "/" . $cert;

        $request .= $this->get_api_string();
        $response = file_get_contents($request);
        return $this->parse_response($response);
    }

    /**
    * Reset balance and parts for this factory without invalidating API key.
    *
    * @return Array: "OK" - boolean of response status; "response" - amount of starting balance
    */
    public function rebootme() {
        $response = file_get_contents($this->get_server_url() . "work/rebootme" . $this->get_api_string());
        return $this->parse_response($response);
    }

    /**
    * Invalidate API key and part certificates, and reset balance for this factory.
    *
    * @return Array: "OK" - boolean of response status; "response" - server response string
    */
    public function goodbye() {
        $response = file_get_contents($this->get_server_url() . "work/goodbye" . get_api_string());
        return $this->parse_response($response);
    }

    /**
    * Request balance for given team.
    *
    * @param String team to request balance for
    * @return Array: "OK" - boolean of response status; "response" - team balance
    */
    public function balance($team) {
        $response = file_get_contents($this->get_server_url() . "info/balance/" . $team);
        return $this->parse_response($response);
    }

    public function scoop($team) {
        $response = file_get_contents($this->get_server_url() . "info/scoop/" . $team);
        return $response;
    }

    public function verify($cert) {
        $response = file_get_contents($this->get_server_url() . "info/verify/" . $cert);
        return $response;
    }

    public function whomakes($part) {
        $response = file_get_contents($this->get_server_url() . "info/whomakes/" . $part);
        return $response;
    }

    public function whoami() {
        $response = file_get_contents($this->get_server_url() . "info/whoami" . $this->get_api_string());
        return $reponse;
    }

    public function job($team) {
        $response = file_get_contents($this->get_server_url() . "info/job/" . $team);
        return $reponse;
    }

    public function teams() {
        $response = file_get_contents($this->get_server_url() . "info/teams");
        return $reponse;
    }

    private function parse_response($response) {
        $output = array();
        $output['OK'] = explode(' ', $response)[0] == "Ok";
        $output['response'] = $output['OK'] ? substr($response, 3) : substr($response, 4);

        return $output;
    }

    private function get_api_string() {
        $CI =& get_instance();
        $CI->load->model('properties');

        $property = $CI->properties->get("api_key");
        return "?key=" . $property->value;
    }

    private function get_server_url() {
        $CI =& get_instance();
        $CI->load->model('properties');

        return $CI->properties->get("server_url")->value;
    }
}
