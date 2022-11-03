// Input money mask format
$('.money').mask("#.##0,00", { reverse: true });

// Input comma mask format
$('.comma').mask("##0.00", { reverse: true });

// Input number mask format
$('.number').mask("#", { reverse: true });

// Perbandingan berpasangan
const hitungPerbandinganSegitigaBawah = () => {
  // i = baris
  // j = kolom
  for (let i = 1; i <= 5; i++) {
    for (let j = 1; j <= 5; j++) {
      if (i !== j) {
        const segitigaAtas = document.getElementById(`k${i}k${j}`)
        const segitigaBawah = document.getElementById(`k${j}k${i}`)

        let hitung = () => {
          if (j > i) {
            if (segitigaAtas.value !== '') {
              segitigaBawah.value = (1/parseFloat(segitigaAtas.value)).toFixed(2);
            } else {
              segitigaBawah.value = '';
            }
          }
        }
        
        segitigaAtas.addEventListener('keyup', () => {
          hitung()
        })
        
        if (j > i) {
          hitung()
        }
      }
    }
  }
}

hitungPerbandinganSegitigaBawah()