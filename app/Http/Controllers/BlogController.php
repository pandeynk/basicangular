<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Acme\Jobs\PostBlogCommand;

/**
 * BlogController.
 * 
 * handles every route related to Blogs
 */
class BlogController extends Controller
{
    /**
     * fetches every blogs.
     *
     * @return [type] [description]
     */
    public function index()
    {
        return Blog::all();
    }

    /**
     * stores new blog.
     *
     * @param Request $request [description]
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $command = new PostBlogCommand('Demo', 'Demo Description');
        $this->commandBus->execute($command);
    }
}
