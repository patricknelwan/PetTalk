{{-- @if (Auth::user()->role == "admin")
    @extends('layout.layoutadmin')
@elseif (Auth::user()->role == "customer")
    @extends('layout.layoutcustomer')
@endif --}}
@extends('layout.layoutadmin')
@section('content')
<div class="container py-4">
    <!-- Search Section -->
    <div class="text-center mb-4" data-aos="fade-down" data-aos-duration="800">
        <h2 style="color: #720455; font-size: 2.5rem; font-weight: 700; margin-bottom: 1.5rem;">
            Forum Discussions
        </h2>
        <form action="/forums" method="post" data-aos="fade-up" data-aos-delay="100">
            @csrf
            <div class="input-group w-75 mx-auto">
                <input type="text" class="form-control" 
                       style="border: 2px solid #720455; border-radius: 25px 0 0 25px; padding: 12px 20px;" 
                       placeholder="Search discussions..." name="Query">
                <button type="submit" class="btn" 
                        style="background-color: #720455; color: white; border-radius: 0 25px 25px 0; padding: 0 25px;">
                    <i class="ri-search-line"></i>
                </button>
            </div>
        </form>
    </div>

    <div class="text-center mt-5 mb-5" data-aos="fade-up" data-aos-delay="200">
        <a href="/createforum" 
           class="btn btn-lg"
           style="background-color: #720455; color: white; border-radius: 25px; padding: 12px 30px; font-weight: 600;">
            <i class="ri-add-line"></i> Create New Discussion
        </a>
    </div>

    <!-- Forum Posts -->
    @if(isset($forums) && count($forums) > 0)
        @foreach($forums as $forum)
        <div class="card mb-4 border-0 shadow-lg position-relative overflow-hidden" 
             data-aos="fade-up" 
             data-aos-delay="{{ $loop->iteration * 50 }}"
             style="border-radius: 20px; transform: translateY(0); transition: all 0.3s ease;">
            
            <!-- Decorative Elements -->
            <div class="position-absolute" 
                 style="top: -30px; right: -30px; width: 80px; height: 80px; 
                        background: linear-gradient(45deg, #720455, #9c1076); 
                        border-radius: 50%; opacity: 0.1;"></div>
            
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-{{ $forum->ForumImage ? '8' : '12' }}">
                        <!-- Forum Header -->
                        <div class="d-flex align-items-center mb-3" data-aos="fade-right" data-aos-delay="{{ $loop->iteration * 75 }}">
                            <div class="me-3">
                                <div class="icon-wrapper">
                                    <i class="ri-discuss-line" style="color: #720455; font-size: 1.5rem;"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="mb-1" style="color: #720455; font-weight: 600;">
                                    {{ $forum->ForumTitle }}
                                </h3>
                                <div class="d-flex align-items-center">
                                    <i class="ri-time-line me-2" style="color: #720455;"></i>
                                    <small class="text-muted">{{ $forum->CreatedAt }}</small>
                                </div>
                            </div>
                        </div>

                        <!-- Forum Content -->
                        <div class="forum-content mb-4" 
                             data-aos="fade-up" 
                             data-aos-delay="{{ $loop->iteration * 100 }}"
                             style="color: #444; line-height: 1.8; font-size: 1.1rem;">
                            {{ Str::limit($forum->ForumContent, 300) }}
                        </div>
                    </div>

                    @if($forum->ForumImage && Storage::exists('public/forumimages/' . $forum->ForumImage))
                        <div class="col-4" data-aos="fade-left" data-aos-delay="{{ $loop->iteration * 125 }}">
                            <div class="position-relative h-100">
                                <img src="{{ asset('storage/forumimages/' . $forum->ForumImage) }}" 
                                     class="img-fluid rounded-3 h-100 w-100" 
                                     style="object-fit: cover; max-height: 250px;"
                                     alt="Forum Image">
                                <div class="image-overlay"></div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-between align-items-center mt-3" 
                     data-aos="fade-up" 
                     data-aos-delay="{{ $loop->iteration * 150 }}">
                    <div class="d-flex align-items-center">
                        <span class="badge rounded-pill px-3 py-2" 
                              style="background: rgba(114, 4, 85, 0.1); color: #720455;">
                            <i class="ri-message-3-line me-1"></i>Discussion
                        </span>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <a href="/forumpost/{{ $forum->ForumID }}" 
                           class="btn action-btn read-more"
                           style="background: #720455; color: white; border-radius: 20px; padding: 8px 20px;">
                            <i class="ri-book-open-line me-2"></i>Read More
                        </a>
                        
                        @if($forum->ForumCreator == Auth::user()->id || Auth::user()->role == "admin")
                            <a href="/deleteforum/{{ $forum->ForumID }}" 
                               onclick="confirmDelete(event, this.href)"
                               class="btn action-btn delete"
                               style="background: #dc3545; color: white; border-radius: 20px; padding: 8px 20px;">
                                <i class="ri-delete-bin-line me-2"></i>Delete
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
</div>
    @else
        <div class="card shadow-sm text-center py-5" 
             style="border-radius: 15px; border: none; background-color: #fff;">
            <div class="card-body">
                <div style="color: #720455; font-size: 4rem; margin-bottom: 1rem;">
                    <i class="ri-discuss-line"></i>
                </div>
                <h3 style="color: #720455; font-weight: 600; margin-bottom: 1rem;">
                    No Discussions Found
                </h3>
                <p style="color: #666; font-size: 1.1rem; margin-bottom: 2rem;">
                    There are no forum discussions available at the moment.
                </p>
                <p style="color: #666; font-size: 1rem;">
                    Start a new discussion by clicking the 'Create New Discussion' button above!
                </p>
            </div>
        </div>
    @endif

    <!-- Pagination -->
    @if(isset($forums) && count($forums) > 0)
        <div class="d-flex justify-content-center my-4">
            {{ $forums->links() }}
        </div>
    @endif
</div>

<style>
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
<style>
.card:hover {
    transform: translateY(-5px) !important;
    box-shadow: 0 15px 30px rgba(114, 4, 85, 0.1) !important;
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

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(180deg, transparent, rgba(114, 4, 85, 0.05));
    border-radius: 12px;
}

.action-btn {
    padding: 8px 20px;
    border-radius: 50px;
    transition: all 0.3s ease;
    font-weight: 500;
}

.action-btn.read-more {
    background: linear-gradient(45deg, #720455, #9c1076);
    color: white;
}

.action-btn.delete {
    background: #dc3545;
    color: white;
}

.action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(114, 4, 85, 0.2);
}

.forum-content {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
<script>
                        function confirmDelete(event, url) {
                            event.preventDefault(); // Mencegah link langsung dijalankan

                            Swal.fire({
                                title: 'Apakah Anda yakin?',
                                    text: "Ingin Mengapus Hewan ini",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Ya, Hapus!',
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