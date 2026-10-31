const teksSambutan = document.getElementById("teksSambutan");
const teksKeterangan = document.getElementById("teksKeterangan");
const btnUbah = document.getElementById("btn-ubah");
const btnReset = document.getElementById("btn-reset");

btnUbah.addEventListener("click", function() {
    teksSambutan.textContent = "Status: Javascript Aktif!";
    teksSambutan.style.color = "#ffcc00";
    teksKeterangan.textContent = "DOM berhasil diubah melalui event click.";
});

btnReset.addEventListener("click", function() {
    teksSambutan.textContent = "Selamat datang di Praktikum Web!";
    teksSambutan.style.color = "#0f172a";
    teksKeterangan.textContent = "Teks ini akan mengalami perubahan isi dan warna.";
});

const inputNama = document.getElementById("inputNama");
const outputNama = document.getElementById("outputNama");

inputNama.addEventListener("input", function() {
const nilaiInput = inputNama.value.trim();
if (nilaiInput === "") {
    outputNama.textContent = "Praktikan";
} else {
    outputNama.textContent = nilaiInput;
}
});

let totalhitungan = 0;
const displaycounter = document.getElementById("angkaCounter");
const btnTambah = document.getElementById("btn-tambah");
const btnKurang = document.getElementById("btn-kurang");

btnTambah.addEventListener("click", function() {
    totalhitungan++;
    displaycounter.textContent = totalhitungan;
});

btnKurang.addEventListener("click", function() {
   if (totalhitungan > 0) {
        totalhitungan--;
    displaycounter.textContent = totalhitungan;
   }
});