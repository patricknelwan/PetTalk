@extends('layout.layoutadmin')
@section('content')

<div class="container py-5">
    <!-- Forum Content -->
    @if(isset($forum) && count($forum) > 0)
        @foreach($forum as $foru)
        <div class="card shadow-lg mb-4" style="border-radius: 15px; border: none;">
            <div class="card-body p-4">
                <!-- Forum Header -->
                <div class="mb-4">
                    <h1 class="display-6 fw-bold" style="color: #720455;">{{ $foru->ForumTitle }}</h1>
                    @if(isset($creator))
                        <div class="d-flex align-items-center">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($creator->name) }}&background=720455&color=fff" 
                                 class="rounded-circle me-2" 
                                 style="width: 30px; height: 30px;" 
                                 alt="Profile">
                            <span class="text-muted">Dibuat oleh <strong>{{ $creator->name }}</strong></span>
                        </div>
                    @endif
                </div>

                <!-- Forum Image -->
                @if(!empty($foru->ForumImage))
                    <div class="mb-4">
                        <img src="{{ asset('storage/forumimages/'.$foru->ForumImage) }}" 
                             class="img-fluid rounded" 
                             style="width: 100%; max-height: 500px; object-fit: cover;" 
                             alt="Forum Image">
                    </div>
                @endif

                <!-- Forum Content -->
                <div class="forum-content mb-4" style="font-size: 1.1rem; line-height: 1.8;">
                    {{ $foru->ForumContent }}
                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="/forums" class="btn btn-outline-secondary px-4">
                        <i class="ri-arrow-left-line me-2"></i>Kembali
                    </a>
                    <button onclick="commentbtn()" class="btn px-4" 
                            style="background: #720455; color: white;">
                        <i class="ri-chat-3-line me-2"></i>Komentar
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <p>Forum tidak ditemukan.</p>
    @endif

    <!-- Comments Section -->
    @if(isset($forumposts) && count($forumposts) > 0)
        <div class="card shadow mb-4" style="border-radius: 15px; border: none;">
            <div class="card-body p-4">
                <h4 class="mb-4" style="color: #720455;">
                    <i class="ri-chat-3-line me-2"></i>Komentar
                </h4>
                @foreach($forumposts as $forump)
                    <div class="d-flex mb-4">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($forump->username) }}&background=720455&color=fff" 
                             class="rounded-circle me-3" 
                             style="width: 40px; height: 40px;" 
                             alt="Profile">
                        <div class="flex-grow-1">
                            <h6 class="mb-1">{{ $forump->username }}</h6>
                            <p class="mb-0">{{ $forump->commentcontent }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p>Tidak ada komentar.</p>
    @endif

    <!-- Comment Form -->
    <div id="comment" style="display: none;">
        @if(Auth::check())
            <?php $currentuser = Auth::user(); ?>
            <div class="card shadow" style="border-radius: 15px; border: none;">
                <div class="card-body p-4">
                    <h5 class="mb-4" style="color: #720455;">
                        <i class="ri-edit-line me-2"></i>Tambahkan Komentar
                    </h5>
                    
                    <form action="/forumpost/{{ $forumid }}" method="post">
                        @csrf
                        <input type="hidden" value="{{ $forumid }}" name="ForumID">
                        <input type="hidden" name="username" value="{{ $currentuser->name }}">
                        <input type="hidden" name="userid" value="{{ $currentuser->id }}">
                        
                        <div class="mb-3">
                            <textarea class="form-control" 
                                      id="forumcontent" 
                                      name="commentcontent" 
                                      rows="4" 
                                      placeholder="Tulis komentar Anda di sini..."
                                      style="border: 2px solid rgba(114, 4, 85, 0.2); border-radius: 10px;"></textarea>
                        </div>
                        
                        <button type="submit" 
                                class="btn px-4 py-2" 
                                style="background: #720455; color: white;">
                            <i class="ri-send-plane-fill me-2"></i>Kirim Komentar
                        </button>
                    </form>
                </div>
            </div>
        @else
            <p>Silakan login untuk menambahkan komentar.</p>
        @endif
    </div>
</div>

@endsection

<script>
// Toggle the comment section visibility
function commentbtn() {
    const commentSection = document.getElementById("comment");
    if (commentSection.style.display === "none" || commentSection.style.display === "") {
        commentSection.style.display = "block";
        commentSection.scrollIntoView({ behavior: 'smooth' });
    } else {
        commentSection.style.display = "none";
    }
}

// Ensure smooth transitions for the comment section and buttons
document.addEventListener("DOMContentLoaded", () => {
    const commentSection = document.getElementById("comment");
    if (commentSection) {
        commentSection.style.transition = "all 0.3s ease";
        commentSection.style.display = "none";
    }

    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('mouseover', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.transition = 'all 0.3s ease';
        });

        button.addEventListener('mouseout', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>

<style>
.card {
    transition: all 0.3s ease;
}

.forum-content {
    color: #444;
}

.btn {
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(114, 4, 85, 0.2);
}

textarea {
    transition: all 0.3s ease;
}

textarea:focus {
    border-color: #720455 !important;
    box-shadow: 0 0 0 0.2rem rgba(114, 4, 85, 0.25) !important;
}

#comment {
    display: none;
}
</style>