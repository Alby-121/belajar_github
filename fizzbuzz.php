<?php
// Meminta input dari pengguna
echo "Masukkan sebuah angka: ";

// Input angka dari terminal, disimpan ke variabel $N
fscanf(STDIN, "%d", $N);

// Loop untuk menampilkan angka dari 1 sampai N
for ($i = 1; $i <= $N; $i++) {
    // Jika habis dibagi 3 dan 5 → FizzBuzz
    if ($i % 3 == 0 && $i % 5 == 0) {
        echo "FizzBuzz\n";
    }
    // Jika habis dibagi 3 → Fizz
    elseif ($i % 3 == 0) {
        echo "Fizz\n";
    }
    // Jika habis dibagi 5 → Buzz
    elseif ($i % 5 == 0) {
        echo "Buzz\n";
    }
    // Jika tidak memenuhi kondisi di atas → cetak angkanya
    else {
        echo $i . "\n";
    }
}
?>
