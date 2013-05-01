<?php defined('BASEPATH') or exit('No direct script access allowed');

class Module_Mailchimp extends Module {

	public $version = '1.0';

	public function info()
	{
		return array(
			'name' => array(
				'en' => 'MailChimp'
			),
			'description' => array(
				'en' => 'MailChimp integration.'
			),
			'frontend' => FALSE,
			'backend' => TRUE,
			'menu' => 'content'
		);
	}

	public function install()
	{
        $settings = array();
        $settings []= array(
                        'slug' => 'mailchimp_apikey',
                        'title' => 'API Key',
                        'description' => '',
                        'type' => 'text',
                        'is_gui' => '1',
                        'module' => 'mailchimp',
                        'default' => '',
                        'value' => '',
                        'options' => '',
                        'is_required' => '1'
                     );
        /*$settings []= array(
                        'slug' => 'mailchimp_sts_active',
                        'title' => 'Enable STS',
                        'description' => 'If this is enabled emails will be sent using STS',
                        'type' => 'radio',
                        'is_gui' => '1',
                        'module' => 'mailchimp',
                        'default' => '0',
                        'value' => '',
                        'options' => '1=Enabled|0=Disabled',
                        'is_required' => '0'
                     );*/

	    //Adding settings to table
	    foreach( $settings as $setting ){
	        $this->db->insert($this->db->dbprefix('settings'), $setting);
	    }

		return TRUE;
	}

	public function uninstall()
	{
		//TODO Delete settings
		return TRUE;
	}

	public function upgrade($old_version)
	{
		return TRUE;
	}

	public function help()
	{
		// You could include a file and return it here.
        return "<h4>Overview</h4>
		<p>The MailChimp Integration module is a basic integration from Pyro to MailChimp using the API.</p>
		<h4>Using the module</h4>
		<p>First of all you have to enter the API key, which you can find on your MailChimp's Dashboard, on your PyroCMS Settings section.</p>
		<h4>Adding Subscribers</h4>
		<p>You can add members to any list on the backend by visiting <i>Content -> Mailchimp -> Add Subscriber</i></p>
        <p>Also, you can let your visitors add their email to any list by using the Widget, included on this module, that will show a text box to enter email and a \"Save\" button. When you create the Widget instance you will specify the list ID where that email will be added to.</p>
		<h4>Exploring Lists and Members</h4>
		<p>You can also explore your MailChimp lists and members of any list and also access detailed information on any member of an email list.</p>";
	}
}
/* End of file details.php */