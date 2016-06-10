<?php

    /**
     * FacebookComment
     * Class for comment on post
     * @package facebook
     * @author Peter Nemeth, sokkis@gmail.com
     * @copyright Peter Nemeth
     * @version 1.0
     */

     /**
      * Class for facebook comments
      * @package facebook
      */
    class FacebookComment extends FacebookBase
    {
        /**
         * Comment id
         * @var integer $id
         */
        public $id;

        /**
         * Information about the user who posted the comment
         * A FaceboookUser object, who posted the comment
         * @var FacebookUser $from @see FacebookUser
         */
        public $from;

        /**
         * The comment
         * @var string $message
         */
        public $message;

        /**
         * The time the comment was initially published
         * A string containing a IETF RFC 3339 datetime
         * @var string $created_time
         */
        public $created_time;

        /**
         * The number of times this comment was liked
         * @var int $likes
         */
        public $likes;

        /**
         * Constructor
         * @param string $id if not empty the comment will load
         */
        public function __construct($id=null)
        {
            parent::__construct();
            if($id)
            {
                $this->id = $id;
                $this->fill( $this->api->api("/{$this->id}") );
            }
        }


    }

?>