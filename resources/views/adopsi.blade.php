@extends('layout.layoutadmin')
@section('content')
<section id="adoption-section" style="background-color: #f8f9fa; padding: 3rem 0;">
  <div class="container">
    <div class="text-center mb-4" data-aos="fade-down" data-aos-duration="800">
        <h2 style="color: #720455; font-size: 2.5rem; font-weight: 700; margin-bottom: 1.5rem;">Adopt Animals</h2>
        
        <form action="/adopsi" method="post" data-aos="fade-up" data-aos-delay="100">
            @csrf
            <div class="input-group w-75 mx-auto">
                <input type="text" class="form-control" 
                       style="border: 2px solid #720455; border-radius: 25px 0 0 25px; padding: 12px 20px;" 
                       placeholder="Search Animals..." name="Query">
                <button type="submit" class="btn" 
                        style="background-color: #720455; color: white; border-radius: 0 25px 25px 0; padding: 0 25px;">
                    <i class="ri-search-line"></i>
                </button>
            </div>
        </form>
    </div>
     <div class="text-center mt-5 mb-5" data-aos="fade-up" data-aos-delay="200">
        <a href="/buatadopsi/" 
           class="btn btn-lg"
           style="background-color: #720455; color: white; border-radius: 25px; padding: 12px 30px; font-weight: 600;">
            <i class="ri-add-line"></i> Create New Adoptions
        </a>
    </div>

    <!-- Animal Cards -->
    <div class="row">
      @if(isset($animaltable) && count($animaltable) > 0)
        @foreach($animaltable as $animal)
        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 50 }}">
            <div class="card h-100 shadow-lg border-0" style="
                border-radius: 15px; 
                overflow: hidden;
                transition: all 0.3s ease-in-out;
                transform: translateY(0);
                &:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 10px 20px rgba(114, 4, 85, 0.25) !important;
                }">
                
                <div class="position-relative">
                    <img class="card-img-top" 
                         src="{{ asset('storage/adopsiimages/' . $animal->image) }}" 
                         alt="{{ $animal->name }}" 
                         style="height: 250px; width: 100%; object-fit: cover;">
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge" 
                              style="background: rgba(114, 4, 85, 0.9); 
                                     backdrop-filter: blur(5px);
                                     padding: 8px 12px;">
                            {{ $animal->breed }}
                        </span>
                    </div>
                </div>

                <div class="card-body d-flex flex-column" style="height: 300px;">
                    <h5 class="card-title mb-2" style="color: #720455;">{{ $animal->name }}</h5>
                    
                    <div class="mb-2">
                        <span class="badge" 
                              style="background: rgba(114, 4, 85, 0.1); 
                                     color: #720455;
                                     padding: 6px 12px;">
                            <i class="ri-calendar-line me-1"></i>{{ $animal->age }} tahun
                        </span>
                    </div>
                    
                    <p class="card-text flex-grow-1" style="
                        overflow: hidden;
                        display: -webkit-box;
                        -webkit-line-clamp: 4;
                        -webkit-box-orient: vertical;">
                        {{ Str::limit($animal->description, 200) }}
                    </p>

                    <div class="mt-auto d-flex gap-2">      
                        @if(Auth::user()->id == $animal->creatorid || Auth::user()->role == 'admin')
                            <a href="{{ route('adopsi.edit', ['id' => $animal->id]) }}" 
                               class="btn btn-warning flex-grow-1"
                               style="transition: all 0.3s ease;">
                                <i class="ri-edit-line"></i>
                            </a>
                            <a href="/deleteadopsi/{{ $animal->id }}" 
                               class="btn btn-danger flex-grow-1"
                               style="transition: all 0.3s ease;"
                               onclick="confirmDelete(event, this.href)">
                                <i class="ri-delete-bin-line"></i>
                            </a>
                        @else
                            <a href="/Form_Adopsi/{{ $animal->id }}" 
                               class="btn flex-grow-1"
                               style="background: #720455; color: white; transition: all 0.3s ease;">
                                <i class="ri-heart-fill me-1"></i>Adopsi
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
      @else
      <div class="card shadow-sm text-center py-5" 
           data-aos="fade-up"
           style="border-radius: 15px; border: none; background-color: #fff;">
            <div class="card-body">
                <div style="color: #720455; font-size: 4rem; margin-bottom: 1rem;">
                    <i class="ri-discuss-line"></i>
                </div>
                <h3 style="color: #720455; font-weight: 600; margin-bottom: 1rem;">
                    No Adoptions Found
                </h3>
                <p style="color: #666; font-size: 1.1rem; margin-bottom: 2rem;">
                    There are no forum Adoptions available at the moment.
                </p>
                <p style="color: #666; font-size: 1rem;">
                    Start a new discussion by clicking the 'Create New Adoptions' button above!
                </p>
            </div>
        </div>
      @endif
    </div>
  </div>

  @if(isset($animaltable) && count($animaltable) > 0)
        <div class="d-flex justify-content-center my-4" data-aos="fade-up" data-aos-delay="100">
            {{ $animaltable->links() }}
        </div>
    @endif
</section>

<style>
.page-link {
    color: #720455;
}

.page-item.active .page-link {
    background-color: #720455;
    border-color: #720455;
}

.form-control:focus {
    border-color: #720455;
    box-shadow: 0 0 0 0.2rem rgba(114, 4, 85, 0.2);
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