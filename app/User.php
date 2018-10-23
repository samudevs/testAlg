<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name'
    ];

    public function relations() {
    	return $this->belongsToMany(User::class, 'relations', 'user1_id', 'user2_id');
    }

    public function createRelation($id) {
    	$user = User::where('id', $id)->firstOrFail();

    	$this->relations()->attach($id);
    	$user->relations()->attach($this->id);

    }
}
