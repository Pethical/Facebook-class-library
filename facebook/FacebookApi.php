<?php

    /**
     * @package facebook
     * @author Peter Nemeth, sokkis@gmail.com
     * @version v1.0
     */


/**
 * Facebook service api
 * @author Peter Nemeth
 */
class FacebookApi
{
    /**
     * Instance of the $api
     * @static FacebookApi $api
     */
    public static $api = null;

    protected $session   = null;
    public    $facebook  = null;
    public    $user      = null;

    public    $permissions = null;
    private   $_perms     = null;

    private   $cache      = array();

    /**
     * constructor
     * @param array $facebookSettings
     * array(
     *      'appId'  => 'Your application id',
     *      'secret' => 'Your app secret',
     *      'cookie' => true/false
     * );
     */
    private function __construct($facebookSettings,$permissions)
    {
        self::$api = &$this;
        if(!$permissions)
        {
            $permissions = new FacebookPermissions;
        }
        if(!$facebookSettings)
        {
            $facebookSettings = array
            (
                "appId"=>FacebookSettings::$appId,
                "secret"=>FacebookSettings::$secret,
                "cookie"=>true
            );
        }
        Facebook::$CURL_OPTS[CURLOPT_SSL_VERIFYPEER] = false;
        $this->facebook = new Facebook($facebookSettings);

        $uid = null;
        $this->user = null;
        try
        {
            $uid = $this->facebook->getUser();
            if(!$uid)
            {
                $this->user = null;
                return;
                $this->changePerms($permissions);
            }
            $this->user = new FacebookUser();
            $this->permissions = $this->user->permissions;
            $this->_perms = $this->user->permissions;
        }
        catch(Exception $e)
        {
            return;
        }
    }

   /**
    * Get the current instance of the api
    * if don't have, create it
    * @param array $facebookSettings
    * array(
    *      'appId'  => 'Your application id',
    *      'secret' => 'Your app secret',
    *      'cookie' => true/false
    * );
    * @param FacebookPermissions $permissions
    */
    public static function &getInstance($permissions = null,$facebookSettings = null)
    {
     if(!self::$api) new self($facebookSettings,$permissions);
     return self::$api;
    }

    /**
     * Invalidates the request cache
     */
    public function invalidate()
    {
        $this->cache = null;
    }

    private function needauth($newpermissions)
    {

        if(!$this->permissions) return true;
        foreach($newpermissions as $k => $v )
        {
            if((!isset($this->permissions->$k) || !$this->permissions->$k) && $newpermissions->$k)
            {
                return true;
            }
        }
        return false;
    }

    public function changePerms($permissions, $force = false, $next='')
    {

        if($this->needauth($permissions) || $force )
        {
            header("Location: ".$this->getLoginUrl($permissions,$next));
            die();
        }
        return;
    }

    /**
     * Gets the login url
     * @param FacebookPermissions $permissions
     * @param string next return url after auth, if empty, $_SERVER['REQUEST_URI'] used
     * @return string
     */
    public function getLoginUrl($permissions, $next='')
    {
     $next = $next?$next:"http://{$_SERVER['REQUEST_URI']}";
     $params = array(
        'scope'=>strval($permissions)
     );
     $this->permissions = $permissions;
     return $this->facebook->getLoginUrl($params);
    }

    /**
     * Fetches the raw data object from facebook feed
     * @param string request
     */
    public function api($request, $method='',$att='')
    {
        if($request[0]!='/') $request='/'.$request;
        if(!isset($this->cache[$request]))
            if($method)
            {
                $this->cache[$request] = $this->facebook->api($request,$method,$att);
            }
            else
            {
                $this->cache[$request] = $this->facebook->api($request);
            }
         return $this->cache[$request];
    }


    /**
     * Executes FQL Query
     * @param string query
     */
    function query($query)
    {
        return $this->facebook->api(array(
            'method'=>'fql.query',
            'query'=>$query
        ));
    }

    function __destruct()
    {

    }

}

?>
