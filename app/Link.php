<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Link extends Model
{
    //

	protected $fillable = ['title', 'link'];

    protected $table = 'links';


    public function user()
    {
    	return $this->belongTo(User::class);
    }
}
