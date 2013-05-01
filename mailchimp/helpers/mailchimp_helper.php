<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MailChimp helper
 *
 * @package		MailChimp Module
 * @category	Helper
 * @author		Pablo S. Benitez
 */

/**
* Return a dropdown HTML element for the provided lists.
* @param array $lists Lists to be displayed.
* @param string $element_name Name for the HTML element
* @return string Dropdown HTML code
*/
function lists_dropdown($lists = array(), $element_name = 'list_id'){

    $html = '';
    $mclists = array();

    if( empty($lists) ){
        return $html;
    }

    if( $lists['total'] > 0 ){

        foreach($lists['data'] as $list){
            $mclists [ $list['id'] ]= $list['name'];
        }

        $html = form_dropdown($element_name, $mclists);
    }

    return $html;
}