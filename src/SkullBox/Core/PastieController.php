<?php
namespace SkullBox\Core;

use Base;
use DateTime;
use DB\Jig\Mapper;
use SkullBox\Models\Pastie;

class PastieController {
    private Mapper $pastiesMapper;
    
    public function __construct(protected Base $app) {
        $this->pastiesMapper = new Mapper($this->app->get('DB'), 'pasties.json');
    }
    
    public function getAll() : array {
        $pasties = $this->pastiesMapper->find();
        
        if ($pasties !== false) return array_map(function($pastie) {
                return $this->copyToPastie($pastie);
        }, $pasties);

        return [];
    }

    public function getOne($pastieID) : Pastie {
        $pastie = $this->pastiesMapper->findone(['@id=?', $pastieID]);
        return $this->copyToPastie($pastie);
    }

    public function save(Pastie $pastie) : void {
        $this->pastiesMapper->load(['@id=?', $pastie->id()]);
        $this->pastiesMapper->copyfrom($pastie->toArray());
        $this->pastiesMapper->save();
        $this->pastiesMapper->reset();
    }

    public function delete(string $id) : bool {
        $this->pastiesMapper->load(['@id=?',$id]);
        return $this->pastiesMapper->erase();
    }
    
    private function copyToPastie(Mapper $result) {
        return new Pastie(
            $result->title,
            $result->content,
            $result->content_type,
            $result->id,
            DateTime::createFromFormat("Y-m-d H:i:s.u", $result->time_posted['date']),
            $result->visible
        );
    }
}