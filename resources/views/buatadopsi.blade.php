@extends('layout.layoutadmin')
@section('content')

<section id="create-adoption" class="py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
    <!-- Back Button -->
    <div class="container">
        <a href="/adopsi" 
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
    <div class="container" style="
        max-width: 800px;
        background-color: white;
        border-radius: 15px;
        padding: 2.5rem;
        box-shadow: 0 10px 30px rgba(114, 4, 85, 0.1);">
        
        <h1 class="text-center mb-4" style="
            color: #720455;
            font-weight: 600;
            font-size: 2.5rem;">
            <i class="ri-heart-2-line me-2"></i>Formulir Adopsi Hewan
        </h1>
        
        <form action="/buatadopsi" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf

            @if(Auth::user())
                <input type="hidden" name="creatorid" value="{{ Auth::user()->id }}">
            @endif

            <!-- Pet Name -->
            <div class="mb-4">
                <label for="name" class="form-label fw-bold" style="color: #720455;">
                    <i class="ri-user-heart-line me-2"></i>Nama Hewan
                </label>
                <input type="text" 
                    class="form-control form-control-lg" 
                    id="name" 
                    name="name" 
                    placeholder="Masukkan nama hewan..." 
                    required
                    style="
                        border: 2px solid rgba(114, 4, 85, 0.2);
                        border-radius: 10px;
                        padding: 12px 20px;
                        transition: all 0.3s ease;">
                <div class="invalid-feedback">
                    Nama hewan tidak boleh kosong
                </div>
            </div>

            <!-- Pet Age -->
            <div class="mb-4">
                <label for="age" class="form-label fw-bold" style="color: #720455;">
                    <i class="ri-calendar-line me-2"></i>Umur Hewan
                </label>
                <input type="number" 
                    class="form-control form-control-lg" 
                    id="age" 
                    name="age" 
                    placeholder="Masukkan umur hewan (dalam tahun)" 
                    min="0" 
                    max="100"
                    required
                    style="
                        border: 2px solid rgba(114, 4, 85, 0.2);
                        border-radius: 10px;
                        padding: 12px 20px;
                        transition: all 0.3s ease;">
                <div class="invalid-feedback">
                    Umur hewan harus diisi dengan angka valid
                </div>
            </div>

            <!-- Pet Breed -->
            <div class="mb-4">
                <label for="breed" class="form-label fw-bold" style="color: #720455;">
                    <i class="ri-service-line me-2"></i>Jenis Hewan
                </label>
                <input type="text" 
                    class="form-control form-control-lg" 
                    id="breed" 
                    name="breed" 
                    placeholder="Contoh: Kucing Persia, Anjing Golden Retriever..." 
                    required
                    style="
                        border: 2px solid rgba(114, 4, 85, 0.2);
                        border-radius: 10px;
                        padding: 12px 20px;
                        transition: all 0.3s ease;">
                <div class="invalid-feedback">
                    Jenis hewan tidak boleh kosong
                </div>
            </div>

            <!-- Pet Description -->
            <div class="mb-4">
                <label for="description" class="form-label fw-bold" style="color: #720455;">
                    <i class="ri-file-text-line me-2"></i>Deskripsi Hewan
                </label>
                <textarea 
                    class="form-control" 
                    id="description" 
                    name="description" 
                    rows="4" 
                    placeholder="Jelaskan tentang kondisi kesehatan, kebiasaan, dan informasi penting lainnya..." 
                    required
                    style="
                        border: 2px solid rgba(114, 4, 85, 0.2);
                        border-radius: 10px;
                        padding: 12px 20px;
                        transition: all 0.3s ease;"></textarea>
                <div class="invalid-feedback">
                    Deskripsi hewan tidak boleh kosong
                </div>
            </div>

            <!-- Pet Image -->
            <div class="mb-4">
                <label class="form-label fw-bold" style="color: #720455;">
                    <i class="ri-image-line me-2"></i>Foto Hewan
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
                    <i class="ri-save-line me-2"></i>
                    Daftarkan Hewan
                </button>
            </div>
        </form>
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