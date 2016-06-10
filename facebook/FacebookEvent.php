<?php

/**
 * @package facebook
 * @author Peter Nemeth, sokkis@gmail.com
 * @copyright 2011
 * @version 1.0
 */

/**
 * @author Peter Nemeth
 * @package facebook
 * @property-read FacebookUser[] $noreply All of the users who have been not yet responded to their invitation to this event
 * @property-read FacebookUser[] $maybe All of the users who have been responded "Maybe" to their invitation to this event
 * @property-read FacebookUser[] $invited All of the users who have been invited to this event
 * @property-read FacebookUser[] $attending All of the users who are attending this event
 * @property-read FacebookUser[] $declined  All of the users who declined their invitation to this event
 * @property string $picture  The event's profile picture Returns a HTTP 302 with the URL of the event's picture (use ?type=small | normal | large to request a different photo)
 */
class FacebookEvent extends FacebookBase
{
    /**
     * All of the users who have been not yet responded to their invitation to this event
     * The profile that created the event
     * @var FaceBookUser $owner
     */
    public $owner;
    
    /**
     * The event title
     * @var string $name
     */ 
    public $name;
    
    /**
     * The event description
     * @var string $description
     */ 
    public $description;
    
    /**
     * A string containing an ISO-8601 formatted date/time or a UNIX timestamp;
     * if it contains a time zone (not recommended), it will be converted to Pacific time
     * before being stored and displayed
     * @var string $start_time
     */ 
    public $start_time;
    
    /**
     * A string containing an ISO-8601 formatted date/time or a UNIX timestamp;
     * if it contains a time zone (not recommended), it will be converted to Pacific time
     * before being stored and displayed
     * @var string $end_time
     */ 
    public $end_time;
	
    /**
     * The location for this event
     * @var string $location
     */ 
    public $location;
    
    /**
     * venue
     */ 
    public $venue;
    
    /**
     * The visibility of this event
     * String containing 'OPEN', 'CLOSED', or 'SECRET'
     * @var string privacy
     */ 
    public $privacy;
    
    /**
     * The last time the event was updated
     * String containing a IETF RFC 3339 datetime
     * @var string $updated_time
     */ 
    public $updated_time;
    
    public function __construct($id = null)
    {
        parent::__construct();
        if($id)
        {
            $this->fill( $this->api->api("/{$id}") );
            $this->id = $id;
        }
    }
    
    /**
     * This event's wall
     * @return FacebookPost[]
     */ 
    public function getFeed()
    {
        return $this->buildall("FacebookPost", $this->api->api("/{$this->id}/feed"));
    }
    
    /**
     * All of the users who have been not yet responded to their invitation to this event
     * @return FacebookBasicUser[]    
     */ 
    public function getNoreply()
    {
        return $this->buildall("FacebookBasicUser", $this->api->api("/{$this->id}/noreply"));
    }
    
    /**
     * All of the users who have been responded "Maybe" to their invitation to this event
     * @return FacebookBasicUser[]
     */ 
    public function getMaybe()
    {
        return $this->buildall("FacebookBasicUser", $this->api->api("/{$this->id}/maybe"));        
    }
    
    /**
     * All of the users who have been invited to this event
     * @return FacebookBasicUser[]
     */ 
    public function getInvited()
    {
        return $this->buildall("FacebookBasicUser", $this->api->api("/{$this->id}/invited"));                
    }
    
    /**
     * All of the users who are attending this event
     * @return FacebookBasicUser[]
     */ 
    public function getAttending()
    {
        return $this->buildall("FacebookBasicUser", $this->api->api("/{$this->id}/attending"));                        
    }
    
    /**
     * All of the users who declined their invitation to this event
     * @return FacebookBasicUser[]
     */ 
    public function getDeclined()
    {
        return $this->buildall("FacebookBasicUser", $this->api->api("/{$this->id}/declined"));
    }
    
    /**
     * The event's profile picture
     * @return string
     */ 
    public function getPicture()
    {
        return $this->api->api("/{$this->id}/picture");                        
    }
    
    public function save()
    {
        return $this->publish();
    }
    
    public function publish()
    {
        $this->need("create_event");
        $event['name'] = $this->name;
        $event['description'] = $this->description;
        $event['start_time'] = $this->start_time;
        $event['end_time'] = $this->end_time;
        $e="events";
        if($this->id) $e = $this->id;
        $a = $this->api->api("/{$e}","post",$event);
        $this->id = $a['id'];
        return $this->id;      
    }
    
}




?>