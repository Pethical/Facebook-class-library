<?php

    /**
     * @package faacebook
     * @author Peter Nemeth, sokkis@gmail.com
     * Facebook permissions class
     */

    class FacebookPermissions
    {
        // read only perms
        /**
         * Provides access to the "About Me" section of the profile in the about property
         */
        public $user_about_me              = false;
        /**
         * Provides access to the user's list of activities as the activities connection
         */
        public $user_activities            = false;
        /**
         * Provides access to the birthday with year as the birthday_date property
         */
        public $user_birthday              = false;
        /**
         * Provides read access to the authorized user's check-ins or a friend's check-ins that the user can see.
         */
        public $user_checkins              = false;
        /**
         * Provides access to education history as the education property
         */
        public $user_education_history     = false;
        /**
         * Provides access to the list of events the user is attending as the events connection
         */
        public $user_events                = false;
        /**
         * Provides access to the list of groups the user is a member of as the groups connection
         */
        public $user_groups                = false;
        /**
         * Provides access to the user's hometown in the hometown property
         */
        public $user_hometown              = false;
        /**
         * Provides access to the user's list of interests as the interests connection
         */
        public $user_interests             = false;
        /**
         * Provides access to the list of all of the pages the user has liked as the likes connection
         */
        public $user_likes                 = false;
        /**
         * Provides access to the user's current location as the location property
         */
        public $user_location              = false;
        /**
         * Provides access to the user's notes as the notes connection
         */
        public $user_notes                 = false;
        /**
         * Provides access to the user's online/offline presence
         */
        public $user_online_presence       = false;
        /**
         * Provides access to the photos the user has been tagged in as the photos connection
         */
        public $user_photo_video_tags      = false;
        /**
         * Provides access to the photos the user has uploaded
         */
        public $user_photos                = false;
        /**
         * Provides access to the user's family and personal relationships and relationship status
         */
        public $user_relationships         = false;
        /**
         * Provides access to the user's relationship preferences
         */
        public $user_relationship_details  = false;
        /**
         * Provides access to the user's religious and political affiliations
         */
        public $user_religion_politics     = false;
        /**
         * Provides access to the user's most recent status message
         */
        public $user_status                = false;
        /**
         * Provides access to the videos the user has uploaded
         */
        public $user_videos                = false;
        /**
         * Provides access to the user's web site URL
         */
        public $user_website               = false;
        /**
         * Provides access to work history as the work property
         */
        public $user_work_history          = false;
        /**
         * Provides access to the user's primary email address in the email property. Do not spam users. Your use of email must comply both with Facebook policies and with the CAN-SPAM Act.
         */
        public $email                      = false;
        /**
         * Provides access to any friend lists the user created. All user's friends are provided as part of basic data, this extended permission grants access to the lists of friends a user has created, and should only be requested if your application utilizes lists of friends.
         */
        public $read_friendlists           = false;
        /**
         * Provides read access to the Insights data for pages, applications, and domains the user owns.
         */
        public $read_insights              = false;
        /**
         * Provides the ability to read from a user's Facebook Inbox.
         */
        public $read_mailbox               = false;
        /**
         * Provides read access to the user's friend requests
         */
        public $read_requests              = false;
        /**
         * Provides access to all the posts in the user's News Feed and enables your application to perform searches against the user's News Feed
         */
        public $read_stream                = false;
        /**
         * Provides applications that integrate with Facebook Chat the ability to log in users.
         */
        public $xmpp_login                 = false;
        /**
         * Provides the ability to manage ads and call the Facebook Ads API on behalf of a user.
         */
        public $ads_management             = false;

        // Friends
        /**
         * Provides access to the "About Me" section of the profile in the about property
         */
        public $friends_about_me = false;
        /**
         * Provides access to the user's list of activities as the activities connection
         */
        public $friends_activities = false;
        /**
         * Provides access to the birthday with year as the birthday_date property
         */
        public $friends_birthday = false;
        /**
         * Provides read access to the authorized user's check-ins or a friend's check-ins that the user can see.
         */
        public $friends_checkins = false;
        /**
         * Provides access to education history as the education property
         */
        public $friends_education_history = false;
        /**
         * Provides access to the list of events the user is attending as the events connection
         */
        public $friends_events = false;
        /**
         * Provides access to the list of groups the user is a member of as the groups connection
         */
        public $friends_groups = false;
        /**
         * Provides access to the user's hometown in the hometown property
         */
        public $friends_hometown = false;
        /**
         * Provides access to the user's list of interests as the interests connection
         */
        public $friends_interests = false;
        /**
         * Provides access to the list of all of the pages the user has liked as the likes connection
         */
        public $friends_likes = false;
        /**
         * Provides access to the user's current location as the location property
         */
        public $friends_location = false;
        /**
         * Provides access to the user's notes as the notes connection
         */
        public $friends_notes = false;
        /**
         * Provides access to the user's online/offline presence
         */
        public $friends_online_presence = false;
        /**
         * Provides access to the photos the user has been tagged in as the photos connection
         */
        public $friends_photo_video_tags = false;
        /**
         * Provides access to the photos the user has uploaded
         */
        public $friends_photos = false;
        /**
         * Provides access to the user's family and personal relationships and relationship status
         */
        public $friends_relationships = false;
        /**
         * Provides access to the user's relationship preferences
         */
        public $friends_relationship_details = false;
        /**
         * Provides access to the user's religious and political affiliations
         */
        public $friends_religion_politics = false;
        /**
         * Provides access to the user's most recent status message
         */
        public $friends_status = false;
        /**
         * Provides access to the videos the user has uploaded
         */
        public $friends_videos = false;
        /**
         * Provides access to the user's web site URL
         */
        public $friends_website = false;
        /**
         * Provides access to work history as the work property
         */
        public $friends_work_history = false;

        // Write perms
        /**
         * Enables your app to post content, comments, and likes to a user's stream and to the streams of the user's friends. With this permission, you can publish content to a user's feed at any time, without requiring offline_access. However, please note that Facebook recommends a user-initiated sharing model.
         */
        public $publish_stream = false;
        /**
         * Enables your application to create and modify events on the user's behalf
         */
        public $create_event = false;
        /**
         * Enables your application to RSVP to events on the user's behalf
         */
        public $rsvp_event = false;
        /**
         * Enables your application to send messages to the user and respond to messages from the user via text message
         */
        public $sms = false;
        /**
         * Enables your app to perform authorized requests on behalf of the user at any time.
         * By default, most access tokens expire after a short time period to ensure applications only make requests on behalf of the user when the are actively
         * using the application. This permission makes the access token returned by our OAuth endpoint long-lived.
         */
        public $offline_access = false;
        /**
         * Enables your app to perform checkins on behalf of the user.
         */
        public $publish_checkins = false;
        /**
         * Enables your app to create and edit the user's friend lists.
         */
        public $manage_friendlists = false;
        /**
         * Enables your application to retrieve access_tokens for pages the user administrates. The access tokens can be queried using the "accounts" connection in the Graph API. This permission is only compatible with the Graph API.
         */
        public $manage_pages = false;


        /**
         * Require permission
         * @param string $perm;
         */
        public function need($perm)
        {
            //echo $perm.": ".$this->{$perm};
            if($this->{$perm})
            {
                return;
            }
            $p = clone $this;
            $p->{$perm} = true;
            FacebookApi::getInstance()->changePerms($p,false);
        }

        public function __toString()
        {
            $ret = array();
            foreach($this as $k=>$v)
            {
                if($k!='installed')
                    if($v)
                    {
                        $ret[]=$k;
                    }
            }
            return implode(',',$ret);
        }
    }

?>