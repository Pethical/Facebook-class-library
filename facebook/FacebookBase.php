<?php

    /**
     * @package facebook
     * @author Peter Nemeth, sokkis@gmail.com
     * @version v1.0
     */

/**
 * Base class for facebook classes and objects.
 * @package facebook
 * @author Peter Nemeth
 */
class FacebookBase implements arrayaccess
{
    /**
     * The id of the object
     * @var int $id
     */
    public $id;

    /**
     * The name of the object
     * @var string $name
     */
    public $name;

    /**
     * Category, if exists
     * @var string $category
     */
    public $category;

    /**
     * Created time, if exists
     * @var string $created_time;
     */
    public $created_time;

    /**
     * Updated time, if exists
     * @var string $updated_time;
     */
    public $updated_time;

    public $access_token;

    public $api = null;

    public function __construct()
    {
        $this->api = FacebookApi::getInstance();
    }

    public function need($permission)
    {
        return $this->api->permissions->need($permission);
    }

    public function __set($name,$value)
    {
    }

    public function __get($name)
    {
     $name = "get".ucfirst($name);
     if(method_exists($this,$name))
     {
        return $this->$name();
     }
     throw new Exception("Property {$name} does not exists!");
    }

    protected function fill($json)
    {
        if(isset($json['data']))
        {
            $json = $json['data'];
        }
        foreach($json as $k => $v ) $this->{$k} = $v;
    }

    protected function build($class,$params)
    {
        $c = new $class;

        foreach($params as $k=>$v)
        {
            $c->$k = $v;
        }
        return $c;
    }

    function buildall($class,$json)
    {
        $ret = array();
        if(!isset($json['data']) ) throw new Exception("Hé");
        foreach($json['data'] as $k => $v)
        {
            $ret[]=$this->build($class,$v);
        }
        return $ret;
    }


    public function offsetExists($offset)
    {
     return property_exists($this,$offset);
    }

    public function offsetUnset($offset)
    {

    }

    function offsetSet($o,$v)
    {

    }

    public function offsetGet($offset)
    {
        return $this->{$offset};
    }



}

?>
