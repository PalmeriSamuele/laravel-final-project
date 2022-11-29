<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\CategoryBlog;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::all();
        return view('pages.backoffice.pages.blogs',compact('blogs'));
    }
    public function create(){
        $categories = CategoryBlog::all();
        return view('pages.backoffice.pages.createBlog',compact('categories'));
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:200',
            'image' => 'required|image',
            'text' => 'required|max:2000',
            'category_blogs_id' => 'required'
        ]);
        $blog = new Blog();

        $blog->title = $request->title;
        $blog->image = $request->file('image')->hashName();
        $image = Image::make($request->file('image'))->resize(320,200);

        $image->save('assets/img/blog/'.$blog->image);

        $image_single = Image::make($request->file('image'))->resize(1090,450);
        $image_single->save('assets/img/blog/single/'.$blog->image);



        $blog->text = $request->text;
        $blog->category_blogs_id = $request->category_blogs_id;
        $blog->user_id = Auth::user()->id;
        $blog->save();
        $tags = explode(',',$request->tags);
        foreach($tags as $tag){
         
            if(Tag::where('tag', $tag)->get()->count() == 0){
                $_tag = new Tag();
                $_tag->tag = $tag;
                
                $_tag->save();
       
                Tag::find($_tag->id)->blogs()->sync( [$blog->id]);
           
            }else{
                $_tag = Tag::where('tag', $tag)->first();

                Tag::find($_tag->id)->blogs()->sync( [$blog->id]);
            }
            
            
        }

        return redirect()->back()->with('success','Article ajouté');
    }

    public function edit($id){
        $blog = Blog::find($id);
        $categories = CategoryBlog::all();
        return view('pages.backoffice.pages.editBlog',compact('blog','categories'));
    }
    
    public function update(Request $request,$id){
        $request->validate([
            'title' => 'required|max:200',
            'image' => 'required|image',
            'text' => 'required|max:2000',
            'category_blogs_id' => 'required'
        ]);

        $blog = Blog::find($id);
        unlink(public_path('assets/img/blog/' .$blog->image));

        $blog->title = $request->title;
        $blog->image = $request->file('image')->hashName();
        $image = Image::make($request->file('image'))->resize(320,200);
        $image->save('assets/img/blog/'.$blog->image);


        $blog->text = $request->text;
        $blog->user_id = Auth::user()->id;
        $blog->category_blogs_id = $request->category_blogs_id;

        $blog->save();
        return redirect()->back()->with('success','Article modifié');
    }

    public function destroy($id){
        $blog = Blog::find($id);
        unlink(public_path('assets/img/blog/' .$blog->image));

        $blog->delete();
        return redirect()->back()->with('success','Article correctement supprimé');
    }
}
