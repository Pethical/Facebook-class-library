<?php

    /**
     * @package facebook
     * @author Peter Nemeth, sokkis@gmail.com
     * @version v1.0
     */

    /**
     * User's photo album
     * @package facebook
     * @property FacebookPhoto[] $photos
     * @see FacebookPhoto
     * @property FacebookComment[] $comments
     * @see FacebookComment
     * @property FacebookBasicUser[] $likes
     * @see FacebookBasicUser
     * @property string $picture
     * @todo add contructor and load logic
     */
    class FacebookAlbum extends FacebookBase
    {
        /**
         * The profile that created this album
         * @var FacebookBaseUser $from
         */ 
        public $from;
        
        /**
         * The description of the album
         * @var string $description
         */         
        public $description;
        
        /**
         * The location of the album
         * @var string $location
         */ 
        public $location;	
        
        /**
         * A link to this album on Facebook
         * @var string $link
         */ 
        public $link;
        
        /**
         * The album cover photo ID
         * @var string $cover_photo
         */ 
        public $cover_photo;
        
        /**
         * The privacy settings for the album
         * @var string $privacy
         */ 
        public $privacy;
        
        /**
         * The number of photos in this album
         * @var string $count
         */ 
        public $count;

        /**
         * The type of the album: profile, mobile, wall, normal or album
         * @var string $type
         */ 
        public $type;
        
        public function __construct($id=null)
        {
            parent::__construct();
            if($id)
            {
                $this->id = $id;
                $this->fill( $this->api->api("/{$id}") );
            }
        }
        
        /**
         * The photos contained in this album
         * @todo implement
         * @return FacebookPhoto[]
         */
        public function getPhotos()
        {
            return $this->buildall("FacebookPhoto",$this->api->api("/{$this->id}/photos"));                        
        }
        
        /**
         * All of the comments on this album
         * @todo implement
         * @return FacebookComment[]
         */ 
        public function getComments()
        {
            return $this->buildall("FacebookComment",$this->api->api("/{$this->id}/comments"));            
        }
        
        /**
         * All of the likes on this photo
         * @todo implement
         * @return FacebookBasicUser[]
         */ 
        public function getLikes()
        {
            return $this->buildall("FacebookBasicUser",$this->api->api("/{$this->id}/likes"));
        }
        
        /**
         * The album's cover photo
         * @return FacebookPhoto
         * @todo implement
         */ 
        public function getPicture()
        {            
            return $this->buildall("FacebookPhoto",$this->api->api("/{$this->id}/picture"));                        
        }        
    }   

?>