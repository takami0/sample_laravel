<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    public function user() {
      return $this->belongsTo("App\Models\User");
    }

    protected $guarded = array("id");

    public static $rules = array(
      "title"=>"required",
      "message"=>"required",
    );
    public function getData() {
      return $this->id . ":" . $this->title . "(" . $this->person->name .")" ;
    }
}
