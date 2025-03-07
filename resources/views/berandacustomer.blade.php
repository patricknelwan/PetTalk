@extends('layout.layoutadmin')

@section('content')
<section class="py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
    <div class="container">
    <!-- Search Section -->
    <div class="card border-0 shadow-lg mb-5" 
         style="border-radius: 15px;"
         data-aos="fade-down" 
         data-aos-delay="200">
        <div class="card-body p-4">
            <form action="{{ url('/blogs') }}" method="GET" class="d-flex gap-3">
                <div class="input-group" data-aos="fade-right" data-aos-delay="300">
                    <span class="input-group-text border-0" style="background: rgba(114, 4, 85, 0.05);">
                        <i class="ri-search-line" style="color: #720455;"></i>
                    </span>
                    <input type="text" 
                           name="search" 
                           class="form-control form-control-lg" 
                           placeholder="Cari blog yang Anda inginkan..." 
                           value="{{ request('search') }}"
                           style="border: 2px solid rgba(114, 4, 85, 0.2); border-radius: 0 10px 10px 0;">
                </div>
                <button type="submit" 
                        class="btn btn-lg px-4"
                        data-aos="fade-left" 
                        data-aos-delay="400"
                        style="background: linear-gradient(45deg, #720455, #9c1076); color: white; border-radius: 10px;">
                    <i class="ri-search-line me-2"></i>Cari
                </button>
            </form>
        </div>
    </div>

    @if($blogs->count() > 0)
        <div class="row g-4">
            @foreach ($blogs as $blog)
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <div class="card h-100 border-0 shadow-lg" 
                         style="border-radius: 15px; transition: all 0.3s ease;">
                        <div class="position-relative">
                            <img src="{{ asset('storage/image_blog/' . $blog->images) }}" 
                                 class="card-img-top" 
                                 alt="{{ $blog->title }}"
                                 data-aos="zoom-in"
                                 data-aos-delay="{{ $loop->iteration * 150 }}"
                                 style="height: 200px; object-fit: cover; border-radius: 15px 15px 0 0;">
                            <div class="position-absolute bottom-0 start-0 w-100 p-3" 
                                 style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);"
                                 data-aos="fade-up"
                                 data-aos-delay="{{ $loop->iteration * 200 }}">
                                <h5 class="card-title text-white mb-0">{{ $blog->title }}</h5>
                            </div>
                        </div>
                        
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3"
                                 data-aos="fade-up"
                                 data-aos-delay="{{ $loop->iteration * 250 }}">
                                <i class="ri-user-line me-2" style="color: #720455;"></i>
                                <span class="text-muted">{{ $blog->author }}</span>
                            </div>
                            
                            <p class="card-text"
                               data-aos="fade-up"
                               data-aos-delay="{{ $loop->iteration * 300 }}"
                               style="color: #666; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ Str::words($blog->description, 20) }}
                            </p>
                            
                            <a href="{{ url('/blog-guest/' . $blog->id) }}"
                               class="btn w-100 mt-3"
                               data-aos="fade-up"
                               data-aos-delay="{{ $loop->iteration * 350 }}"
                               style="background: #720455; color: white;">
                                <i class="ri-book-read-line me-2"></i>Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="card border-0 shadow-lg text-center py-5" 
             style="border-radius: 15px;"
             data-aos="fade-up"
             data-aos-delay="200">
            <div class="card-body">
                <i class="ri-error-warning-line mb-3" style="font-size: 3rem; color: #720455;"></i>
                <h4 style="color: #720455;">Tidak Ada Hasil</h4>
                <p class="text-muted mb-0">
                    Maaf, tidak ada hasil untuk pencarian "{{ request('search') }}".
                </p>
            </div>
        </div>
    @endif
</div>
</section>

<style>
.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(114, 4, 85, 0.1) !important;
}

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
</style>
@endsection