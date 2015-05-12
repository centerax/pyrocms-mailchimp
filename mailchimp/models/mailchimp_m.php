<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * MailChimp module model.
 *
 * @author 		Pablo S. Benitez
 * @category 	Modules
 */
class Mailchimp_m extends MY_Model
{

    protected $_settings = null;
    protected $_apikey   = null;

    public function get_settings()
    {
        if( is_null($this->_settings) ){
            $condition = array('module'=>'mailchimp');
            $query = $this->db->get_where($this->db->dbprefix('settings'), $condition);
            $this->_settings = $query->result();
        }

        return $this->_settings;
    }

    public function get_api_key()
    {
        if( is_null($this->_apikey) ){

            $settings = $this->get_settings();
            foreach ($settings as $row){
                if($row->slug == 'mailchimp_apikey'){
                    $this->_apikey = (string)$row->value;
                }
            }

        }

        return $this->_apikey;
    }

    /**
    * Add email to MailChimp List
    */
    public function api_addemail(Mcapi $api, $email = '', $list_id = null, $vars = null)
    {
        $this->lang->load('mailchimp');
	    // Validation
	    if(!$email){
            return lang('mailchimp.emptyemail');
        }

	    if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$/i", $email)) {
		    return lang('mailchimp.badformatemail');
	    }

	    if($api->listSubscribe($list_id, $email, $vars) === TRUE) {
		    // It worked!
		    return lang('mailchimp.success.emailsent');
	    }else{
		    // An error ocurred, return error message
		    return lang('mailchimp.error.unkown'). $api->errorMessage;
	    }

    }

}