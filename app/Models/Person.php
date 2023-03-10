<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
  use HasFactory;

  public function boards() {
   return $this->hasMany("App\Models\Board");
  }

  protected $guarded = array("id");

  public static $rules = array(
   "name"=>"required",
   "mail"=>"email",
   "age"=>"integer|min:0|max:150"
   );

  public function getData()
   {
    return $this->id . ":" . $this->name . "(" . $this->age .")";
   }

  public function scopeNameEqual($query, $str)
  {
   return $query->where("name", $str);
  }
  public function scopeAgeGreaterthan($query, $n)
  {
   return $query->where("age", ">=", $n);
  }
  public function scopeAgeLessthan($query, $n)
  {
   return $query->where("age", "<=", $n);
  }

}
