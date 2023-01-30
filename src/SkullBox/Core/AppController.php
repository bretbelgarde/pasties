<?php

namespace SkullBox\Core;

use Base;

use SkullBox\Core\PastieController;
use SkullBox\Models\Pastie;

class AppController
{

  use \SkullBox\Utils\PageRenderer;
  use \SkullBox\Utils\JsonRenderer;
  use \SkullBox\Utils\GetJSONPost;

  const VALID_FIELDS = [
    'pastie_title',
    'pastie_content',
    'pastie_content_type'
  ];

  private PastieController $pastieData;

  public function __construct(private Base $app) {
    $this->pastieData = new PastieController($app);
  }

  public function index():void {
     $this->render('home');
  }

  public function getPasties() : void {
    $id ??= $this->app->get('PARAMS.id');
    
    if (!is_null($id)) {
      $data = [];
      $data[] = $this->pastieData->getOne($id)->toArray();
    } else {
      $data = array_map(function ($pastie) {
        return $pastie->toArray();
      }, $this->pastieData->getAll());
    }

    $this->renderJSON($data);
  }

  public function addPastie() {
    $post = $this->getJSONPost();

    if ($this->validateFormData($post)) {
      $this->renderJSON([
        "message" => "Error: Invalid Entries in Post",
        "error" => "The POST array contains entries that do not match allowed keys"
      ]);
      
      return;
    }
    
    try {
      $this->pastieData->save(new Pastie(
          $post['pastie_title'],
          $post['pastie_content'],
          $post['pastie_content_type']
      ));
    } catch (\Exception $e) {
      $this->renderJSON([
        "message" => "Error: Unable to Save Pastie",
        "error"   => "{$e}"
      ]);
    }
   
    $this->renderJSON(["message" => "Pastie Added"]);
  }

  public function updatePastie() {
    // Not Yet Implemented
  }

  public function deletePastie() {
    $post = $this->getJSONPost();
    
    if (!key_exists('pastie_id', $post) ||
        empty($post['pastie_id'])) {
      $this->renderJSON([
        'message' => 'Error: Unable to delete pastie.',
        'error'   => 'Post data is empty or missing id.'
      ]);
      return;
    }

    if (!$this->pastieData->delete($post['pastie_id'])) {
        $this->renderJSON([
            'message' => 'Error: Unable to delete pastie.',
            'error'   => 'Unable to connect to database.'
        ]);
        return;
    }

    $this->renderJSON(['message' => 'Pastie deleted.']);

  }

  private function validateFormData(array $formData) : bool {
    foreach ($formData as $key => $field) {
      if (!key_exists($key, self::VALID_FIELDS)) return false;
    }

    return true;
  }
}
