<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create_contact(Request $request)
    {
        $contact = new Contact();
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('success', 'Blog berhasil ditambahkan!');
    }

    // Fungsi untuk menampilkan semua kontak
    public function show_contacts()
    {
        $contacts = Contact::all(); // Ambil semua data dari tabel contact
        
        return view('view_contact', compact('contacts'));
    }

   public function delete_contact($id)
{
    $contact = Contact::findOrFail($id);
    $contact->delete();
    Alert::success('Hapus', 'Data telah berhasil dihapus!');
    return redirect()->back()->with('success', 'Pesan berhasil dihapus!');
}


}
