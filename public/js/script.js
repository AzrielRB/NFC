/**
 * NFC Menu Management — Admin Panel JavaScript
 * SweetAlert2 confirmations & UI interactions
 */

document.addEventListener('DOMContentLoaded', function () {

    // ---------- Sidebar Toggle (Mobile) ----------
    const sidebar = document.getElementById('sidebar');
    const mobileToggle = document.getElementById('mobileToggle');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    if (mobileToggle) {
        mobileToggle.addEventListener('click', function () {
            sidebar.classList.toggle('open');
            sidebarOverlay.classList.toggle('active');
        });
    }

    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', function () {
            sidebar.classList.remove('open');
            sidebarOverlay.classList.remove('active');
        });
    }

    // ---------- Auto-dismiss Flash Messages ----------
    const flashMessage = document.getElementById('flashMessage');
    if (flashMessage) {
        setTimeout(function () {
            flashMessage.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            flashMessage.style.opacity = '0';
            flashMessage.style.transform = 'translateY(-10px)';
            setTimeout(function () {
                flashMessage.remove();
            }, 500);
        }, 4000);
    }

    // ---------- Delete Confirmation (SweetAlert2) ----------
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const menuName = this.getAttribute('data-name');
            const form = this.closest('.delete-form');

            Swal.fire({
                title: 'Hapus Menu?',
                html: `Apakah Anda yakin ingin menghapus<br><strong>"${menuName}"</strong>?<br><small class="text-muted">Tindakan ini tidak dapat dibatalkan.</small>`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#EF4444',
                cancelButtonColor: '#64748B',
                confirmButtonText: '<i class="fas fa-trash"></i> Ya, Hapus!',
                cancelButtonText: '<i class="fas fa-times"></i> Batal',
                reverseButtons: true,
                customClass: {
                    popup: 'swal-popup-custom',
                    title: 'swal-title-custom',
                }
            }).then(function (result) {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    // ---------- Save/Update Confirmation (SweetAlert2) ----------
    const submitButtons = document.querySelectorAll('.btn-submit-confirm');
    submitButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const action = this.getAttribute('data-action') || 'menyimpan data';
            const form = this.closest('form');

            // Client-side validation check
            if (!form || !form.checkValidity()) {
                if (form) form.reportValidity();
                return;
            }

            Swal.fire({
                title: 'Konfirmasi',
                text: `Apakah Anda yakin ingin ${action}?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#F59E0B',
                cancelButtonColor: '#64748B',
                confirmButtonText: '<i class="fas fa-check"></i> Ya, Simpan!',
                cancelButtonText: '<i class="fas fa-times"></i> Batal',
                reverseButtons: true,
            }).then(function (result) {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

});
