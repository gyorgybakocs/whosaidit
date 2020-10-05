<?php

namespace App\Http\Controllers;

class BlogController extends BaseController
{

    public function index()
    {
        $this->logger->info('Main blog page was loaded');

        return view('pages.blog.main');
    }

    public function post()
    {
        $this->logger->info('Blogpost was loaded');

        return view('pages.blog.post');
    }
}
