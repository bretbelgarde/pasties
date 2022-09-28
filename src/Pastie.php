<?php
  class Pastie {
    private const KEYLENGTH = 8;

    private $timePosted;
    private $id;
    private $content;
    private $contentType;
    private $visibility;

    public function __construct($content, $contentType, DateTime $timePosted = null, $id = null, $visibility = false) {
      $this->timePosted = (is_null($timePosted)) ? new DateTime() : $timePosted;
      $this->id = (is_null($id)) ? $this->generateID() : $id;
      $this->content($content);
      $this->contentType($contentType);
      $this->visibility($visibility);
    }

    public function id() {
      return $id;
    }

    public function timePosted() {
      return $timePosted;
    }

    public function content($content = null) {
      if (is_null($content)) return $this->content;
      $this->content = $content;
    }

    public function contentType($contentType = null) {
      if (is_null($contentType)) return $this->contentType;
      $this->contentType = $contentType;
    }

    public function visibility($visibility = null) {
      if (is_null($visibility)) return $this->visibility;
      $this->visibility = $visibility;
    }

    public function toArray() {
      return [
        'id'           => $this->id(),
        'content_type' => $this->contentType(),
        'content'      => $this->content(),
        'time_posted'  => $this->timePosted(),
        'visibility'   => $this->visibility()
      ];
    }

    private function generateID() {
      $hex = md5(mktime(date('m-d-Y')) . uniqid('', true));
      $uid = base64_encode(pack('H*', $hex));
      while (strlen($uid) < self::KEYLENGTH) {

      }
    }
  }
