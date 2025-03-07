<nav class="navbar navbar-expand-lg bg-white sticky-top shadow-lg" data-aos="fade-down" data-aos-duration="800">
    <div class="container">
        <a class="navbar-brand" href="#" data-aos="fade-right" data-aos-delay="100">
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
                <li class="nav-item" data-aos="fade-left" data-aos-delay="200">
                    <a href="/profile" class="btn btn-brand ms-lg-3 nav-btn">
                        <i class="ri-user-line me-2"></i>
                        <span style="color: white;border:none;">Profile</span>
                    </a>
                </li>
                <li class="nav-item" data-aos="fade-left" data-aos-delay="300">
                    <form action="/logout" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-brand ms-lg-3 nav-btn logout-btn">
                            <i class="ri-logout-box-r-line me-2"></i>
                            <span style="color: white; border:none;">Logout</span>
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