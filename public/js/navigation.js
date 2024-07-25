var currentIndex = 0; // Indeks kartu saat ini
var cards = document.getElementsByClassName("menu-card"); // Semua elemen kartu

// Fungsi untuk menampilkan kartu berikutnya
function nextMenu() {
    if (currentIndex < cards.length - 1) {
        cards[currentIndex].style.display = "none";
        currentIndex++;
        cards[currentIndex].style.display = "block";
    }
}

// Fungsi untuk menampilkan kartu sebelumnya
function prevMenu() {
    if (currentIndex > 0) {
        cards[currentIndex].style.display = "none";
        currentIndex--;
        cards[currentIndex].style.display = "block";
    }
}

// Fungsi untuk menampilkan kartu sesuai dengan indeks tertentu
function showMenu(index) {
    for (var i = 0; i < cards.length; i++) {
        if (i === index - 1) {
            cards[i].style.display = "block";
            currentIndex = i;
        } else {
            cards[i].style.display = "none";
        }
    }
}

// Ambil angka dari antara tanda kurung sudut dan buat bulat
var numberButtons = document.querySelectorAll('.number-navigation button');
numberButtons.forEach(function(button) {
    button.innerText = parseInt(button.innerText);
});

// Semua kartu diatur ke display none, kecuali yang pertama
for (var i = 1; i < cards.length; i++) {
    cards[i].style.display = "none";
}
