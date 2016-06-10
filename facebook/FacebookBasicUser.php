<?php

    /**
     * @package facebook
     * @author Peter Nemeth, sokkis@gmail.com
     * @version v1.0
     */


/**
 * FacebookBasicUser class
 * Class for facebook user
 * @package facebook
 * @author Peter Nemeth
 * @version 1.0
 * @property string $picture
 */
class FacebookBasicUser extends FacebookBase
{
    /**
     * Facebook User id
     * @var integer $id 64bit integer
     */
    public $id;

    /**
     * Full name
     * @var string $name
     */
    public $name;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Gets the picture property of the class
     * @access protected
     * @todo implement
     */
    protected function getPicture()
    {

    }
}

?>
