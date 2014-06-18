<?php
/**
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

/**
 * Joomla! Webmaster Plugin
 *
 * @package		Joomla.Plugin
 * @subpackage	System.Jwebmaster
 */
// Parameters
//$beforeclosebody = $this->params->get('beforebody_custom_code', '');

class plgSystemJwebmaster extends JPlugin
{	
	// Constructor
    function plgSystemMetagenerator($subject, $config )
    {
		parent::__construct( $subject, $config );
    }



	function onAfterRender() {

		$app 	= JFactory::getApplication();
		if ($app->getName() != 'site') {
			return;
		}
			$format = JRequest::getWord('format');
		if ($format=='feed') {
			return;
		}
		$beforeclosebody = $this->params->get('beforebody_custom_code', 'suka');
		$buffer = JResponse::getBody();
		$buffer = str_replace ("</body>", $beforeclosebody. "</body>", $buffer);
		JResponse::setBody($buffer);

	}



}