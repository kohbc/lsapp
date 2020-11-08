<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function about(){
        $title = 'About Us';
        return view('pages.about')->with('title', $title);
    }

    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Web Design', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }

    public function leaderboard(){
        $users = User::orderBy('score', 'DESC')->orderBy('updated_at', 'ASC')->take(10)->get();
        return view('leaderboard')->with('users', $users);
    }

    //TEA App Bottom Bar
    public function resources(){
        return view('pages.resources');
    }

    public function activities(){
        return view('pages.activities');
    }

    public function account(){
        return view('dashboard');
    }

    public function social(){
        return view('pages.social');
    }

    public function ranking(){
        return view('pages.ranking');
    }
}
