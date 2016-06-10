<?php
/**
 * @package facebook
 * @author Peter Nemeth, sokkis@gmail.com
 * @copyright 2011
 */

/**
 * FacebookPost
 * Class for FaceBook wall posts
 * @package facebook
 * @author Peter Nemeth
 * @copyright Peter Nemeth
 * @version 1.0
 * @access public
 */

class FacebookPost extends FacebookBase
{

    /**
     * Last error message from facebook
     * @var string $lasterror
     */
    public $lasterror;

    /**
     * Post id
     * @var string $id;
     */
    public $id;

    /**
     * Information about the user who posted the message
     * A FaceboookUser object, who posted the message
     * @var FacebookUser $from
     */
    public $from;

    /**
     * Profiles mentioned or targeted in this post
     * A list of FacebookUser
     * @var array $to
     */
    public $to = 'me';

    /**
     * The message
     * @var string $message
     */
    public $message;

    /**
     * Contains the URL of the picture, what attached to the post (if attached any)
     * @var string $picture
     */
    public $picture;

    /**
     * The URL where the main link is points
     * @var string $link
     */
    public $link;

    /**
     * The name of the link
     * @var string $name
     */
    public $name;

    /**
     * The caption of the link (appears beneath the link name)
     * @var string $caption
     */
    public $caption;

    /**
     * A description of the link (appears beneath the link caption)
     * @var string $description
     */
    public $description;

    /**
     * A URL to a Flash movie or video file to be embedded within the post
     * @var string $source
     */
    public $source;

    /**
     * A link to an icon representing the type of this post
     * @var string $icon
     */
    public $icon;

    /**
     * A object indicating which application was used to create this post
     * @var object $application
     */
    public $application;

    /**
     * A list of available actions on the post
     * (including commenting, liking, and an optional app-specified action)
     * @var array $actions
     */
    public $actions;

    /**
     * The privacy settings of the Post
     * An object containing the value field and optional friends, networks, allow and deny fields.
     *
     * The value field may specify one of the following strings: EVERYONE, CUSTOM, ALL_FRIENDS, NETWORKS_FRIENDS, FRIENDS_OF_FRIENDS.<br />
     * The friends field must be specified if value is set to CUSTOM and contain one of the following JSON strings: EVERYONE, NETWORKS_FRIENDS (when the object can be seen by networks and friends), FRIENDS_OF_FRIENDS, ALL_FRIENDS, SOME_FRIENDS, SELF, or NO_FRIENDS (when the object can be seen by a network only).<br />
     * The networks field may contain a comma-separated list of network IDs that can see the object, or 1 for all of a user's network.<br />
     * The allow field must be specified when the friends value is set to SOME_FRIENDS and must specify a comma-separated list of user IDs and friend list IDs that 'can' see the post.<br />
     * The deny field may be specified if the friends field is set to SOME_FRIENDS and must specify a comma-separated list of user IDs and friend list IDs that 'cannot' see the post.<br />
     * Note: This privacy setting only applies to posts to the current or specified user's own Wall. Facebook ignores this setting for targeted Wall posts (when the user is writing on the Wall of a friend, Page, event, group connected to the user).<br />
     * Consistent with behavior on Facebook, all targeted posts are viewable by anyone who can see the target's Wall.<br />
     * Privacy Policy: Any non-default privacy setting must be intentionally chosen by the user
     * @var string $privacy
     */
    public $privacy;

    /**
     * The time the post was initially published
     * A string containing a IETF RFC 3339 datetime
     * @var string $created_time
     */
    public $created_time;

    /**
     * The time of the last comment on this post
     * A string containing a IETF RFC 3339 datetime
     * @var string $updated_time (Read Only)
     */
    public $updated_time;

    /**
     * Location and language restrictions for Page posts only
     * An object containing comma separated lists of valid country , city , region and locale
     * @var object $targeting
     */
    public $targeting;

    /**
     * All of the comments on this post
     * An array of objects containing $id, @link FacebookPost::$from, @link FacebookPost::$message and @link FacebookPost::created_time fields
     * Available to everyone on Facebook
     * @var array $comments
     */
    public $comments;

    /**
     * The likes on this post
     * Available to everyone on Facebook
     * An array of FacebookUser @see FacebookUser
     */
    public $likes;


    /**
     * Creates a new instance of FacebookPost
     * @param string $id The optional id of the Post
     */
    function __construct($id=null)
    {
        parent::__construct();
        if($id)
        {
            $this->need("read_stream");
            $this->id = $id;
            $this->load();
        }
    }

    /**
     * Loads the post data from facebook into the class
     */

    function load()
    {
        $this->need("read_stream");
        $a = $this->api->api("/{$this->id}");
        if(is_array($a)) $this->fill($a);
        $l = $this->likes;
        if($l)
            $this->likes = $this->buildall("FacebookUser",$l);
        $c = $this->comments;
        if($c)
            $this->comments = $this->buildall("FacebookComment",$c);
    }

    /**
     * Publish this post to the facebook wall
     * @return bool
     */
    public function publish()
    {
        if(empty($this->access_token) )
        {

            $this->need("publish_stream");
        }


        $attachment = array('message' => '',
                            'name' => '',
                            'caption' => '',
                            'link' => '',
                            'description' => '',
                            'picture' => '',
                            'access_token'=>'',
                            'actions' => array()
                            );

        foreach( $attachment as $k => $v )
        {
            if(empty($this->$k))
            {
                unset($attachment[$k]);
                continue;
            }
            $attachment[$k] = $this->$k;
        }

        try
        {
            $ids = $this->api->api('/'.$this->to.'/feed/','post',$attachment);
        }
        catch(Exception $e)
        {
            $this->lasterror = $e->getmessage();
            return false;
        }
        $this->id = $ids['id'];
        return $this->id;
    }

    /**
     * Delete this post from the wall
     */
    public function delete()
    {
        $this->need("publish_stream");
        $this->api->api("/{$this->id}","delete",null);
    }


}

?>
