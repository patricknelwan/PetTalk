<?php

namespace App\Http\Controllers;

use App\Models\Centralizedprofile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CentralizedprofileController extends Controller
{
    function viewProfile(){
        $profileid=Auth::user()->id;
        $profilemanage=centralizedprofile::where('userid',$profileid)->join('users','userid','=','users.id');
        $profilemanage=$profilemanage->join('adopsis','adoptionid','=','adopsis.id')->paginate(10);
        return view('profile',['central'=>$profilemanage]);
    }
    function profileAdopt(Request $req){
        $profileid=Auth::user()->id;
        $adopsiid=$req->adopsiid;
        $centralprofile=new centralizedprofile;
        $centralprofile->adoptionid=$adopsiid;
        $centralprofile->userid=$profileid;
        $centralprofile->adoptiondescription=$req->message;
        $centralprofile->transport=$req->transport;
        $centralprofile->save();
        return redirect('/adopsi/');
    }
}
