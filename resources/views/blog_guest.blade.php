<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- !!! THE LINE BELOW IS REQUIRED SO YOU CAN USE BOOTSTRAP !!! -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <!-- !!! THE LINE ABOVE IS REQUIRED SO YOU CAN USE BOOTSTRAP !!! -->
        <title>PetTalk</title>
        <link rel="icon" href="{{'images/logo.jpg'}}" />
        <!-- ./assets/images/logo.jpg -->
        <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        />
        <link
        href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"
        rel="stylesheet"
        />
        <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"
        />
        <link
        href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"
        rel="stylesheet"
        />
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <link rel="stylesheet" href="{{'../css/style.css'}}" />
    </head>
    <body>
      <nav class="navbar navbar-expand-lg bg-white sticky-top shadow-lg" >
    <div class="container">
        <a class="navbar-brand" href="#" >
            <span class="brand-text">
                <strong class="gradient-text">Pet</strong>Talk
                <i class="ri-paw-print-fill brand-icon"></i>
            </span>
        </a>
        
        <button class="navbar-toggler custom-toggler" type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbarNav" 
                aria-controls="navbarNav" 
                aria-expanded="false" 
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item" >
                    <a href="/profile" class="btn btn-brand ms-lg-3 nav-btn">
                        <i class="ri-user-line me-2"></i>
                        <span style="color: white">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <form action="/logout" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-brand ms-lg-3 nav-btn logout-btn">
                            <i class="ri-logout-box-r-line me-2"></i>
                            <span style="color: white">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
  /* Navbar Styling */
.navbar {
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    background: rgba(255, 255, 255, 0.95) !important;
}

/* Brand Styling */
.brand-text {
    font-size: 1.5rem;
    display: flex;
    align-items: center;
    gap: 5px;
}

.gradient-text {
    background: linear-gradient(45deg, #720455, #ff6b6b);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.brand-icon {
    color: #720455;
    font-size: 1.2rem;
    margin-left: 5px;
    animation: bounce 2s infinite;
}

/* Navigation Buttons */
.nav-btn {
    padding: 8px 20px;
    border-radius: 30px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 5px;
    background: linear-gradient(45deg, #720455, #ff6b6b);
    color: white !important;
    border: none;
    font-weight: 500;
}

.nav-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(114, 4, 85, 0.2);
}

.logout-btn {
    background: linear-gradient(45deg, #ff6b6b, #720455);
}

/* Custom Toggler */
.custom-toggler {
    border: none;
    padding: 8px;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.custom-toggler:hover {
    background-color: rgba(114, 4, 85, 0.1);
}

/* Animations */
@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-3px); }
}

/* Responsive Adjustments */
@media (max-width: 991px) {
    .navbar-nav {
        padding: 1rem 0;
    }
    
    .nav-btn {
        margin: 0.5rem 0;
        justify-content: center;
    }
}
</style>

<section class="container my-5">
    <div class="row g-5">
        <!-- Blog Detail -->
        <div class="col-lg-8">
            <div class="card shadow-lg border-0" style="border-radius: 20px; overflow: hidden;">
                <!-- Blog Image -->
                <div class="position-relative">
                    <img src="{{ asset('storage/image_blog/' . $blog->images) }}"
                         alt="{{ $blog->title }}"
                         class="card-img-top"
                         style="
                             max-height: 500px; 
                             width: 100%; 
                             object-fit: cover; 
                             transition: all 0.3s ease;">
                    <div class="position-absolute bottom-0 start-0 p-4 text-white"
                         style="
                             background: linear-gradient(90deg, rgba(196, 129, 223, 0.863), transparent);
                             border-radius: 0 20px 0 0;">
                        <h1 class="display-5 fw-bold">{{ $blog->title }}</h1>
                    </div>
                </div>

                <!-- Blog Content -->
                <div class="card-body p-5" >
                    <!-- Metadata -->
                    <div class="d-flex justify-content-between align-items-center mb-4"
                         style="
                             border-bottom: 1px solid #ddd; 
                             padding-bottom: 10px;">
                        <small class="text-muted">
                            <i class="ri-user-line me-2" style="color: #720455;"></i> 
                            Oleh: <span style="font-weight: bold; color: #720455;">{{ $blog->author }}</span>
                        </small>
                        <small class="text-muted">
                            <i class="ri-calendar-line me-2" style="color: #720455;"></i> 
                            Dipublikasikan: {{ $blog->created_at->format('d M Y') }}
                        </small>
                    </div>

                    <!-- Description -->
                    <p class="card-text"
                       style="
                           text-align: justify; 
                           line-height: 1.9; 
                           font-size: 1.2rem; 
                           color: #555;">
                        {{ $blog->description }}
                    </p>

                    <!-- Back Button -->
                    <div class="d-flex justify-content-start mt-5">
                        <a href="/blogs"
                           class="btn px-5 py-2"
                           style="
                               background-color: #720455; 
                               color: white; 
                               border-radius: 50px; 
                               font-size: 1rem;
                               transition: all 0.3s ease-in-out;"
                           onmouseover="
                               this.style.backgroundColor='#a11a2b'; 
                               this.style.color='white';"
                           onmouseout="
                               this.style.backgroundColor='#720455'; 
                               this.style.color='white';">
                            Kembali Home
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Blogs Sidebar -->
        <div class="col-lg-4">
            <h4 class="mb-4" style="color: #720455;">Berita Lainnya</h4>
            @foreach ($blogs as $related)
                <div class="card mb-4 shadow-sm border-0" style="
                     border-radius: 15px; overflow: hidden;">
                    <img src="{{ asset('storage/image_blog/' . $related->images) }}" 
                         alt="{{ $related->title }}" 
                         class="card-img-top" 
                         style="
                             height: 150px; 
                             object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title mb-2" style="
                            font-weight: bold; color: #720455;">{{ $related->title }}</h5>
                        <p class="text-muted small mb-3">{{ Str::limit($related->description, 100) }}</p>
                        <a href="/blog-guest/{{ $related->id }}" 
                           class="btn btn-sm"
                           style="
                               background-color: #720455; 
                               color: white; 
                               border-radius: 10px;">Read More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('layout.footer')

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>

<style>
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(114, 4, 85, 0.1);
}

.card-img-top {
    transition: all 0.3s ease-in-out;
}

.card-img-top:hover {
    filter: brightness(100%);
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(161, 26, 43, 0.3);
}

.card-text {
    transition: all 0.3s ease;
}

.card-text:hover {
    color: #333;
}
</style>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script src="{{'js/main.js'}}"></script>
    </body>
</html>
