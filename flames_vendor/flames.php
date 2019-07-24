<?php
/**
 * @Author       Balaji Selvaraj
 * @Date         2019-Jul-23
 * @Description  This class is used to create flames game. Enter your name and partner name
 *               and click submit to view the relationship compatibility with them.
 */

namespace App;

class flames {

    /**
     * @var String Your name
     * @type Public 
     */
    public $_SfirstName = '';

    /**
     * @var String Your partner name
     * @type Public 
     */
    public $_SsecondName = '';

    /**
     * @var String Relationsship name
     * @type Public 
     */
    public $_Srelationship = '';

    /**
     * @var Array Flames definitions
     * @type Private 
     */
    private $_Aflames = array(
        "F" => "Friend",
        "L" => "Lover",
        "A" => "Affection",
        "M" => "Marriage",
        "E" => "Enemy",
        "S" => "Sister"
    );

    /**
     * @var String Game name
     * @type Private 
     */
    private $_SgameName = "FLAMES";

    /**
     * @type Public
     * @param String Firstname
     * @param String Secondname
     * @description Assign the first and second name
     */
    public function __construct($_SfirstName, $_SsecondName) {
        $this->_SfirstName = $_SfirstName;
        $this->_SsecondName = $_SsecondName;
    }

    /**
     * @type protected
     * @param String Name
     * @description Remove the Space and Slashes for the string
     * @return String FormattedName
     */
    protected function _formatName($_Sname='') {
        $_Sname = strtoupper(str_replace(array(" ","/"), "", $_Sname));
        return $_Sname;
    }

    /**
     * @type protected
     * @param void
     * @description Reassign the formatted string
     * @return Boolean true
     */
    protected function _setFormattingNames() {
        $this->_SfirstName = $this->_formatName($this->_SfirstName);
        $this->_SsecondName = $this->_formatName($this->_SsecondName);
        return true;
    }
    
    /**
     * @type protected
     * @param void
     * @description Check whether the two name are same or not
     * @return String Error message 
     */
    protected function _checkNames() {
        if(empty($this->_SfirstName) AND empty($this->_SsecondName))
            $this->_Srelationship = 'Enter first name and second name';
        else if(empty($this->_SfirstName))
            $this->_Srelationship = 'Enter first name';
        else if(empty($this->_SsecondName))
            $this->_Srelationship = 'Enter second name';
        else if($this->_SfirstName == $this->_SsecondName)
            $this->_Srelationship = 'Names are same!';
        return $this->_Srelationship;
    }

    /**
     * @type protected
     * @param void
     * @description Get the relationship name from an array
     * @return String Relationship name
     */
    protected function _getRelationShip() {

        //Default relationship name
        $this->_Srelationship = 'Solo';

        //Get the relationship name
        if(isset($this->_Aflames[$this->_SgameName])) 
            $this->_Srelationship = $this->_Aflames[$this->_SgameName];

        return $this->_Srelationship;
    }

    /**
     * @type private
     * @param void
     * @description Remove the duplicates from the names
     * @return Boolean true
     */
    private function _removeDuplicates() {

        //Count the string length of both the name
        $_IfirstNameCount = strlen($this->_SfirstName);
        $_IsecondNameCount = strlen($this->_SsecondName);

        //Remove the duplicates from the name
        for($i = 0; $i < $_IfirstNameCount; $i++) {
            if(isset($this->_SfirstName[$i])) {
                for($j = 0; $j < $_IsecondNameCount; $j++) {
                    if(isset($this->_SsecondName[$j])) {
                        //Break the first char the matches
                        if($this->_SfirstName[$i] == $this->_SsecondName[$j]) {
                            $this->_SfirstName[$i] = $this->_SsecondName[$j] = "/";
                            break;
                       }
                    }
                }
            }
        }

        //Remove the slashes for eliminating the dupe characters
        $this->_setFormattingNames();
        return true;
    }

    /**
     * @type private
     * @param Integer total count of the names
     * @description Remove the duplicates from the names
     * @return String Relationship Index
     */
    private function _calculate($_Icount = 0) {
        //Remove the FLAMES character based on names unique count
        while(strlen($this->_SgameName) != 1) {
            $_Iindex = ($_Icount % strlen($this->_SgameName)) - 1;
            echo $_Iindex.$this->_SgameName[$_Iindex].'-';
            $this->_SgameName[$_Iindex] = "/";
            $_AgameName = explode("/", $this->_SgameName);
            $this->_SgameName = $_AgameName[1] . $_AgameName[0];
        }
        return $this->_SgameName;
    }

    /**
     * @type Public
     * @param Void
     * @description Main function to run the flames games
     * @return Boolean true - To print the result / false- to print error message
     */
    public function _run() {
        //Santizing the input name
        $this->_setFormattingNames();
        
        //Validate the names
        if(!empty($this->_checkNames()))
            return false;
        
        //Remove the dupes from the names
        $this->_removeDuplicates();
        
        //Count the total number character left after removing dupes
        $_Icount = strlen($this->_SfirstName) + strlen($this->_SsecondName);
        
        //Calculate the Flames and return the index of relationships 
        $this->_calculate($_Icount);

        //Return the name of relationship
        $this->_getRelationShip();

        return true;
    }


    public function __destruct() {
        $this->_SfirstName = '';
        $this->_SsecondName = '';
        $this->_Srelationship = '';
    }
}