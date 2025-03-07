<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Forum;
use App\Models\Forumposts;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ForumController extends Controller
{
    function returnview(String $forumid){
        if(isset($forumid)){
            $newid=(int)$forumid;
            $forumposts=Forumposts::where('ForumID',$newid)->get();
            $forum=Forum::where('ForumID',$newid)->get();
            return view('pageforum',['forumposts'=>$forumposts,'forumid'=>$newid,'forum'=>$forum]);
        }
        else{
            return redirect()->back();
        }
    }
    function inputhandler(Request $req){
        $validator=$req->validate([
            'title'=>['required','max:255'],
            'content'=>['required'],
            'id'=>['required'],
            'ForumImage' =>['nullable','file','image'],
        ]);
        $forum=new Forum;
        $forum->ForumTitle=$req->title;
        $forum->ForumContent=$req->content;
        $forum->ForumCreator=$req->id;
        $time=now()->format('Y-m-d-H-i-s');
        if($req->ForumImage !==null){
        $extension=$req->ForumImage->getClientOriginalExtension();
        $newtitle=$req->title;
        $newtitle=preg_replace('/[^A-Za-z0-9]/','s',$newtitle);
        $renamed=$newtitle.$time.'.'.$extension;
        $forum->ForumImage=$renamed;
        $req->ForumImage->storeAs("public/forumimages",$renamed);
        }
        else{
            $forum->ForumImage=null;
        }
        $forum->CreatedAt=$time;
        $forum->save();
        $value=$forum->ForumID;
        Alert::success('Berhasil 🎉', 'Data telah berhasil ditambahkan!');
        return redirect("/forumpost/$value");
    }
    function generalforumview(){
        $allforums = Forum::orderBy('created_at', 'DESC')->paginate(4);
        return view('allforums',['forums'=>$allforums]);
    }
    function deleteforum(String $forumid){
    if(isset($forumid)){
        $newid=(int)$forumid;
        $selected=Forum::where("ForumID",$newid)->first();
        Storage::delete('forumimages/'.$selected->ForumImage);
        $selected->delete();
         Alert::success('Hapus', 'Data telah berhasil dihapus!');
        return redirect()->back();
    }}
    // ForumController.php
public function search(Request $request)
{
    // Ambil query pencarian dari request
    $query = $request->Query;
    
    // Buat query builder dengan kondisi pencarian
    $forums = Forum::where('ForumTitle', 'like', "%{$query}%")
    ->orWhere('ForumContent', 'like', "%{$query}%")
    ->orderBy('CreatedAt', 'desc')
    ->paginate(5)
    ->appends(request()->all());
    
    // Kirim data ke view
    return view('allforums', compact('forums'));
}
    }
