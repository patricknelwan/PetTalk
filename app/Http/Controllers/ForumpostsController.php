<?php

namespace App\Http\Controllers;

use App\Models\Forumposts;
use Illuminate\Http\Request;
use App\Models\Forum;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class ForumpostsController extends Controller
{
    function inputhandler(Request $req)
    {
        $forumpost=new Forumposts;
        $forumpost->commentcontent=$req->commentcontent;
        $forumpost->ForumID=(int)$req->ForumID;
        $forumpost->username=$req->username;
        $time=now();
        $forumpost->CreatedAt=$time;
        $forumpost->userid=$req->userid;
        $forumpost->save();
        Alert::success('Berhasil 🎉', 'Anda telah berhasil Berkomentar');
        return redirect("/forumpost/".$req->ForumID);
    }

    function ReturnView(String $forumID){
        if(null!==$forumID){
            $currentforum=Forum::where('ForumID',(integer)$forumID)->get();
            $forumposts=Forumposts::where('ForumID',(integer)$forumID)->get();
            $forumcreator=User::findOrFail($currentforum[0]->ForumCreator);

            return view('pageforum',['forum'=>$currentforum,'forumid'=>$forumID,'creator'=>$forumcreator,'forumposts'=>$forumposts]);
        }
    }
}
