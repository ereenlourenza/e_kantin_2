document.addEventListener("DOMContentLoaded", function() {
    const cekButton = document.querySelectorAll('.cek-button');
    
    cekButton.forEach(button => {
      button.addEventListener('click', function() {
        // Toggling class 'checked' untuk mengubah tampilan tombol ceklis
        this.classList.toggle('checked');
        
        // Optional: Mengubah tampilan card ketika tombol ceklis diklik
        const card = this.closest('.card');
        card.classList.toggle('selected');
      });
    });
  });
  