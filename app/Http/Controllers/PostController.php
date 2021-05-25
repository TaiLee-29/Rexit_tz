<?php


namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Events\PostHasViewed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostController

{    public function list(){
    $posts = \App\Models\Post::paginate(10);

    return view('Posts/list', compact('posts'));
}

    public function create()
    {
        $posts = \App\Models\Post::all();
        $post = new \App\Models\Post();


        return view('Posts.form',compact('posts','post'));


    }
    public function update($id)
    {
        //$data = request()->all();
        $post= \App\Models\Post::find($id);
        return view('Posts.form',compact('post'));

    }

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function edit($id)
    {
        $data = request()->validate([
            'title' => ['required', 'min:5'],
            'body' => ['required', 'min:10'],
        ]);
        if(isset($request['file']))
        {
            Storage::disk('public')->putFileAs('/storage/', $request->file('file'),$request->file('file')->getClientOriginalName());
            $data['file'] = '/storage/'.$request->file('file')->getClientOriginalName();
        }

        $post = \App\Models\Post::find($id);
        $post->title=$data['title'];
        $post->body = $data['body'];
        $post->save();


        return redirect()->route('home');

    }
    public function show($id)
    {
        //$post = Post::find($id);
        $post = Post::findOrFail($id);
        event('postHasViewed', $post);
        return view('Posts.show', compact('post'));

    }
    public function destroy($id)
    {
        $data = request()->all();
        $post =  \App\Models\Post::find($id);
        $file_name =  trim($post->file, "/storage/");

        Storage::delete($file_name);
        $post->delete();
        return redirect()->route('home');
    }

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => ['required', 'min:5'],
            'body' => ['required', 'min:10'],
        ]);
        if(isset($request['file']))
        {
            Storage::disk('public')->putFileAs('/storage/', $request->file('file'),$request->file('file')->getClientOriginalName());
            $data['file'] = '/storage/'.$request->file('file')->getClientOriginalName();
        }

        Post::create($data);


        return redirect()->route('home');
    }


}
