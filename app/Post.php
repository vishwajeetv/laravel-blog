<?php
namespace App;
use Jenssegers\Mongodb\Eloquent\Model as Moloquent;



class Post extends Moloquent
{
    protected $connection = 'mongodb';

    protected $collection = 'posts';
    //

}
