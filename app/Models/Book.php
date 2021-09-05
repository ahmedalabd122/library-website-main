<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  use HasFactory;

  /**
   * Mass assignable fields
   *
   * @var array
   */
  protected $fillable = [
    'title',
    'description',
    'cover',
    'category_id',
    'author_id'
  ];


  /**
   * N-1 Relationship
   * 
   * Return the category which this book belongs to
   *
   * @return \App\Models\Category
   */
  public function category()
  {
    return $this->belongsTo(Category::class);
  }


  /**
   * N-1 Relationship
   * 
   * Return the author which this book belongs to
   *
   * @return \App\Models\Author
   */
  public function author()
  {
    return $this->belongsTo(Author::class);
  }
}
