<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Widget_Mailchimp_signup extends Widgets
{
	public $title = 'MailChimp Signup';
	public $description = 'Show a textbox so visitors can enter their email and sign up on your MailChimp list.';
	public $author = 'Pablo S. Benitez';
	public $website = 'http://pablobenitez.com/';
	public $version = '1.0';

	/**
	 * $fields array fore storing widget options in the database.
	 * values submited through the widget instance form are serialized and
	 * stored in the database.
	 */
	public $fields = array(
		array(
			'field'   => 'list_id',
			'label'   => 'list_id',
			'rules'   => 'required'
		),
		array(
			'field'   => 'notes',
			'label'   => 'notes',
			'rules'   => 'required'
		)
	);

	public function run($options)
	{
		return $options;
	}
}
/* End of file mailchimp_signup.php */