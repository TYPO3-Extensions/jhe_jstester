<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Jari-Hermann Ernst <jari-hermann.ernst@bad-gmbh.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * Hint: use extdeveval to insert/update function index above.
 */

require_once(PATH_tslib.'class.tslib_pibase.php');


/**
 * Plugin 'JavaScript Tester' for the 'jhe_jstester' extension.
 *
 * @author	Jari-Hermann Ernst <jari-hermann.ernst@bad-gmbh.de>
 * @package	TYPO3
 * @subpackage	tx_jhejstester
 */
class tx_jhejstester_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_jhejstester_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_jhejstester_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey        = 'jhe_jstester';	// The extension key.
	var $pi_checkCHash = true;
	
	/**
	 * The main method of the PlugIn
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content, $conf) {
		$this->conf = $conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();
                $this->local_cObj = t3lib_div::makeInstance("tslib_cObj");
                
                $css = '<link rel="stylesheet" type="text/css" href="' . t3lib_extMgm::siteRelPath($this->extKey) . 'res/css.css" />';
                $GLOBALS['TSFE']->additionalHeaderData[$this->extKey] = $css;

                $helpPage = intval($this->conf['helpUid']);

                $linkToHelpPage = $this->local_cObj->getTypoLink($this->pi_getLL('no_javascript_here'), $helpPage, array());

                $content = '<noscript>
                                <div class="no_js_warner">
                                    <h3>' . $this->pi_getLL('no_javascript') . '</h3>
                                    <p>' . $this->pi_getLL('no_javascript_desc') . '</p>';
                if($helpPage) {
                    $content .= '       <p>' . $this->pi_getLL('no_javascript_more') . ' ' . $linkToHelpPage . '.</p>';
                }
                $content .= '   </div>
                            </noscript>
                            ';

		return $this->pi_wrapInBaseClass($content);
	}
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/jhe_jstester/pi1/class.tx_jhejstester_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/jhe_jstester/pi1/class.tx_jhejstester_pi1.php']);
}

?>