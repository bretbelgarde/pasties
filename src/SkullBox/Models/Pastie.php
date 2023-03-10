<?php
  namespace SkullBox\Models;

  use DateTime;

  class Pastie {
     public function __construct(
        private string $title,
        private string $content,
        private string $contentType,
        private ?string $id = null,
        private ?DateTime $timePosted = null,
        private bool $visible = true
    ) {
      $this->timePosted ??= new DateTime();
      $this->id ??= uniqid();
    }

    public function id() : string {
      return $this->id;
    }

    public function timePosted() : DateTime {
      return $this->timePosted;
    }

    public function title(?string $title = null) {
      if (is_null($title)) return $this->title;
      $this->title = $title;
    }

    public function content(?string $content = null) {
      if (is_null($content)) return $this->content;
      $this->content = $content;
    }

    public function contentType(?string $contentType = null) {
      if (is_null($contentType)) return $this->contentType;
      $this->contentType = $contentType;
    }

    public function visible(?string $visible = null) {
      if (is_null($visible)) return $this->visible;
      $this->visible = $visible;
    }

    public function toArray() : array {
      return [
        'id'           => $this->id(),
        'time_posted'  => $this->timePosted(),
        'title'        => $this->title(),
        'content'      => $this->content(),
        'content_type' => $this->contentType(),
        'visible'      => $this->visible()
      ];
    }
  }
