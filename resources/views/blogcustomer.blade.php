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
        <nav class="navbar navbar-expand-lg bg-white sticky-top shadow-lg">
            <div class="container">
              <a class="navbar-brand" href="#">
                <span><strong>Pet</strong></span
                >Talk
              </a>
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                      <a class="nav-link" href="/blogs">Beranda</a>
                  </li>
                    <li class="nav-item">
                    <a href="{{ route('setting') }}" class="btn btn-brand ms-lg-3">Setting <i class="ri-settings-2-line"></i> </a>
                  </li>
                  <li class="nav-item">
                    <form action="/logout" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-brand ms-lg-3">
                            Logout <i class="ri-logout-box-r-line"></i>
                        </button>
                    </form>
                </li>

                </ul>

              </div>
            </div>
          </nav>

          <div style="width: 900px" class="container-sm mt-5 mb-5">
            <div class="card mb-5 shadow-lg border-0" style="border-radius: 20px; overflow: hidden; background: linear-gradient(135deg, #fdfbfb, #f1f1f1);">
                <img src="{{ asset('storage/image_blog/' . $blog->images) }}"
                     class="card-img-top"
                     alt="{{ $blog->title }}"
                     style="max-height: 450px; object-fit: cover; filter: brightness(90%);">
                <div class="card-body p-5">
                    <h1 class="card-title mb-4" style="font-size: 2.2rem; font-weight: bold; color: #6b0f1a;">{{ $blog->title }}</h1>
                    <div class="d-flex justify-content-between align-items-center mb-4" style="border-bottom: 1px solid #ddd; padding-bottom: 10px;">
                        <small class="text-muted">
                            <i class="fas fa-user-edit" style="color: #720455;"></i> Oleh: <span style="font-weight: bold; color: #6b0f1a;">{{ $blog->author }}</span>
                        </small>
                        <small class="text-muted">
                            <i class="fas fa-calendar-alt" style="color: #720455;"></i> Dipublikasikan: {{ $blog->created_at->format('d M Y') }}
                        </small>
                    </div>
                    <p class="card-text" style="text-align: justify; line-height: 1.9; font-size: 1.1rem; color: #555;">{{ $blog->description }}</p>
                    <div class="d-flex justify-content-start mt-5">
                        <a href="{{ url('/blogs') }}"
                           class="btn btn-outline-primary px-5 py-2"
                           style="border-radius: 50px; font-size: 1rem; background-color: #720455; color: white; transition: all 0.3s ease-in-out;"
                           onmouseover="this.style.backgroundColor='#a11a2b'; this.style.color='white';"
                           onmouseout="this.style.backgroundColor='#720455'; this.style.color='white';">
                           Kembali ke Blog
                        </a>
                    </div>
                </div>
            </div>
        </div>

  <!-- footer -->
  <footer>
    <div class="footer-top text-center text-white">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <h3 class="navbar-brand">Pet<span>Talk</span></h3>
            <p>
              Contrary to popular belief, Lorem Ipsum is not simply random
              text. It has roots in a piece of classical Latin literature from
            </p>
            <div class="social-icons">
              <a href="#"><i class="bx bxl-facebook icon-box3"></i></a>
              <a href="#"><i class="bx bxl-twitter icon-box3"></i></a>
              <a href="#"><i class="bx bxl-instagram icon-box3"></i></a>
              <a href="#"><i class="bx bxl-linkedin icon-box3"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom text-center text-white">
      <p class="mb-0">Copyright@2024. All rights Reserved</p>
    </div>
  </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script src="{{'js/main.js'}}"></script>
    </body>
</html>
