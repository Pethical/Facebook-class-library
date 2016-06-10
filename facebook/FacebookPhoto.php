<?php

    /**
     * @package facebook
     * @author Peter Nemeth, sokkis@gmail.com
     * @version v1.0
     */

    /**
     * One photo in the photo album
     * @package facebook
     * @property FacebookBasicUser[] $likes
     * @property FacebookComment[] $comments
     */
    class FacebookPhoto extends FacebookBase
    {
        /**
         * The profile (user or page) that posted this photo
         * @var FacebookBasicUser $from
         */
        public $from;

        /**
         * The tagged users and their positions in this photo
         * An array of objects, the x and y coordinates are percentages from the left and top edges of the photo,
         * respectively
         * @var array $tags
         */
        public $tags;

        /**
         * The icon that Facebook displays when photos are published to the Feed
         * @var string $icon
         */
        public $icon;

        /**
         * The full-sized source of the photo
         * @var string $source
         */
        public $source;

        /**
         * The height of the photo in pixels
         * @var int $height
         */

        public $height;

        /**
         * The width of the photo in pixels
         * @var int $width
         */
        public $width;

        /**
         * A link to the photo on Facebook
         * @var string $link
         */
        public $link;

        /**
         * All of the comments on this photo
         * @return FacebookComment[]
         */
        protected function getComments()
        {
            return $this->buildall("FacebookComment",$this->api->api("/{$this->id}/comments"));
        }

        /**
         * All of the likes on this photo
         * @return FacebookBasicUser[]
         */
        protected function getLikes()
        {
            return $this->buildall("FacebookBasicUser",$this->api->api("/{$this->id}/likes"));
        }

        public function addNew($id, $file_path, $album_id="", $caption="Picture")
        {
            $this->api->facebook->setFileUploadSupport(true);
            $args = array('message' => $caption);
            $args['image'] = '@' . realpath($file_path);
            $args['method']='photos.upload';
            $data = $this->api->api("/{$album_id}/photos", 'post', $args);
        }


    }

?>