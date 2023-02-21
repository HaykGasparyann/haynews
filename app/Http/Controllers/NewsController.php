<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class NewsController extends Controller
{

    public function index(){
        return view('welcome',[
//            dd(Gate::allows('admin'))

            'newses'=>  News::latest()->filter(request(['search']))->paginate(3)->withQueryString(),
            'categories' => Category::all()
        ]);
    }
    public function show(News $news){
        return view('newses', [
            'news' => $news,
            'categories' => Category::all()
        ]);

    }

}
