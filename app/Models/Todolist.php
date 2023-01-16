<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @OA\Schema(
 *     title="Todolist",
 *     description="Todolist model",
 *     @OA\Xml(
 *         name="Todolist"
 *     )
 * )
 */
class Todolist extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description','user_id'];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
