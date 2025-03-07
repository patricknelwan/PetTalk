 @extends('layout.layoutadmin')
@section('content')
<section class="py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1 class="text-center mb-5" style="color: #720455; font-weight: 600;">
                    <i class="ri-heart-2-fill me-2"></i>Konfirmasi Adopsi
                </h1>

                <div class="row">
                    <!-- Pet Details Card -->
                    @if(isset($hewan))
                    <div class="col-lg-5 mb-4">
                        <div class="card border-0 shadow-lg h-100" style="border-radius: 15px;">
                            <img src="{{ asset('/storage/adopsiimages/'.$hewan->image) }}" 
                                 class="card-img-top" 
                                 style="height: 300px; object-fit: cover; border-top-left-radius: 15px; border-top-right-radius: 15px;" 
                                 alt="{{ $hewan->name }}">
                            
                            <div class="card-body p-4">
                                <h3 class="card-title" style="color: #720455;">{{ $hewan->name }}</h3>
                                
                                <div class="pet-details mt-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="ri-calendar-line me-3" style="color: #720455; font-size: 1.2rem;"></i>
                                        <span>Umur: {{ $hewan->age }} tahun</span>
                                    </div>
                                    
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="ri-service-line me-3" style="color: #720455; font-size: 1.2rem;"></i>
                                        <span>Jenis: {{ $hewan->breed }}</span>
                                    </div>
                                    
                                    <div class="d-flex align-items-center">
                                        <i class="ri-file-text-line me-3" style="color: #720455; font-size: 1.2rem;"></i>
                                        <span>{{ $hewan->description }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Adoption Form -->
                    <div class="col-lg-7">
                        <div class="card border-0 shadow-lg" style="border-radius: 15px;">
                            <div class="card-body p-4">
                                <h4 class="card-title mb-4" style="color: #720455;">
                                    <i class="ri-form-line me-2"></i>Form Pengajuan Adopsi
                                </h4>

                                <form action="/profiladopsi/" method="post" class="needs-validation" novalidate>
                                    @csrf
                                    @if(isset($hewan))
                                        <input type="hidden" name="adopsiid" value="{{ $hewan->id }}">
                                    @endif

                                    <!-- Delivery Option -->
                                    <div class="mb-4">
                                        <label class="form-label fw-bold" style="color: #720455;">
                                            <i class="ri-truck-line me-2"></i>Opsi Pengiriman
                                        </label>
                                        <select class="form-select form-select-lg" 
                                                name="transport" 
                                                required
                                                style="border: 2px solid rgba(114, 4, 85, 0.2); border-radius: 10px; padding: 12px;">
                                            <option value="" selected disabled>Pilih metode pengiriman</option>
                                            <option value="GOJEK">GOJEK</option>
                                            <option value="GRAB">GRAB</option>
                                            <option value="Other">Lainnya</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Silakan pilih opsi pengiriman
                                        </div>
                                    </div>

                                    <!-- Message -->
                                    <div class="mb-4">
                                        <label class="form-label fw-bold" style="color: #720455;">
                                            <i class="ri-message-3-line me-2"></i>Pesan
                                        </label>
                                        <textarea class="form-control" 
                                                  name="message" 
                                                  rows="5" 
                                                  placeholder="Tuliskan detail tambahan atau pertanyaan Anda..."
                                                  required
                                                  style="border: 2px solid rgba(114, 4, 85, 0.2); border-radius: 10px; padding: 12px;"></textarea>
                                        <div class="invalid-feedback">
                                            Pesan tidak boleh kosong
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" 
                                    onclick="confirmSubmit(event)"
                                            class="btn btn-lg w-100" 
                                            style="background: linear-gradient(45deg, #720455, #9c1076); color: white; border-radius: 10px;">
                                        <i class="ri-heart-fill me-2"></i>
                                        Ajukan Adopsi
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.form-select:focus,
.form-control:focus {
    border-color: #720455;
    box-shadow: 0 0 0 0.2rem rgba(114, 4, 85, 0.25);
}

.btn {
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(114, 4, 85, 0.2);
}

.card {
    transition: all 0.3s ease;
}

.pet-details {
    color: #666;
}
</style>

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
    function confirmSubmit(event) {
        event.preventDefault(); // Mencegah form langsung disubmit

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Ingin Mengadopsi Hewan ini",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Adopsi!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form jika pengguna mengonfirmasi
                document.getElementById("myForm").submit();
            }
        });
    }
// Input field animations
const inputs = document.querySelectorAll('.form-control, .form-select');
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