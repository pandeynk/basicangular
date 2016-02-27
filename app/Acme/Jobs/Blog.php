<?php

namespace Acme\Jobs;

use Acme\Eventing\EventGenerator;

/**
 * 
 */
class Blog extends \Eloquent
{
    use EventGenerator;

    protected $table = 'blogs';
    protected $fillable = ['title', 'description'];

    /**
     * Stores a new blog into database.
     *
     * @param [type] $title       [description]
     * @param [type] $description [description]
     *
     * @return Blog [description]
     */
    public static function post($title, $description)
    {
        $blog = new static();
        $blog->title = $title;
        $blog->description = $description;
        $blog->save();
        $blog->raise(new BlogWasPosted($blog));

        return $blog;
    }
}
