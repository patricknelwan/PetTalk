<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(3);
        return view('index', compact('blogs'));
    }

    public function index_blog($id)
{
    $blog = Blog::findOrFail($id); // Mengambil blog berdasarkan ID
    $blogs = Blog::where('id', '!=', $id) // Menghindari blog yang sedang ditampilkan
                ->inRandomOrder() // Mengambil data secara acak
                ->paginate(3); // Membatasi 3 item per halaman
    return view('blog_guest', compact('blog', 'blogs'));
}


}
