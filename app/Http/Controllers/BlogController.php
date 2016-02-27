<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Acme\Jobs\PostBlogCommand;

class BlogController extends Controller
{
    public function index()
    {
        return Blog::all();
    }

    public function store(Request $request)
    {
        $command = new PostBlogCommand('Demo', 'Demo Description');
        $this->commandBus->execute($command);
    }
}
