@extends('layout.layoutadmin')

@section('content')
<section class="py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
    <!-- Back Button -->
    <div class="container">
        <a href="/crud-blogs" 
           class="btn px-4 py-2 mb-4" 
           style="
                background: linear-gradient(45deg, #720455, #9c1076);
                color: white;
                border-radius: 50px;
                font-weight: 500;
                transition: all 0.3s ease;
                box-shadow: 0 2px 10px rgba(114, 4, 85, 0.2);">
            <i class="ri-arrow-left-line me-2"></i>Kembali
        </a>
    </div>

    <!-- Main Form Card -->
    <div class="container" style="max-width: 800px;">
        <div class="card border-0 shadow-lg" style="border-radius: 15px;">
            <div class="card-body p-4">
                <h2 class="text-center mb-4" style="color: #720455; font-weight: 600;">
                    <i class="ri-edit-box-line me-2"></i>Buat Blog Baru
                </h2>

                <form action="" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf

                    <!-- Title -->
                    <div class="mb-4">
                        <label for="title" class="form-label fw-bold" style="color: #720455;">
                            <i class="ri-text-wrap me-2"></i>Judul
                        </label>
                        <input type="text" 
                               class="form-control form-control-lg" 
                               id="title" 
                               name="title" 
                               placeholder="Masukkan judul blog yang menarik..."
                               required
                               style="
                                    border: 2px solid rgba(114, 4, 85, 0.2);
                                    border-radius: 10px;
                                    padding: 12px 20px;
                                    transition: all 0.3s ease;">
                        <div class="invalid-feedback">
                            Judul tidak boleh kosong
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="form-label fw-bold" style="color: #720455;">
                            <i class="ri-file-text-line me-2"></i>Deskripsi
                        </label>
                        <textarea class="form-control" 
                                  id="description" 
                                  name="description" 
                                  rows="6" 
                                  placeholder="Tulis konten blog Anda di sini..."
                                  required
                                  style="
                                      border: 2px solid rgba(114, 4, 85, 0.2);
                                      border-radius: 10px;
                                      padding: 12px 20px;
                                      transition: all 0.3s ease;"></textarea>
                        <div class="invalid-feedback">
                            Deskripsi tidak boleh kosong
                        </div>
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-4">
                        <label class="form-label fw-bold" style="color: #720455;">
                            <i class="ri-image-line me-2"></i>Gambar Blog
                        </label>
                        <div class="input-group">
                            <input type="file" 
                                   class="form-control" 
                                   id="image" 
                                   name="image"
                                   accept="image/*"
                                   required
                                   style="
                                       border: 2px solid rgba(114, 4, 85, 0.2);
                                       border-radius: 10px;
                                       padding: 12px;">
                        </div>
                        <small class="text-muted mt-2">
                            Format yang didukung: JPG, PNG, GIF (Max. 5MB)
                        </small>
                    </div>

                    <!-- Preview Image -->
                    <div id="imagePreview" class="mb-4 d-none">
                        <img src="" alt="Preview" class="img-fluid rounded" style="max-height: 200px;">
                    </div>

                    <!-- Author -->
                    <div class="mb-4">
                        <label for="author" class="form-label fw-bold" style="color: #720455;">
                            <i class="ri-user-line me-2"></i>Penulis
                        </label>
                        <input type="text" 
                               class="form-control form-control-lg" 
                               id="author" 
                               name="author" 
                               placeholder="Nama penulis..."
                               required
                               style="
                                    border: 2px solid rgba(114, 4, 85, 0.2);
                                    border-radius: 10px;
                                    padding: 12px 20px;
                                    transition: all 0.3s ease;">
                        <div class="invalid-feedback">
                            Nama penulis tidak boleh kosong
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" 
                                class="btn btn-lg px-5 py-3" 
                                style="
                                    background: linear-gradient(45deg, #720455, #9c1076);
                                    border: none;
                                    color: white;
                                    border-radius: 10px;
                                    font-weight: 600;
                                    transition: all 0.3s ease;">
                            <i class="ri-send-plane-fill me-2"></i>
                            Publikasikan Blog
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
// Form validation
(function() {
    'use strict';
    const forms = document.querySelectorAll('.needs-validation');
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
})();

// Image preview
document.getElementById('image').addEventListener('change', function(e) {
    const preview = document.getElementById('imagePreview');
    const file = e.target.files[0];
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.querySelector('img').src = e.target.result;
            preview.classList.remove('d-none');
        }
        reader.readAsDataURL(file);
    } else {
        preview.classList.add('d-none');
    }
});

// Input field animations
const inputs = document.querySelectorAll('.form-control');
inputs.forEach(input => {
    input.addEventListener('focus', () => {
        input.style.borderColor = '#720455';
        input.style.boxShadow = '0 0 0 0.2rem rgba(114, 4, 85, 0.25)';
    });
    
    input.addEventListener('blur', () => {
        input.style.borderColor = 'rgba(114, 4, 85, 0.2)';
        input.style.boxShadow = 'none';
    });
});
</script>
@endsection