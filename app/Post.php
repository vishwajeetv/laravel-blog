<?php

namespace App;


class Post extends Moloquent
{
    protected $connection = 'mongodb';

    protected $collection = 'posts';
    //

}
