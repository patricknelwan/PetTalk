@extends('layout.layoutadmin')
@section('content')
<section class="py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Profile Card -->
                <div class="card border-0 shadow-lg mb-5" style="border-radius: 15px;">
                    
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="profile-avatar me-4">
                                @if(Auth::user())
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=910a67&color=fff" 
                                         class="rounded-circle" 
                                         style="width: 80px; height: 80px;" 
                                         alt="Profile Picture">
                                @endif
                            </div>
                            <div>
                                <h2 class="mb-1" style="color: #910a67;">Profil Saya</h2>
                                <p class="text-muted mb-0">Detail Informasi Akun</p>
                            </div>
                        </div>

                        @if(Auth::user())
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="profile-info-card p-3" style="background: rgba(145, 10, 103, 0.05); border-radius: 10px;">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="ri-user-line me-2" style="color: #910a67;"></i>
                                            <span class="text-muted">ID Pengguna</span>
                                        </div>
                                        <p class="mb-0 fw-bold">{{ Auth::user()->id }}</p>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="profile-info-card p-3" style="background: rgba(145, 10, 103, 0.05); border-radius: 10px;">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="ri-user-smile-line me-2" style="color: #910a67;"></i>
                                            <span class="text-muted">Nama</span>
                                        </div>
                                        <p class="mb-0 fw-bold">{{ Auth::user()->name }}</p>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="profile-info-card p-3" style="background: rgba(145, 10, 103, 0.05); border-radius: 10px;">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="ri-mail-line me-2" style="color: #910a67;"></i>
                                            <span class="text-muted">Email</span>
                                        </div>
                                        <p class="mb-0 fw-bold">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="profile-info-card p-3" style="background: rgba(145, 10, 103, 0.05); border-radius: 10px;">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="ri-phone-line me-2" style="color: #910a67;"></i>
                                            <span class="text-muted">Telepon</span>
                                        </div>
                                        <p class="mb-0 fw-bold">{{ Auth::user()->phone }}</p>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="profile-info-card p-3" style="background: rgba(145, 10, 103, 0.05); border-radius: 10px;">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="ri-map-pin-line me-2" style="color: #910a67;"></i>
                                            <span class="text-muted">Alamat</span>
                                        </div>
                                        <p class="mb-0 fw-bold">{{ Auth::user()->address }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

    <div class="card border-0 shadow-lg position-relative overflow-hidden" style="border-radius: 15px;">
    <!-- Decorative Elements -->
<div class="position-absolute" 
     data-aos="fade-down-left" 
     data-aos-duration="1000"
     style="top: -50px; right: -50px; width: 100px; height: 100px; background: linear-gradient(45deg, #910a67, #c01a8f); border-radius: 50%; opacity: 0.1;">
</div>

<div class="position-absolute" 
     data-aos="fade-up-right" 
     data-aos-duration="1000"
     data-aos-delay="200"
     style="bottom: -30px; left: -30px; width: 80px; height: 80px; background: linear-gradient(45deg, #910a67, #c01a8f); border-radius: 50%; opacity: 0.1;">
</div>

<div class="card-body p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0" 
            data-aos="fade-right" 
            data-aos-delay="300"
            style="color: #910a67;">
            <i class="ri-heart-2-line me-2"></i>Daftar Adopsi
        </h3>
        <span class="badge rounded-pill px-3 py-2" 
              data-aos="fade-left" 
              data-aos-delay="400"
              style="background: rgba(145, 10, 103, 0.1); color: #910a67;">
            <i class="ri-paw-print-line me-1"></i>
            {{ isset($central) ? count($central) : 0 }} Hewan
        </span>
    </div>


        @if(isset($central))
           <div class="row g-4" data-aos="fade-up" data-aos-duration="800">
    @foreach($central as $animal)
        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
            <div class="adoption-card h-100 border-0 shadow-sm" 
                 style="border-radius: 15px; transition: all 0.3s ease;"
                 data-aos="zoom-in" 
                 data-aos-delay="{{ $loop->iteration * 150 }}">
                <div class="position-relative">
                    <img src="{{ asset('storage/adopsiimages/'.$animal->image) }}" 
                         class="card-img-top" 
                         style="height: 200px; object-fit: cover; border-radius: 15px 15px 0 0;" 
                         alt="{{ $animal->name }}"
                         data-aos="fade-in" 
                         data-aos-delay="{{ $loop->iteration * 200 }}">
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge" 
                              style="background: rgba(145, 10, 103, 0.9); backdrop-filter: blur(5px);"
                              data-aos="fade-left" 
                              data-aos-delay="{{ $loop->iteration * 250 }}">
                            {{ $animal->breed }}
                        </span>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    <h5 class="card-title mb-3" 
                        style="color: #910a67;"
                        data-aos="fade-up" 
                        data-aos-delay="{{ $loop->iteration * 300 }}">
                        {{ $animal->name }}
                    </h5>
                    
                    <div class="d-flex align-items-center mb-3"
                         data-aos="fade-up" 
                         data-aos-delay="{{ $loop->iteration * 350 }}">
                        <div class="pet-info-item me-4">
                            <i class="ri-calendar-line me-2" style="color: #910a67;"></i>
                            <span>{{ $animal->age }} tahun</span>
                        </div>
                    </div>
                    
                    <p class="card-text text-muted mb-4"
                       data-aos="fade-up" 
                       data-aos-delay="{{ $loop->iteration * 400 }}">
                        {{ $animal->description }}
                    </p>
                    
                    <button class="btn w-100 adopt-btn" 
                            style="background: linear-gradient(45deg, #910a67, #c01a8f); color: white; border-radius: 10px;"
                            data-aos="fade-up" 
                            data-aos-delay="{{ $loop->iteration * 450 }}">
                        <i class="ri-heart-fill me-2"></i>Sudah Di Adopsi
                    </button>
                </div>
            </div>
        </div>
    @endforeach
</div>
        @else
            <div class="text-center py-5">
                <i class="ri-emotion-sad-line display-4" style="color: #910a67;"></i>
                <p class="mt-3 text-muted">Belum ada hewan untuk diadopsi saat ini</p>
            </div>
        @endif
    </div>
</div>

<style>
.adoption-card {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    background: white;
}

.adoption-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(145, 10, 103, 0.1) !important;
}

.pet-info-item {
    padding: 5px 12px;
    background: rgba(145, 10, 103, 0.05);
    border-radius: 20px;
    font-size: 0.9rem;
}

.adopt-btn {
    transition: all 0.3s ease;
    border: none;
}

.adopt-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(145, 10, 103, 0.3);
}

.badge {
    padding: 8px 12px;
    font-weight: 500;
}
</style>
        </div>
    </div>
</section>

<style>
.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-10px);
}

.profile-info-card {
    transition: all 0.3s ease;
}

.profile-info-card:hover {
    background: rgba(145, 10, 103, 0.2) !important;
}

.btn {
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(145, 10, 103, 0.2);
}

/* Custom Pagination Styling */
.pagination {
    gap: 5px;
}

.page-link {
    border: none;
    color: #910a67;
    padding: 8px 16px;
    border-radius: 8px;
}

.page-item.active .page-link {
    background: #910a67;
    color: white;
}

.page-link:hover {
    background: rgba(145, 10, 103, 0.1);
    color: #910a67;
}
</style>
@endsection