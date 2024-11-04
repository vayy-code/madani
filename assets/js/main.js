document.addEventListener('DOMContentLoaded', function() {
    // Fungsi untuk slider gambar di halaman utama
    function initImageSlider() {
        const slider = document.querySelector('.slider');
        if (slider) {
            const images = slider.querySelectorAll('img');
            let currentIndex = 0;

            function showNextImage() {
                images[currentIndex].style.display = 'none';
                currentIndex = (currentIndex + 1) % images.length;
                images[currentIndex].style.display = 'block';
            }

            // Sembunyikan semua gambar kecuali yang pertama
            for (let i = 1; i < images.length; i++) {
                images[i].style.display = 'none';
            }

            // Ganti gambar setiap 5 detik
            setInterval(showNextImage, 5000);
        }
    }

    // Fungsi untuk validasi form
    function validateForm(formId) {
        const form = document.getElementById(formId);
        if (form) {
            form.addEventListener('submit', function(event) {
                let isValid = true;
                const requiredFields = form.querySelectorAll('[required]');

                requiredFields.forEach(function(field) {
                    if (!field.value.trim()) {
                        isValid = false;
                        field.classList.add('error');
                    } else {
                        field.classList.remove('error');
                    }
                });

                if (!isValid) {
                    event.preventDefault();
                    alert('Mohon isi semua field yang diperlukan.');
                }
            });
        }
    }

    // Fungsi untuk preview gambar sebelum upload
    function initImagePreview() {
        const input = document.getElementById('activity_photo');
        const preview = document.getElementById('image_preview');

        if (input && preview) {
            input.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.addEventListener('load', function() {
                        preview.src = this.result;
                        preview.style.display = 'block';
                    });
                    reader.readAsDataURL(file);
                }
            });
        }
    }

    // Fungsi untuk menampilkan konfirmasi sebelum logout
    function initLogoutConfirmation() {
        const logoutLink = document.querySelector('a[href="/auth/logout.php"]');
        if (logoutLink) {
            logoutLink.addEventListener('click', function(event) {
                if (!confirm('Apakah Anda yakin ingin keluar?')) {
                    event.preventDefault();
                }
            });
        }
    }

    // Fungsi untuk toggle sidebar di halaman dashboard
    function initSidebarToggle() {
        const toggleBtn = document.getElementById('sidebar-toggle');
        const sidebar = document.querySelector('.sidebar');
        if (toggleBtn && sidebar) {
            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
            });
        }
    }

    // Inisialisasi fungsi-fungsi
    initImageSlider();
    validateForm('login-form');
    validateForm('register-form');
    validateForm('daily-report-form');
    initImagePreview();
    initLogoutConfirmation();
    initSidebarToggle();
});