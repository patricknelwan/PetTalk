@extends('layout.layoutadmin')

@section('content')
    <div class="container py-4 mb-5">
    <div class="d-flex justify-content-between align-items-center mb-4" 
         data-aos="fade-right" 
         data-aos-delay="100">
        <h1 style="color: #720455; font-weight: 700;">Daftar Blog</h1>
        <a href="{{ url('/create-blog') }}" 
           class="btn btn-lg" 
           style="background-color: #720455; color: white; border-radius: 25px; padding: 10px 25px;"
           data-aos="zoom-in"
           data-aos-delay="200">
            <i class="fa fa-plus me-2"></i> Tambah Blog
        </a>
    </div>
    
    <div class="card shadow-sm" 
         style="border-radius: 15px; border: none;"
         data-aos="fade-up"
         data-aos-delay="300">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background-color: #720455;">
                        <tr data-aos="fade-left" data-aos-delay="400">
                            <th style="color: white; padding: 15px 20px;">No</th>
                                <th style="color: white; padding: 15px 20px;">Judul</th>
                                <th style="color: white; padding: 15px 20px;">Penulis</th>
                                <th style="color: white; padding: 15px 20px;">Deskripsi</th>
                                <th style="color: white; padding: 15px 20px;">Gambar</th>
                                <th style="color: white; padding: 15px 20px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $key => $blog)
                        <tr style="border-bottom: 1px solid #dee2e6;"
                            data-aos="fade-up"
                            data-aos-delay="{{ 500 + ($key * 100) }}"
                            data-aos-offset="0">
                            <td style="padding: 15px 20px;">{{ $key + 1 }}</td>
                                <td style="padding: 15px 20px; font-weight: 600; color: #720455;">
                                    {{ $blog->title }}
                                </td>
                                <td style="padding: 15px 20px;">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-user-circle me-2" style="color: #720455;"></i>
                                        {{ $blog->author }}
                                    </div>
                                </td>
                                <td style="padding: 15px 20px;">{{ Str::words($blog->description, 10) }}</td>
                                <td style="padding: 15px 20px;">
                                    @if($blog->images)
                                        <img src="{{ asset('storage/image_blog/' . $blog->images) }}" 
                                             alt="{{ $blog->title }}" 
                                             style="width: 100px; height: 70px; object-fit: cover; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                    @else
                                        <span class="badge bg-secondary">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td style="padding: 15px 20px;">
                                    <div class="d-flex gap-2">
                                        <a href="{{ url('/blogs/edit/' . $blog->id) }}"
                                           class="btn btn-sm"
                                           style="background-color: #720455; color: white; border-radius: 20px; padding: 8px 15px;">
                                            Edit
                                        </a>
                                        <a href="{{ url('/blogs/delete/' . $blog->id) }}"
                                           class="btn btn-sm btn-danger"
                                           onclick="confirmDelete(event, this.href)"
                                           style="border-radius: 20px; padding: 8px 15px;">
                                            Hapus
                                        </a>
                                    </div>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    <style>
        .table-hover tbody tr:hover {
            background-color: rgba(114, 4, 85, 0.05);
        }
        
        .btn:hover {
            opacity: 0.9;
            transform: translateY(-1px);
            transition: all 0.2s;
        }
        
        .card {
            transition: all 0.3s ease;
        }
        
        .card:hover {
            box-shadow: 0 5px 15px rgba(114, 4, 85, 0.1) !important;
        }

        .alert {
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
    <script>
    function confirmDelete(event, url) {
        event.preventDefault(); // Mencegah link langsung dijalankan

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ke URL jika pengguna mengonfirmasi
                window.location.href = url;
            }
        });
    }
</script>
@endsection