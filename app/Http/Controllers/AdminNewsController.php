<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminNewsController extends Controller
{
    public function edit_user(User $user): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application{
        return view('admin.news.edit-user', ['user' => $user]);
    }

    public function users(){

        return view('admin.news.users',[
            'users' => User::all()
        ]);
    }
    public function index(){

        return view('admin.news.index',[
            'newses' => News::paginate(50)
        ]);
    }

    public function create(){
        return view('admin.news.create');
    }
    public function store()
    {
//
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('news', 'slug')],
            'abbr' => 'required|max:255',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        News::create($attributes);

        return redirect('/');
    }
    public function edit(News $news): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {


            return view('admin.news.edit', ['news' => $news]);

    }
    public function update_user(User $user)
    {


        if(request()->admin=='1'){
            request()->writer='1';
        }

        $attributes = request()->validate([
            'name' => 'required',
            'admin' => 'required',
            'writer' => 'required'
        ]);

        if($attributes['admin']){
            $attributes['writer']='1';
        }


        $user->update($attributes);

        return back()->with('success', 'News Updated!');

    }
    public function update(News $news){
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'image',
            'slug' => ['required', Rule::unique('news', 'slug')->ignore($news->id)],
            'abbr' => 'required|max:255',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $news->update($attributes);

        return back()->with('success', 'News Updated!');
    }
    public function destroy(News $news)
    {
        $news->delete();

        return back()->with('success', 'News Deleted!');
    }
    public function destroy_user(User $user)
    {
        $user->delete();

//        return view('admin.news.users')->with('success','User Deleted!');
        return back()->with('success', 'User Deleted!');
    }

}
