@extends('layout.layoutadmin')

@section('content')
<section class="py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
    <div class="container">
        <div class="card border-0 shadow-lg position-relative overflow-hidden" style="border-radius: 15px;">
            <!-- Decorative Elements -->
            <div class="position-absolute" style="top: -50px; right: -50px; width: 100px; height: 100px; background: linear-gradient(45deg, #720455, #9c1076); border-radius: 50%; opacity: 0.1;"></div>
            <div class="position-absolute" style="bottom: -30px; left: -30px; width: 80px; height: 80px; background: linear-gradient(45deg, #720455, #9c1076); border-radius: 50%; opacity: 0.1;"></div>

            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="icon-wrapper me-3">
                        <i class="ri-edit-2-line" style="color: #720455; font-size: 1.5rem;"></i>
                    </div>
                    <div>
                        <h2 class="mb-1" style="color: #720455;">Update Blog</h2>
                        <p class="text-muted mb-0">Edit informasi blog Anda</p>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger rounded-3 mb-4" style="border-left: 4px solid #dc3545;">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="myForm" action="{{ url('/blogs/update/' . $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-bold" style="color: #720455;">
                                    <i class="ri-text-wrap-line me-2"></i>Judul
                                </label>
                                <input type="text" 
                                       class="form-control form-control-lg" 
                                       name="title" 
                                       value="{{ $blog->title }}"
                                       style="border: 2px solid rgba(114, 4, 85, 0.2); border-radius: 10px;"
                                       required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-bold" style="color: #720455;">
                                    <i class="ri-user-line me-2"></i>Penulis
                                </label>
                                <input type="text" 
                                       class="form-control form-control-lg" 
                                       name="author" 
                                       value="{{ $blog->author }}"
                                       style="border: 2px solid rgba(114, 4, 85, 0.2); border-radius: 10px;"
                                       required>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label fw-bold" style="color: #720455;">
                                    <i class="ri-file-text-line me-2"></i>Deskripsi
                                </label>
                                <textarea class="form-control" 
                                          name="description" 
                                          rows="5"
                                          style="border: 2px solid rgba(114, 4, 85, 0.2); border-radius: 10px;"
                                          required>{{ $blog->description }}</textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label fw-bold" style="color: #720455;">
                                    <i class="ri-image-line me-2"></i>Gambar
                                </label>
                                @if ($blog->images)
                                    <div class="mb-3 p-3" style="background: rgba(114, 4, 85, 0.03); border-radius: 10px;">
                                        <p class="text-muted mb-2">Gambar saat ini:</p>
                                        <img src="{{ asset('storage/image_blog/' . $blog->images) }}" 
                                             alt="{{ $blog->title }}" 
                                             class="rounded"
                                             style="max-width: 200px; height: auto;">
                                    </div>
                                @endif
                                <input type="file" 
                                       class="form-control" 
                                       name="image"
                                       accept="image/*"
                                       style="border: 2px solid rgba(114, 4, 85, 0.2); border-radius: 10px;">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ url()->previous() }}" 
                                   class="btn btn-light px-4">
                                    <i class="ri-arrow-left-line me-2"></i>Kembali
                                </a>
                                <button type="submit" 
                                onclick="confirmSubmit(event)"
                                        class="btn px-4"
                                        style="background: linear-gradient(45deg, #720455, #9c1076); color: white;">
                                    <i class="ri-save-line me-2"></i>Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
.form-control:focus {
    border-color: #720455 !important;
    box-shadow: 0 0 0 0.2rem rgba(114, 4, 85, 0.25) !important;
}

.btn {
    transition: all 0.3s ease;
    border-radius: 10px;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(114, 4, 85, 0.2);
}

.icon-wrapper {
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    background: rgba(114, 4, 85, 0.1);
}
</style>
<script>
    function confirmSubmit(event) {
        event.preventDefault(); // Mencegah form langsung disubmit

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Perubahan akan disimpan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form jika pengguna mengonfirmasi
                document.getElementById("myForm").submit();
            }
        });
    }
</script>
@endsection