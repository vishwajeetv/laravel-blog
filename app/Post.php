<?php
namespace App;
use Jenssegers\Mongodb\Eloquent\Model as Moloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;


class Post extends Moloquent
{
    use SoftDeletes;

    protected $connection = 'mongodb';

    protected $collection = 'posts';

    protected $fillable = ['username','postTitle','postText'];

    protected $dates = ['deleted_at'];

    //

}
