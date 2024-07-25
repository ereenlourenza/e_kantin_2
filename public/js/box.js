function ubahWarna() {
    var cekButton = document.querySelector('.cek-button');
    if (cekButton.style.backgroundColor === 'rgb(222, 93, 1)') {
      cekButton.style.backgroundColor = '#ffffff'; // Putih
    } else {
      cekButton.style.backgroundColor = '#DE5D01'; // DE5D01 (Orange)
    }
  }
  