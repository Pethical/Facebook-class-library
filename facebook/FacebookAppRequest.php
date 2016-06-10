<?php


    class FacebookAppRequest extends FacebookBase
    {

        public $message;

        public $to;

        public function delete($id)
        {
            $token_url = "https://graph.facebook.com/oauth/access_token?" .
            "client_id=" . FacebookSettings::$appId.
            "&client_secret=" . FacebookSettings::$secret.
            "&grant_type=client_credentials";

            $app_access_token = file_get_contents($token_url);
            $apprequest_url =
            "https://graph.facebook.com/{$id}".
            "&".$app_access_token.
            "&method=delete";
            $result = file_get_contents($apprequest_url);
        }

        public function send()
        {
            $token_url = "https://graph.facebook.com/oauth/access_token?" .
            "client_id=" . FacebookSettings::$appId.
            "&client_secret=" . FacebookSettings::$secret.
            "&grant_type=client_credentials";

            $app_access_token = file_get_contents($token_url);
            $apprequest_url =
            "https://graph.facebook.com/{$this->to}/apprequests?message={$this->message}".
            "&data=n&".$app_access_token.
            "&method=post";
            echo $apprequest_url;
            $result = file_get_contents($apprequest_url);
            return $result;;
        }


    }

?>