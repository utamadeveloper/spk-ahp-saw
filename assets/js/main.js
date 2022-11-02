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
          hitungPerbandinganNilaiRataRata()
          hitungPerbandinganEVN()
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

const hitungPerbandinganNilaiRataRata = () => {
  // i = baris
  // j = kolom
  for (let i = 1; i <= 5; i++) {
    const totalKolom = document.getElementById(`totalk${i}`)
    for (let j = 1; j <= 5; j++) {
      const dataKolom = document.getElementById(`k${j}k${i}`)
      const dataPKolom = document.getElementById(`pk${j}k${i}`)
      if (dataKolom.value !== '') {
        const r = parseFloat(dataKolom.value)/parseFloat(totalKolom.value)
        dataPKolom.innerHTML = parseFloat(r).toFixed(3)
      } else {
        dataPKolom.innerHTML = ''
      }
    }
  }
}

const hitungPerbandinganEVN = () => {
  // i = baris
  // j = kolom
  for (let i = 1; i <= 5; i++) {
    const evnBaris = document.getElementById(`evnk${i}`)
    const totalBaris = document.getElementById(`totalpk${i}`)
    let hitungTotal = []

    for (let j = 1; j <= 5; j++) {
      const dataPBaris = document.getElementById(`pk${i}k${j}`)
      if (dataPBaris.innerHTML !== '') {
        hitungTotal.push(parseFloat(dataPBaris.innerHTML))
      }
    }

    totalBaris.innerHTML = hitungTotal.reduce((a, b) => a + b, 0).toFixed(3);
    evnBaris.value = (parseFloat(totalBaris.innerHTML)/5).toFixed(3);
  }
}

hitungPerbandinganSegitigaBawah()