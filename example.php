<html>
<head>
    <title>Only example...</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<pre>
<?php
//////////////////////////////////////////////////////////////
    function autoload($class)
    {
        if(file_exists("facebook/{$class}.php"))
        {
            @include_once("facebook/{$class}.php");
        }
    }

    spl_autoload_register("autoload");
//////////////////////////////////////////////////////////////

    // Create permissions...
    $perms = new FacebookPermissions;
    $perms->user_birthday = true;

    // Get facebook api instance
    $api = FacebookApi::getInstance($perms);

    // If need additional perms, change them anytime
    // $perms->user_about_me = true;
    // $api->changePerms($perms);

    print_r($api->user); // The current user

    // upload a photo
    $p = new FacebookPhoto();
    $p->addNew($api->facebook->getAccessToken() ,"example.jpg","","A Wonder Tree!");


/*
//  Uncomment to create post on your wall

    $f = new FacebookPost;
    $f->message  = "Teszt Elek";
    $f->caption = "Teszt";
    $f->description = "Teszt elek";
    $f->name = 'test';
    $f->link = "http://google.com";
    $f->actions[] = array("name"=> "View on Google", "link"=> "http://www.google.com");
    echo $f->publish();
    echo $f->lasterror;
    echo $f->id;    // The id of the new post
*/

/*

//    Uncomment to create test event...
    $event = new FacebookEvent; // create empty event
    $event->name="Test";        // Name
    $event->start_time = date("Y-m-20"); // Start
    $event->end_time = date("Y-m-25");  // End
    $event->description = "Description of the event";   //Descr
    $event->publish();      // Publish event
*/

?>
</pre>
</body>
</html>