@extends('layout.layoutadmin')

@section('content')
<section class="py-5 contact-section">
    <div class="container">
        <h3 class="mb-4 text-center section-title" data-aos="fade-down" data-aos-delay="100">
            <i class="ri-mail-line me-2"></i>Pesan Kontak
        </h3>

        @foreach ($contacts as $contact)
        <div class="card shadow-lg mb-4 border-0 message-card" 
             data-aos="fade-up" 
             data-aos-delay="{{ $loop->iteration * 50 }}">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <div class="d-flex align-items-center">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($contact->first_name . ' ' . $contact->last_name) }}&background=720455&color=fff" 
                             class="rounded-circle me-2 profile-image" 
                             alt="Profile"
                             data-aos="zoom-in"
                             data-aos-delay="{{ $loop->iteration * 75 }}">
                        <div data-aos="fade-left" data-aos-delay="{{ $loop->iteration * 75 }}">
                            <strong>{{ $contact->first_name }} {{ $contact->last_name }}</strong>
                            <div class="text-light opacity-75">{{ $contact->email }}</div>
                        </div>
                    </div>
                </div>
                <div class="text-end" data-aos="fade-left" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <small class="text-light opacity-75">
                        <i class="ri-time-line me-1"></i>
                        {{ $contact->created_at->format('d M Y, H:i') }}
                    </small>
                </div>
            </div>
            
            <div class="card-body p-4">
                <p class="message-text" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    {{ $contact->message }}
                </p>

                <form id="myForm" 
      action="{{ route('delete-contact', $contact->id) }}" 
      method="POST" 
      class="d-inline" 
       onclick="confirmSubmit(event)">
    @csrf
    <button type="submit" 
            class="btn btn-danger btn-sm px-3 delete-btn"
            data-aos="fade-up" 
            data-aos-delay="{{ $loop->iteration * 125 }}">
        <i class="ri-delete-bin-line me-1"></i>
        Hapus Pesan
    </button>
</form>

            </div>
        </div>
        @endforeach
    </div>
</section>
<script>
    function confirmSubmit(event) {
        event.preventDefault(); // Mencegah form langsung disubmit

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Ingin Menghapus Pesan ini",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form jika pengguna mengonfirmasi
                document.getElementById("myForm").submit();
            }
        });
    }
</script>
<style>
    .contact-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    position: relative;
    overflow: hidden;
}

.section-title {
    color: #720455;
    font-weight: 600;
    position: relative;
    margin-bottom: 2rem;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 50px;
    height: 3px;
    background: linear-gradient(45deg, #720455, #9c1076);
    border-radius: 3px;
}

.message-card {
    border-radius: 15px;
    transition: all 0.3s ease;
    overflow: hidden;
}

.message-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
}

.card-header {
    background: linear-gradient(45deg, #720455, #9c1076);
    color: white;
    border-radius: 15px 15px 0 0;
    padding: 1rem 1.5rem;
}

.profile-image {
    width: 40px;
    height: 40px;
    border: 2px solid rgba(255,255,255,0.2);
    transition: all 0.3s ease;
}

.profile-image:hover {
    transform: scale(1.1);
}

.message-text {
    font-size: 1.1rem;
    line-height: 1.6;
    color: #444;
    position: relative;
    padding-left: 1rem;
    border-left: 3px solid #720455;
    margin-left: 1rem;
}

.delete-btn {
    border-radius: 50px;
    transition: all 0.3s ease;
    background: linear-gradient(45deg, #dc3545, #ff4d4d);
    border: none;
    box-shadow: 0 2px 5px rgba(220, 53, 69, 0.2);
}

.delete-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
    background: linear-gradient(45deg, #ff4d4d, #dc3545);
}

@media (max-width: 768px) {
    .message-text {
        font-size: 1rem;
        padding-left: 0.5rem;
        margin-left: 0.5rem;
    }
    
    .card-header {
        flex-direction: column;
        gap: 0.5rem;
    }
}
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(114, 4, 85, 0.25) !important;
}

.btn:hover {
    opacity: 0.9;
}

.form-control:focus {
    border-color: #720455;
    box-shadow: 0 0 0 0.2rem rgba(114, 4, 85, 0.2);
}

/* Custom pagination colors */
.page-link {
    color: #720455;
}

.page-item.active .page-link {
    background-color: #720455;
    border-color: #720455;
}

/* Animation for empty state */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.card {
    animation: fadeIn 0.5s ease-out;
}
</style>
@endsection