<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function createshowblog()
    {
        return view('blogadmin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function Createblog(Request $request)
    {
        $blog = new Blog();
        $file = $request->file('image');
        $imagename = $blog->id.'_'.time().'.'.$file->getClientOriginalExtension();
        $blog->author = $request->author;
        $blog->title = $request->title;
        $blog->images = $imagename;
        $blog->description = $request->description;
        Storage::putFileAs('public/image_blog', $file, $imagename);
        $imagename = 'public/image_blog/'.$imagename;
        $blog->save();
         Alert::success('Berhasil 🎉', 'Data telah berhasil ditambahkan!');
        return redirect('/crud-blogs');
    }

    public function search(Request $request)
    {
        $search = $request->query('search');

        // Query untuk pencarian, jika tidak ada parameter pencarian, tampilkan semua blog
        $blogs = Blog::when($search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('author', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
        }, function ($query) {
            return $query; // Jika tidak ada pencarian, ambil semua data
        })->get();

        return view('berandacustomer', compact('blogs'));
    }


    public function showupdate()
    {
        $blogs = Blog::all();
        return view('update_delete_blog', compact('blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateblog($id)
    {
        $blog = Blog::findOrFail($id);
        return view('updateblog', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        // Validasi input
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Update data blog
        $blog->title = $request->title;
        $blog->author = $request->author;
        $blog->description = $request->description;

        // Update gambar jika ada
        if ($request->hasFile('image')) {
            if ($blog->images && Storage::exists('public/image_blog/' . $blog->images)) {
                Storage::delete('public/image_blog/' . $blog->images);
            }
            $file = $request->file('image');
            $imagename = $blog->id . '_' . time() . '.' . $file->getClientOriginalExtension();
            Storage::putFileAs('public/image_blog', $file, $imagename);
            $blog->images = $imagename;
        }
        $blog->save();
        Alert::success('Diperbarui', 'Data telah berhasil diperbarui!');
        return redirect()->route('crud-blog')->with('success', 'Blog berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->images && Storage::exists('public/image_blog/' . $blog->images)) {
            Storage::delete('public/image_blog/' . $blog->images);
        }

        $blog->delete();
        Alert::success('Hapus', 'Data telah berhasil dihapus!');
        return redirect()->back()->with('success', 'Blog berhasil dihapus!');
    }
}
