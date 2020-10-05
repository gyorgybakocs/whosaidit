<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as HttpRequest;
use Illuminate\Routing\Controller;
use Monolog\Logger;

/**
 * Class BaseController
 * @package App\Http\Controllers
 */
class BaseController extends Controller
{
    /**
     * @var HttpRequest
     */
    protected $request;

    /**
     * @var Logger
     */
    protected $logger;

    /**
     * @var array
     */
    protected $data;

    /**
     * BaseController constructor.
     * @param HttpRequest $request
     * @param Logger $logger
     */
    public function __construct(
        HttpRequest $request,
        Logger $logger
    ) {
        $this->request = $request;
        $this->logger = $logger;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->logger->info('Domain root was loaded');

        return view('pages.main');
    }


}
