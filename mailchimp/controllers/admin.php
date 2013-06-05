<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * MailChimp integration.
 *
 * @author 		Pablo S. Benitez
 * @category 	Modules
 */
class Admin extends Admin_Controller {

    /**
     * Api key holder
     * @var string
     * @access protected
     */
    protected $_apikey = '';

    protected $section = 'mailchimp';

    /**
     * Constructor method
     *
     * @access public
     * @return void
     */
    public function __construct() {
        parent::__construct();

        // Load all the required classes
        $this->lang->load('mailchimp');
        $this->load->model('mailchimp_m');

        $this->_apikey = $this->mailchimp_m->get_api_key();

        //Load MailChimp API lib
        if ($this->_apikey) {
            $this->load->library('mcapi', $this->_apikey);
        }

        $this->template->set_partial('shortcuts', 'admin/partials/shortcuts');
    }

    /**
     * List all existing mailing lists
     *
     * @access public
     * @return void
     */
    public function index() {
        $data['title'] = $this->module_details['name'];

        if ('' == $this->_apikey) {
            $this->session->set_flashdata('error', lang('mailchimp.no_api_key_error'));
            redirect('admin/settings#mailchimp');
            exit;
        }

        $data ['mclists'] = $this->mcapi->lists(array(), 0, 100);

        // Load the view
        $this->template->set($data);
        $this->template->build('admin/index');
    }

    /**
     * List subscribers on specified list.
     * @param string $list_id ID of MC list
     */
    public function subscribers($list_id = '') {
        $data ['title']         = $this->module_details['name'];
        $data ['listid']        = $list_id;
        $data ['mcsubscribers'] = $this->mcapi->listMembers($list_id);
        $data ['mclist_name']   = $this->_get_list_name_by_id($list_id);

        // Load the view
        $this->template->set($data);
        $this->template->build('admin/subscribers');
    }

    /**
     * Show member detailed information.
     */
    public function subscriber_detail($list_id, $email) {
        $data ['title']       = $this->module_details['name'];
        $data ['mcmember']    = $this->mcapi->listMemberInfo($list_id, str_replace('~at~', '@', urldecode($email)));
        $data ['mclist_name'] = $this->_get_list_name_by_id($list_id);
        $data ['mclistid']    = $list_id;

        // Load the view
        $this->template->set($data);
        //$this->template->append_metadata(css('mc_admin.css', 'mailchimp'));
        $this->template->build('admin/member_info');
    }

    /**
     * Add a new member to list
     */
    public function new_subscriber() {

        //Process member info
        if ( !is_null($this->input->post()) ) {

            $vars  = null;
            $fname = $this->input->post('fname');
            $lname = $this->input->post('lname');

            if ($fname OR $lname) {
                $vars = array();
                if ($fname) {
                    $vars['FNAME'] = $fname;
                }
                if ($lname) {
                    $vars['LNAME'] = $lname;
                }
            }

            $st = $this->mailchimp_m->api_addemail($this->mcapi, $this->input->post('email'), $this->input->post('list_id'), $vars);
            if (preg_match('/^Error/', $st)) {
                $data['messages']['error'] = $st;
            }
            else {
                $data['messages']['success'] = $st;
            }
        }

        $this->load->helper('mailchimp');

        $data ['title']   = $this->module_details['name'];
        $data ['mclists'] = $this->mcapi->lists(array(), 0, 100);

        // Load the view
        $this->template->set($data);
        $this->template->build('admin/form');
    }

    protected function _get_list_name_by_id($list_id) {
        $name = lang('mailchimp.unknown_list_label');

        $list_data = $this->mcapi->lists(array('list_id' => $list_id));
        if ($list_data['total'] == 1) {
            $name = $list_data['data'][0]['name'];
        }

        return $name;
    }

}