<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    //
    public function index()
    {
        return view('admin.posts.index',[
           'posts'=>Post::paginate(50)
        ]);
    }
    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {

        $attributes = $this->getAttributes(new Post());
        $attributes['user_id']=auth()->id();
        $attributes['thumbnail'] = \request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/')->with('success', 'Post Created!');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit',['post'=>$post]);
    }

    public function update(Post $post)
    {
        $attributes = $this->getAttributes($post);

        if(isset($attributes['thumbnail'])){
            $attributes['thumbnail'] = \request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted');
    }

    /**
     * @param Post $post
     * @return array
     */
    public function getAttributes(?Post $post = null): array
    {
        $post ??=new Post();
        $attributes = \request()->validate([
            'title' => ['required', Rule::unique('posts', 'title')->ignore($post)],
            'thumbnail' => $post->exists() ? ['image'] : ['required', 'image'],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]

        ]);
        return $attributes;
    }
}
