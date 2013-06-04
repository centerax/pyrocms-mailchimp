<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * Frontend controller, used on the widget.
 *
 * @author 		Pablo S. Benitez
 * @category 	Modules
 */
class Mailchimp extends Public_Controller {

    /**
     * Constructor method
     *
     * @author PyroCMS Dev Team
     * @access public
     * @return void
     */
    public function __construct() {
        parent::__construct();

        // Load the required classes
        $this->lang->load('mailchimp');
        $this->load->model('mailchimp_m');
    }

    public function signup() {
        $this->load->library('mcapi', $this->mailchimp_m->get_api_key());
        echo $this->mailchimp_m->api_addemail($this->mcapi, $this->input->post('email'), $this->input->post('list'));
    }

}

