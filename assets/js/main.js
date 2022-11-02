// Input money mask format
$('.money').mask("#.##0,00", { reverse: true });

// Input comma mask format
$('.comma').mask("##0.00", { reverse: true });

// Input number mask format
$('.number').mask("#", { reverse: true });

// Perbandingan
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
          hitungPerbandinganTotalKolom()
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

const hitungPerbandinganTotalKolom = () => {
  // i = baris
  // j = kolom
  for (let i = 1; i <= 5; i++) {
    const totalKolom = document.getElementById(`totalk${i}`)
    let hitungTotal = []

    for (let j = 1; j <= 5; j++) {
      const dataKolom = document.getElementById(`k${j}k${i}`)
      if (dataKolom.value !== '') {
        hitungTotal.push(parseFloat(dataKolom.value))
      }
    }

    totalKolom.value = hitungTotal.reduce((a, b) => a + b, 0).toFixed(2);
  }
}

hitungPerbandinganSegitigaBawah()