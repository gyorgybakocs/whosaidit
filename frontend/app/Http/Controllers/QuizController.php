<?php

namespace App\Http\Controllers;

class QuizController extends BaseController
{

    public function index()
    {
        $this->logger->info('Main quiz page was loaded');

        return view('pages.play.main');
    }

    public function page()
    {
        $this->logger->info('Quiz page was loaded');

        return view('pages.play.page');
    }

    public function saved()
    {
        $this->logger->info('Saved quizzes was loaded');

        return view('pages.play.saved');
    }
}
