<?php

//Diberikan potongan kode di bawah ini:

class SecretBox {

    private $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    public function check($x)
    {
        if ($x == $this->number){
            return 'pas';
        }elseif($x < $this->number){
            return 'kurang';
        }else {
            return 'lebih';
        }
    }
}


class Person {

    // OTHERS CODE IF NECESSARY
    private $number = 0;
    
    public function guess()
    {
        // Menebak angka dengan metode ngasal, tergantung hoki
        // $number = rand(1,15);

        return $this->number;
    }

    public function acceptResponse($response)
    {
        // Do something with response
        if($response == 'kurang'){
            $this->number ++;
        }else if($response == 'lebih'){
            $this->number --;
        }

    }

    // OTHERS CODE IF NECESSARY
}


// Test Script
$secretNumber = rand(1, 100);
$box = new SecretBox($secretNumber);
$bayu = new Person();

echo "Secret Number: " . $secretNumber . "<br><br>";

$finish = false;
$i = 1;


while(!$finish) {
    $guess = $bayu->guess();
    $response = $box->check($guess);

    // HINT: Seharusnya bayu bisa memanfaatkan response 
    // untuk bisa menghasilkan tebakan yang lebih baik
    // jadi tidak sekedar asal tebak secara random.
    // Contohnya, jika response-nya adalah "kurang", maka tentu tebakan selanjutnya seharusnya tidak lebih kecil dari tebakan sekarang
    $bayu->acceptResponse($response);

    $finish = $response === 'pas' ? true : false;

    echo "Tebakan " . ($i++) . ": " . $guess;
    echo "<br>";
    echo "Response: " . $response;
    echo "<br><br>";
}

// Silakan perbaiki kode di atas agar Person bisa menebak dengan lebih jitu, dengan ketentuan:

// * Class SecretBox tidak boleh diubah
// * Class Person boleh diubah
// * Test script boleh diubah
// * Semakin sedikit jumlah tebakan semakin baik

#### Bonus
// Manfaatkan Strategy Pattern sehingga class Person bisa gonta-ganti metode untuk menebak angka saat runtime. Beberapa strategy yang bisa diterapkan: tebak 100% random, tebak iteratif naik/turun satu angka, dan tebak ambil nilai tengah.