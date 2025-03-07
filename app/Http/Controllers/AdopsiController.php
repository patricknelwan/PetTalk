<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adopsi;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Storage;
class AdopsiController extends Controller
{
    //
   public function createadopsi(Request $req)
{
    $validator = $req->validate([
        'image' => ['required', 'image'],
        'name' => ['required', 'max:255'],
        'description' => ['required', 'max:255'],
        'age' => ['required', 'integer']
    ]);

    try {
        $hewan = new adopsi;
        $hewan->name = $req->name;
        $hewan->description = $req->description;
        $time = now()->format('Y-m-d-H-i-s');
        $extension = $req->image->getClientOriginalExtension();
        $newtitle = preg_replace('/[^A-Za-z0-9]/', 's', $req->name);
        $renamed = $newtitle . $time . '.' . $extension;
        $hewan->image = $renamed;
        $hewan->age = $req->age;
        $req->image->storeAs("public/adopsiimages", $renamed);
        $hewan->breed = $req->breed;
        $hewan->creatorid = $req->creatorid;
        $hewan->save();

        Alert::success('Berhasil 🎉', 'Data telah berhasil ditambahkan!');
    } catch (\Exception $e) {
        Alert::error('Error 😢', 'Failed to add data! Please try again.');
    }
    return redirect('/adopsi');
}
    function makeadoption(){
        $adoption=adopsi::leftJoin("centralizedprofiles","id","=","centralizedprofiles.adoptionid")->where('centralizedprofiles.adoptionid',null)->paginate(6);
        return view('/adopsi',['animaltable'=>$adoption]);
    }
    function viewformuliradopsi(String $adoptionid){
        $alladoptions=adopsi::find($adoptionid);
        return view('form_adopsi',['hewan'=>$alladoptions]);
    }
public function search(Request $request)
{
    $query = $request->input('Query');
    
    $animaltable = Adopsi::where('name', 'LIKE', "%{$query}%")
        ->orWhere('breed', 'LIKE', "%{$query}%")
        ->orWhere('description', 'LIKE', "%{$query}%")
        ->orWhere('age', 'LIKE', "%{$query}%")
        ->paginate(6)
        ->appends(request()->all());
    $animaltable->appends(['Query' => $query]);
    
    return view('adopsi', compact('animaltable'));
}
    function delete(String $adoptionid){
        if(isset($adoptionid)){
            $newid=(int)$adoptionid;
            $selected=adopsi::where("id",$newid)->first();
            Storage::disk('public')->delete('adopsiimages/'.$selected->image);
            $selected->delete();
            Alert::success('Hapus', 'Data telah berhasil dihapus!');
            return redirect()->back();
        }
    }
// app/Http/Controllers/AdopsiController.php
public function showEdit($id)
{
    $adopsi = Adopsi::findOrFail($id);
    return view('editadopsi', compact('adopsi'));
}

public function update(Request $request, $id)
{
    $adopsi = Adopsi::findOrFail($id);
    
    // Validate the request
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'age' => 'required|string',
        'breed' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);
    
    // Handle image upload
    if ($request->hasFile('image')) {
        // Delete old image
        if ($adopsi->image) {
            Storage::delete('public/adopsiimages/' . $adopsi->image);
        }
        
        // Store new image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/adopsiimages', $imageName);
        $validated['image'] = $imageName;
    }
    
    $adopsi->update($validated);
    Alert::success('Diperbarui', 'Data telah berhasil diperbarui!');
    return redirect('/adopsi')->with('success', 'Data berhasil diupdate');
}

}
