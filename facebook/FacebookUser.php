<?php

     /**
      * @package facebook
      * @author Peter Nemeth, sokkis@gmail.com
      * @version 1.0
      */

     /**
      * Facebook user class
      * @package facebook
      * @author Peter Nemeth
      *
      * @todo implement classes then make properties read-write ( where possible )
      * @todo implement account class
      *
      * @property-read array $accounts The Facebook pages owned by the current user. If the manage_pages permission has been granted, this connection also yields access_tokens that can be used to query the Graph API on behalf of the page.
      * @property-read FacebookPost[] $updates The updates in this user's inbox. Requires the read_mailbox permission. @see FacebookPost
      * @property-read string $picture Returns the user profile picture.
      * @property-read FacebookBasicUser[] $friends The user's friends. Available to everyone on Facebook. @see FacebookBasicUser
      *
      * @todo implement apprequest class
      * @property-read array $apprequests The user's outstanding requests from an app. This property can only be accessed with an app access token.
      *
      * @todo implement activity class
      * @property-read array $activities The activities listed on the user's profile. Requires the user_activities or friends_activities permission.
      * @property-read FacebookAlbum[] $albums The photo albums this user has created. Requires the user_photos or friends_photos permission. @see FacebookAlbum
      * @property-read FacebookBase $books The books listed on the user's profile. Requires the user_likes or friends_likes permission.
      *
      * @todo implement checkin class
      * @property-read array $checkins The places that the current user has checked-into. Requires the user_checkins or friends_checkins permissions.
      *
      * @property-read FacebookEvent[] $events The events this user is attending. Requires the user_events or friends_events permission. @see FacebookEvent
      * @property-read FacebookPost[] $feed The user's wall. Requires the read_stream permission to see non-public posts.  @see FacebookPost
      *
      * @todo implement friendlist class
      * @property-read array $firendlists The user's friend lists. Requires read_friendlists to read & manage_friendlists to write.
      *
      * @property-read FacebookPost[] $home The user's news feed. Requires the read_stream permission. @see FacebookPost
      * @property-read FacebookPost[] $inbox The threads in this user's inbox. Requires the read_mailbox permission. @see FacebookPost
      *
      * @todo implement interests class
      * @property-read array $interests The interests listed on the user's profile. Requires the user_interests or friends_interests permission.
      *
      * @property-read FacebookBase[] $likes All the pages this user has liked. Requires the user_likes or friends_likes permission.
      * @property-read FacebookPost[] $links The user's posted links. Requires the read_stream permission. @see FacebookPost
      * @property-read FacebookBase[] $movies The movies listed on the user's profile. Requires the user_likes or friends_likes permission.
      * @property-read FacebookBase[] $music The music listed on the user's profile. Requires the user_likes or friends_likes permission.
      * @property-read FacebookPost[] $notes The user's notes. Requires the read_stream permission. @see FacebookPost
      *
      * @todo implement outbox class
      * @property-read array $outbox The messages in this user's outbox. Requires the read_mailbox permission.
      * @property-read FacebookPermission $permissions The permissions that user has granted the application. An array containing a single object which has the keys as the permission names and the values as the permission values (1/0) - Permissions with value 0 are omitted from the object by default.
      * @property-read FacebookPhoto[] $photos The user's photos and/or the photos the user is tagged. Requires the user_photo_video_tags, friends_photo_video_tags, user_photos or friends_photos permissions. @see FacebookPhoto
      * @property-read FacebookPost[] $posts The user's own posts. Requires the read_stream permission to see non-public posts.  @see FacebookPost
      * @property-read FacebookPost[] $statuses The user's status updates. Requires the read_stream permission  @see FacebookPost
      *
      * @todo implement tagged class
      * @property-read array $tagged The photos, videos, and posts in which this user has been tagged. Requires the read_stream permission
      * @property-read FacebookBase[] $videos The videos this user has been tagged in. Requires the user_videos or friends_videos permission.
      * @property-read FacebookBase[] $television  The television listed on the user's profile. Requires the user_likes or friends_likes permission.
      */

    class FacebookUser extends FacebookBasicUser
    {
        /**
         * First name
         * @var string $first_name
         */
        public $first_name;

        /**
         * Last name
         * @var string $last_name
         */
        public $last_name;

        /**
         * Gender: male, female
         * @var string $gender
         */
        public $gender;

        /**
         * Locale, ex.:en_US
         * @var string $locale
         */
        public $locale;

        /**
         * Link to the profile of the user
         * @var string $link
         */
        public $link;

        /**
         * Username, if exists
         * @var string $username
         */
        public $username;

        /**
         * Unique id for third party apps
         * @var int $third_party_id;
         */
        public $third_party_id;

        /**
         * The user's timezone offset from UTC
         * Available only for the current user
         * @var int $timezone
         */
        public $timezone;

        /**
         * The last time the user's profile was updated
         * A string containing a IETF RFC 3339 datetime
         * @var string $updated_time
         */
        public $updated_time;

        /**
         * The user's account verification status
         * @var bool $verified
         */
        public $verified;

        /**
         * The blurb that appears under the user's profile picture
         * Requires user_about_me or friends_about_me permission
         * @var string $about
         */
        public $about;

        /**
         * The user's biography
         * Requires the user_about_me permission
         * @var string $bio
         */
        public $bio;

        /**
         * The user's birthday
         * Requires user_birthday or friends_birthday permission
         * @var string $birthday
         */
        public $birthday;

        /**
         * A list of the user's education history
         * Requires user_education_history or friends_education_history permission
         * @var array $education
         */
        public $education;

        /**
         * The proxied or contact email address granted by the user
         * Requires email permission
         * @var string $email
         */
        public $email;

        /**
         * The user's hometown
         * @var FacebookBase $hometown
         */
        public $hometown;

        /**
         * The genders the user is interested in
         * Requires user_relationship_details or friends_relationship_details
         * @var string[] $interested_in
         */
        public $interested_in;

        /**
         * The user's current location
         * Requires user_location or friends_location permission
         * @var FacebookBase $location
         */
        public $location;

        /**
         * The user's political view
         * Requires user_religion_politics or friends_religion_politics permission
         * @var string $political
         */
        public $political;

        /**
         * The user's favorite quotes
         * Requires the user_about_me
         * @var string $quotes
         */
        public $quotes;

        /**
         * The user's relationship status
         * Requires user_relationships or friends_relationships permission
         * @var string $relationship_status
         */
        public $relationship_status;

        /**
         * The user's religion
         * Requires user_religion_politics or friends_religion_politics permission
         * @var string $religion
         */
        public $religion;

        /**
         * The user's significant other
         * Requires user_relationship_details or friends_relationship_details permission
         * @var FacebookBase $significant_other
         */
        public $significant_other;

        /**
         * The URL of the user's personal website
         * Requires user_website or friends_website permission
         * @var string $website
         */
        public $website;

        /**
         * A list of the user's work history
         * Requires user_work_history or friends_work_history permission
         * @var array $work
         */
        public $work;

        /**
         * Request data from facebook and creates a FacebookUser object
         * <code>
         * <?php
         *  $user = new FacebookUser();
         * ?>
         * </code>
         * @param string $id the id of the user, default is me, the logged in user
         * @return FacebookUser
         */
        public function __construct($id='me')
        {
           parent::__construct();
           $this->id = $id;
           $raw = $this->api->api($this->id);
           foreach($raw as $k => $v)
           {
            $this->{$k} = $v;
           }
        }

        /**
         * FacebookUser::getPicture()
         * @return string
         */
        protected function getPicture()
        {
            return "https://graph.facebook.com/{$this->id}/picture";
        }

        /**
         * FacebookUser::getFriends()
         * @return FacebookBasicUser[]
         */
        protected function getFriends()
        {
            $frieds = $this->api->api($this->id."/friends");
            foreach($frieds['data'] as $k => $v)
            {
                $ret[]=$this->build("FacebookBasicUser",$v);
            }
            return $ret;
        }

        /**
         * FacebookUser::getAccounts()
         * The Facebook pages owned by the current user.
         * If the manage_pages permission has been granted,
         * this connection also yields access_tokens
         * that can be used to query the Graph API on behalf of the page.
         * @return array
         */

        protected function getAccounts()
        {
            $this->need("manage_pages");
            if(!$this->permissions->manage_pages)
            {
                $this->permissions->manage_pages = true;
                $this->api->changePerms($this->permissions);
            }
            $a = $this->api->api($this->id."/accounts");
            return $this->buildall("FacebookAccount",$a);
            if(isset($a['data'])) return $a['data'];
            return $a;
        }

        /**
         * FacebookUser::getApprequests()
         * @return array
         */
        protected function getApprequests()
        {
            return $this->api->api($this->id."/apprequests");
        }

        /**
         * FacebookUser::getActivities()
         * @return array
         */
        protected function getActivities()
        {
            return $this->api->api($this->id."/activities");
        }

        /**
         * FacebookUser::getAlbums()
         * @return FacebookAlbum[]
         */
        protected function getAlbums()
        {
            $this->need("user_photos");
            $ret = array();
            $a = $this->api->api($this->id."/albums");
            foreach($a['data'] as $k => $v)
            {
                $ret[] = $this->build("FacebookAlbum",$v);
            }
            return $ret;
        }

        /**
         * FacebookUser::getBooks()
         * @return FacebookBase[]
         */
        protected function getBooks()
        {
            $ret = array();
            $this->need("user_likes");
            $books =  $this->api->api($this->id."/books");
            foreach($books['data'] as $k => $v)
            {
                $ret[] = $this->build("FacebookBase",$v);
            }
            return $ret;
        }

        /**
         * FacebookUser::getCheckins()
         * @return array
         */
        protected function getCheckins()
        {
            $this->need("user_checkins");
            return $this->api->api($this->id."/checkins");
        }

        /**
         * FacebookUser::getEvents()
         * @return FacebookEvent[]
         */
        protected function getEvents()
        {
            $ret = array();
            $this->need("user_events");
            $e = $this->api->api($this->id."/events");
            $ret = $this->buildall("FacebookEvent",$e);
            return $ret;
        }

        /**
         * FacebookUser::getFeed()
         * @return FacebookPost[]
         */
        protected function getFeed()
        {
            $this->need("read_stream");
            $ret = array();
            $a = $this->api->api($this->id."/feed");
            foreach($a['data'] as $k => $v)
            {
                $ret[] = $this->build("FacebookPost",$v);
            }
            return $ret;
        }

        /**
         * FacebookUser::getFriendlists()
         * @return array
         */
        protected function getFriendlists()
        {
            $this->need("read_friendlists");
            return $this->buildall("FacebookBase", $this->api->api($this->id."/friendlists"));
        }

        /**
         * FacebookUser::getHome()
         * @return FacebookPost[]
         */
        protected function getHome()
        {
            $this->need("read_stream");
            return $this->buildall("FacebookPost",$this->api->api($this->id."/home"));
        }

        /**
         * FacebookUser::getInbox()
         * @return array
         */
        protected function getInbox()
        {
            $this->need("read_mailbox");
            return $this->api->api($this->id."/inbox");
        }

        /**
         * FacebookUser::getInterests()
         * @return FacebookBase[]
         */
        protected function getInterests()
        {
            $this->need("user_interests");
            return $this->buildall("FacebookBase", $this->api->api($this->id."/interests"));
        }

        /**
         * FacebookUser::getLikes()
         * @return FacebookBase[]
         */
        protected function getLikes()
        {
            $this->need("user_likes");
            return $this->buildall("FacebookBase",$this->api->api($this->id."/likes"));
        }

        /**
         * FacebookUser::getLinks()
         * @return FacebookPost[]
         */
        protected function getLinks()
        {

            $this->need("read_stream");
            return $this->buildall("FacebookPost",$this->api->api($this->id."/links"));
        }

        /**
         * FacebookUser::getMovies()
         * @return FacebookBase[]
         */
        protected function getMovies()
        {
            $this->need("user_likes");
            return $this->buildall("FacebookBase", $this->api->api($this->id."/movies"));
        }

        /**
         * FacebookUser::getMusic()
         * @return FacebookBase[]
         */
        protected function getMusic()
        {
            $this->need("user_likes");
            return $this->buildall("FacebookBase",$this->api->api($this->id."/music"));
        }

        /**
         * FacebookUser::getNotes()
         * @return FacebookPost[]
         */
        protected function getNotes()
        {
            $this->need("read_stream");
            return $this->buildall("FacebookPost", $this->api->api($this->id."/notes"));
        }

        /**
         * FacebookUser::getOutbox()
         * @return array
         */
        protected function getOutbox()
        {
            $this->need("read_mailbox");
            return $this->api->api($this->id."/outbox");
        }

        /**
         * FacebookUser::getPermissions()
         * @return array
         */
        protected function getPermissions()
        {
           $raw = $this->api->api($this->id."/permissions");
           $permissions = new FacebookPermissions;
           foreach($raw['data'][0] as $k => $v)
           {
            $permissions->$k = $v;
           }
           return $permissions;

        }

        /**
         * FacebookUser::getPhotos()
         * @return FacebookPhoto[]
         */
        protected function getPhotos()
        {
            $this->need("user_photos");
            return $this->api->api($this->id."/photos");
        }

        /**
         * FacebookUser::getPosts()
         * @return FacebookPost[]
         */
        protected function getPosts()
        {
            $this->need("read_stream");
            return $this->buildall("FacebookPost", $this->api->api($this->id."/posts"));
        }

        /**
         * FacebookUser::getStatuses()
         * @return FacebookPost[]
         */
        protected function getStatuses()
        {

            $this->need("read_stream");
            return $this->buildall("FacebookPost", $this->api->api($this->id."/statuses"));
        }

        /**
         * FacebookUser::getTagged()
         * @return array
         */
        protected function getTagged()
        {
            $this->need("read_stream");
            return $this->api->api($this->id."/tagged");
        }

        /**
         * FacebookUser::getTelevision()
         * @return FacebookBase[]
         */
        protected function getTelevision()
        {
            $this->need("user_likes");
            return $this->buildall("FacebookBase", $this->api->api($this->id."/television"));
        }

        /**
         * FacebookUser::getVideos()
         * @return array
         */
        protected function getVideos()
        {
            $this->need("user_videos");
            return $this->api->api($this->id."/videos");
        }

        /**
         * FacebookUser::getUpdates()
         * @return FacebookPost[]
         */
        protected function getUpdates()
        {
            $this->need("read_stream");
            return $this->buildall("FacebookPost", $this->api->api($this->id."/updates"));
        }
        /**
         * Publish a post to user wall
         * @param FacebookPost $post
         * @return bool
         */
        public function post($post)
        {
            $post->to = $this->id;
            return $post->publish();
        }

    }

?>