<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Instagram;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index() {
        //get product with galleries and category where deleted_at null
        $products = Product::with(['galleries', 'category'])->where('status', '1')->get();
        //productspopular get 3 items where popular = 1 and with highest star
        $productsPopular = Product::with(['galleries', 'category'])->where('status', '1')->where('popular', '1')->orderBy('star', 'desc')->take(3)->get();
        //instagram
        $instagrams = Instagram::orderBy('id', 'desc')->take(10)->get();
        //$testimoni
        $testimonials = Testimoni::orderBy('id', 'desc')->take(10)->get();
        //$blogs
        $blogs = Blog::orderBy('created_at','desc')->take(6)->get();
        //contact
        $contact = Contact::orderBy('id', 'desc')->first();

        // dd($productsPopular);
        return view('index', compact('products','productsPopular','instagrams','testimonials','blogs','contact'));
    }

    //quickview
    public function quickview($id) {
        $product = Product::with(['galleries', 'category'])->where('id', $id)->firstOrFail();
        return view('quickview', compact('product'));
    }

    //productdetail
    public function productdetail($slug) {
        $product = Product::with(['galleries', 'category'])->where('slug', $slug)->firstOrFail();
        //get random products
        $randomProducts = Product::with(['galleries', 'category'])->where('status', '1')->inRandomOrder()->take(6)->get();
        // dd($product);
        return view('frontend.page.productdetail', compact('product', 'randomProducts'));
    }

    //aboutus
    public function aboutus() {
        return view('frontend.page.aboutus');
    }

    //contactus
    public function contactus() {
        //get data contact
        $contact = Contact::orderBy('id', 'desc')->first();
        // dd($contact);
        return view('frontend.page.contactus', compact('contact'));
    }

    //blogdetail
    public function blogdetail($slug) {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        //get random blogs
        $randomBlogs = Blog::inRandomOrder()->take(3)->get();
        // dd($blog);
        return view('frontend.page.blogdetail', compact('blog', 'randomBlogs'));
    }

    //blog
    public function blog() {
        $blogs = Blog::orderBy('created_at','desc')->paginate(12);
        // dd($blogs);
        return view('frontend.page.blog', compact('blogs'));
    }
}
