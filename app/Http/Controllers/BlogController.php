<?php

namespace App\Http\Controllers;
use App\Category;
use App\Blog;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchB=($request->searchB) ? $request->searchB :'';
        $category=($request->searchC) ? $request->searchC :'';
        $blogs=Blog::where('title','like','%' .$searchB. '%')
        ->whereHas('category',function(Builder $query) use($category)
        {
            $query->where('name','like','%'.$category.'%');
        })
        ->paginate(5);
        
        return view('Blog/index')->withBlogs($blogs)->withSearchB($searchB)->withCategory($category);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('Blog/create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog=new Blog;
        $blog->title=$request->title;
        $blog->description=$request->description;
        $blog->category_id=$request->blog_category;
        $blog->save();

        $blog->tags()->sync($request->tag_id);
        
        return redirect('\blogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog=Blog::find($id);
        return view('Blog/show')->withBlog($blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog=Blog::find($id);
        $categories=Category::all();
        return view('Blog/edit')->withBlog($blog)->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $blog=Blog::find($id);
        $blog->title=$request->title;
        $blog->description=$request->description;
        $blog->category_id=$request->blog_category;
        $blog->save();
        return redirect('/blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Blog::find($id);
        $content->delete();
        return redirect('blogs');
    }
}
