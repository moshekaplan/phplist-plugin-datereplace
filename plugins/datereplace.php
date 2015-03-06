<?php
/**
 * DateReplace plugin for phplist
 * 
 *
 * This plugin is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This plugin is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * @category  phplist
 * @package   DateReplace
 * @author    Moshe Kaplan
 * @license   http://www.gnu.org/licenses/gpl.html GNU General Public License, Version 3
 */
 
class datereplace extends phplistPlugin
{
  public $name = "DateReplace plugin for phpList";
  public $coderoot = "datereplace/";
  public $version = "0.2";
  public $description = 'Replaces [DATE] with the current date in email messages';
  public $settings = array(
    "datereplace_datestring" => array (
      'value' => "F j, Y",
      'description' => "Datestring to replace [DATE] with, as defined at <a href='http://php.net/manual/en/function.date.php'>http://php.net/manual/en/function.date.php</a>. <br/> The default value is 'F j, Y', which translates [DATE] into 'March 6, 2015'",
      'type' => "text",
      'allowempty' => 0,
      "max" => 1000,
      "min" => 0,
      'category'=> 'DateReplace',
    ),
  );
  
    function datereplace(){
        parent::phplistplugin();
        $this->coderoot = dirname(__FILE__).'/datereplace/';
    }
    
    function activate(){
        return true;
    }
      /* 
   * parseOutgoingTextMessage
   * @param integer messageid: ID of the message
   * @param string  content: entire text content of a message going out
   * @param string  destination: destination email
   * @param array   userdata: associative array with data about user
   * @return string parsed content
   */
  function parseOutgoingTextMessage($messageid, $content, $destination, $userdata = null) {
    $datestring = getConfig('datereplace_datestring');
    $content = str_replace("[DATE]", $datestring, $content);
    return $content;
  }

  /* 
   * parseOutgoingHTMLMessage
   * @param integer messageid: ID of the message
   * @param string  content: entire text content of a message going out
   * @param string  destination: destination email
   * @param array   userdata: associative array with data about user
   * @return string parsed content
   */
  function parseOutgoingHTMLMessage($messageid, $content, $destination, $userdata = null) {
    $datestring = getConfig('datereplace_datestring');
    $content = str_replace("[DATE]", $datestring, $content);
    return $content;
  }
}
?>
