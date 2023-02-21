<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsCommentsController extends Controller
{

    public function store(News $news){
        request()->validate([
            'body' => 'required'
        ]);
        $news->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')

        ]);
        return back();
    }
}
