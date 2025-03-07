@extends('layout.layoutadmin')

@section('content')
<section class="py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
    <div class="container">
        <div class="card border-0 shadow-lg position-relative overflow-hidden" style="border-radius: 15px;">
            <!-- Decorative Elements -->
            <div class="position-absolute" style="top: -50px; right: -50px; width: 100px; height: 100px; background: linear-gradient(45deg, #720455, #9c1076); border-radius: 50%; opacity: 0.1;"></div>
            <div class="position-absolute" style="bottom: -30px; left: -30px; width: 80px; height: 80px; background: linear-gradient(45deg, #720455, #9c1076); border-radius: 50%; opacity: 0.1;"></div>

            <div class="card-body p-4">
                <!-- Header -->
                <div class="d-flex align-items-center mb-4">
                    <div class="icon-wrapper me-3">
                        <i class="ri-heart-2-line" style="color: #720455; font-size: 1.5rem;"></i>
                    </div>
                    <div>
                        <h2 class="mb-1" style="color: #720455;">Edit Data Adopsi</h2>
                        <p class="text-muted mb-0">Perbarui informasi hewan adopsi</p>
                    </div>
                </div>

                <form id="myForm" action="/editadopsi/{{ $adopsi->id }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row g-4">
        <!-- Pet Name -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label fw-bold" style="color: #720455;">
                    <i class="ri-user-heart-line me-2"></i>Nama Hewan
                </label>
                <input type="text" 
                       class="form-control form-control-lg @error('name') is-invalid @enderror" 
                       name="name" 
                       value="{{ old('name', $adopsi->name) }}"
                       style="border: 2px solid rgba(114, 4, 85, 0.2); border-radius: 10px;">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Pet Age -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label fw-bold" style="color: #720455;">
                    <i class="ri-calendar-line me-2"></i>Umur
                </label>
                <input type="text" 
                       class="form-control form-control-lg @error('age') is-invalid @enderror" 
                       name="age" 
                       value="{{ old('age', $adopsi->age) }}"
                       style="border: 2px solid rgba(114, 4, 85, 0.2); border-radius: 10px;">
                @error('age')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Pet Breed -->
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label fw-bold" style="color: #720455;">
                    <i class="ri-service-line me-2"></i>Jenis/Breed
                </label>
                <input type="text" 
                       class="form-control form-control-lg @error('breed') is-invalid @enderror" 
                       name="breed" 
                       value="{{ old('breed', $adopsi->breed) }}"
                       style="border: 2px solid rgba(114, 4, 85, 0.2); border-radius: 10px;">
                @error('breed')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Description -->
        <div class="col-12">
            <div class="form-group">
                <label class="form-label fw-bold" style="color: #720455;">
                    <i class="ri-file-text-line me-2"></i>Deskripsi
                </label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          name="description" 
                          rows="4"
                          style="border: 2px solid rgba(114, 4, 85, 0.2); border-radius: 10px;">{{ old('description', $adopsi->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Image Upload -->
        <div class="col-12">
            <div class="form-group">
                <label class="form-label fw-bold" style="color: #720455;">
                    <i class="ri-image-line me-2"></i>Gambar
                </label>
                @if($adopsi->image)
                    <div class="mb-3 p-3" style="background: rgba(114, 4, 85, 0.03); border-radius: 10px;">
                        <p class="text-muted mb-2">Gambar saat ini:</p>
                        <img src="{{ asset('storage/adopsiimages/' . $adopsi->image) }}" 
                             alt="{{ $adopsi->name }}" 
                             class="rounded"
                             style="max-width: 200px;">
                    </div>
                @endif
                <input type="file" 
                       class="form-control @error('image') is-invalid @enderror" 
                       name="image"
                       accept=".jpg,.jpeg,.png"
                       style="border: 2px solid rgba(114, 4, 85, 0.2); border-radius: 10px;">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Buttons -->
        <div class="col-12">
            <div class="d-flex justify-content-end gap-2">
                <!-- Back Button -->
                <a href="/adopsi" 
                   class="btn btn-light px-4">
                    <i class="ri-arrow-left-line me-2"></i>Kembali
                </a>

                <!-- Submit Button with SweetAlert Confirmation -->
                <button type="button"
                        onclick="confirmSubmit(event)"
                        style="
                            background: linear-gradient(45deg, #720455, #9c1076); 
                            color: white;" 
                        class="btn px-4">
                    <i class="ri-save-line me-2"></i>Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</form>

<!-- SweetAlert Script -->
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
@endsection