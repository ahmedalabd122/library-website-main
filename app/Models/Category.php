<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  use HasFactory;

  /**
   * Mass assignable fields
   *
   * @var array
   */
  protected $fillable = ['title'];


  /**
   * 1-N Relationship
   * 
   * Return the books belongs to this category
   *
   * @return \App\Models\Book
   */
  public function books()
  {
    return $this->hasMany(Book::class);
  }
}
