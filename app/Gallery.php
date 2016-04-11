<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model {
    protected $table = 'galleries';
    protected $fillable = ['title', 'description','img_name'];
    
     public static function insertgallery($data){
        $gallery = Gallery::create($data);
        return $gallery;
    }
}
