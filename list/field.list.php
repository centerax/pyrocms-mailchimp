<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * List Field Type
 *
 * @package		Addons\Field Types
 * @author		James Doyle (james2doyle)
 * @license		MIT License
 * @link		http://github.com/james2doyle/pyro-list-field
 */
class Field_list
{
	public $field_type_slug    = 'list';
	public $db_col_type        = 'text';
	public $version            = '1.1.0';
	public $author             = array('name'=>'James Doyle', 'url'=>'http://github.com/james2doyle/pyro-list-field');

	// --------------------------------------------------------------------------

	public function __construct()
	{
		$this->CI =& get_instance();
	}

	// --------------------------------------------------------------------------

	/**
	 * Output form input
	 *
	 * @param	array
	 * @param	array
	 * @return	string
	 */
	public function form_output($data)
	{
		$output = unserialize($data['value']);
		if (is_null($data['value']) || strlen($output[0]) == 0) {
			return '<ul class="list_field" id="'.$data['form_slug'].'"><li><textarea name="'.$data['form_slug'].'[0]" class="item_input" placeholder="List item content..."></textarea><div class="btn gray add">+</div><div class="btn gray remove">-</div></li></ul>';
		} else {
			$str = '<ul class="list_field" id="'.$data['form_slug'].'">';
			foreach ($output as $key => $value) {
				if (!empty($value)) {
					$str .= '<li><textarea name="'.$data['form_slug'].'['.$key.']" class="item_input" placeholder="List item content...">'.$value.'</textarea><div class="btn gray add">+</div><div class="btn gray remove">-</div></li>';
				}
			}
			return $str.'</ul>';
		}
	}

	public function event($field)
	{
		$this->CI->type->add_js('list', 'list.js');
		$this->CI->type->add_css('list', 'list.css');
	}

	public function pre_save($input)
	{
		return serialize($input);
	}

	public function pre_output($input, $data)
	{
		$input = unserialize($input);
		$output = array();
		foreach ($input as $key => $value) {
			$output[] = array(
				'key' => $key,
				'value' => $value,
				);
		}
		return $output;
	}
}
