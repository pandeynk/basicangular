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

    public function post($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
        $this->save();
        $this->raise(new BlogWasPosted($this));

        return $this;
    }
}
