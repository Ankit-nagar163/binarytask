<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tree extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'parent_id', 'position'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function parent()
    {
        return $this->belongsTo(Tree::class, 'parent_id');
    }

    // Relationship to the left child
    public function leftChild()
    {
        return $this->hasOne(Tree::class, 'parent_id')->where('position', 'left');
    }

    // Relationship to the right child
    public function rightChild()
    {
        return $this->hasOne(Tree::class, 'parent_id')->where('position', 'right');
    }
}
