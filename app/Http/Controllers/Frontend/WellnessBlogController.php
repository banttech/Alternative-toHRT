<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class WellnessBlogController extends Controller
{
    public function index()
    {
        $pageTitle = 'Alternative to HRT - Wellness Blog';
        $wellness_blogs = DB::table('wellness_blog')->orderBy('id', 'desc')->take(3)->get();

        $blogcategorys = DB::table('blogcategory')->get();
        foreach ($blogcategorys as $blogcategory) {
            $wellness_blogbycategory = DB::table('wellness_blog')->where('category_id', $blogcategory->id)->get()->count();
            if($wellness_blogbycategory>0) {
                $catidarrays[] = $blogcategory->id;
                $categoryname[] = $blogcategory->categoryname;
                $categoryslug[] = $blogcategory->slug;
            }
        }
        return view('frontend.wellness_blog.index', compact('wellness_blogs', 'wellness_blogbycategory', 'blogcategory', 'catidarrays', 'categoryname', 'categoryslug','pageTitle'));
    }
    public function blog($slug)
    {
        
        $wellness_blogs = DB::table('wellness_blog')->where('slug',$slug)->first();
       // dd($wellness_blogs);
        $pageTitle ='Alternative to HRT - ' . $wellness_blogs->title;
        //dd($wellness_blogs);
        $categoryname = DB::table('blogcategory')->where('id', $wellness_blogs->category_id)->first();
        $blogcategorys = DB::table('blogcategory')->get();
        $recent_blogs = DB::table('wellness_blog')->orderBy('date', 'desc')->take(10)->get();
        $LeaveReplys = DB::table('comments')->where('status','approved')->where('blog_id',$wellness_blogs->id)->orderBy('id','desc')->get();
        return view('frontend.wellness_blog.blogpage', compact('wellness_blogs', 'blogcategorys', 'recent_blogs', 'categoryname','LeaveReplys','pageTitle'));
    }

    public function author($name)
    {

        $pageTitle = 'Alternative to HRT - ' . $name;
        $wellness_blogs = DB::table('wellness_blog')->where('name', $name)->get();
        // dd($wellness_blogs);
        return view('frontend.authorblog.index', compact('pageTitle', 'wellness_blogs'));
    }

    public function blogTag($result){
        $pageTitle ='Alternative to HRT - '. $result;
        $allBlogs = DB::table('wellness_blog')->where('tags', 'like', '%' . $result . '%')->get();
        $categorynames = DB::table('blogcategory')->get();
        return view('frontend.blogcategory.blogTag', compact('pageTitle', 'allBlogs','categorynames','result'));
    }

}
