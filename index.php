    <?php

    echo "<link rel='stylesheet' type='text/css' href='style.css' />";

    class Shell {
        public $harga;
        public $jumlah;
        public $jenis;
        public $ppn;

        public function __construct($harga, $jenis) {
            $this->harga = $harga;
            $this->jumlah = 0;
            $this->jenis = $jenis;
            $this->ppn = 0.1;
        }

        public function totalHarga() {
            $total = $this->harga * $this->jumlah;
            $totalPpn = $total * $this->ppn;
            return $total + $totalPpn;
        }
    }

    class Beli extends Shell {
        public function __construct($harga, $jenis, $jumlah) {
            parent::__construct($harga, $jenis);
            $this->jumlah = $jumlah;
        }

        public function buktiTransaksi() {
            $total = $this->totalHarga();
            return "<center>"."Anda membeli bahan minyak tipe $this->jenis"."<br>"."Dengan Jumlah $this->jumlah liter "."<br>"."Total yang harus anda bayar adalah : ". number_format($total, 2)."<br>"."<br>";
        }
    }

    // Mengecek apakah form telah disubmit
    if (isset($_POST['submit'])) {
        // Mengambil data dari form
        if (isset($_POST['jenis']) && ($_POST['jumlah'])){
        $jenis = $_POST['jenis'];
        $jumlah = $_POST['jumlah'];

        // Harga-harga Shell
        $hargaShellSuper = 15420;
        $hargaShellVPower = 16130;
        $hargaShellVPowerDiesel = 18310;
        $hargaShellVPowerNitro = 16510;

        // Menentukan harga berdasarkan jenis bahan bakar
        switch ($jenis) {
            case 'Shell Super':
                $harga = $hargaShellSuper;
                break;
            case 'Shell V-Power':
                $harga = $hargaShellVPower;
                break;
            case 'Shell V-Power Diesel':
                $harga = $hargaShellVPowerDiesel;
                break;
            case 'Shell V-Power Nitro':
                $harga = $hargaShellVPowerNitro;
                break;
            default:
                $harga = 0;
        }
    } elseif (isset($_POST['reset'])) {

        
    }

        // Membuat objek Beli berdasarkan data yang diterima dari form
        $pembelian = new Beli($harga, $jenis, $jumlah);

        // Output 
        echo "<br>"."<center>"."<h2 style= 'color : white ;'>Bukti Transaksi : </h2><br>";
        echo $pembelian->buktiTransaksi() . "<br>";
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
        <div class="tengah">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <div class="tengah2">
        <title>Form Pembelian Bahan Bakar Shell</title>
    </head>
    <div class="input">
    <body style="background-color: orange ;">
        <h2>Form Pembelian Bahan Bakar Shell</h2>
        <form action="index.php" method="post">
            <label for="jumlah">Masukan Jumlah Liter : </label>
            <input type="number" name="jumlah" id="jumlah" min="1" value="1">
            <br>
            <label for="jenis">Pilih Jenis Bahan Bakar : </label>
            <select name="jenis" id="jenis">
                <option value="Shell Super">Shell Super</option>
                <option value="Shell V-Power">Shell V-Power</option>
                <option value="Shell V-Power Diesel">Shell V-Power Diesel</option>
                <option value="Shell V-Power Nitro">Shell V-Power Nitro</option>
            </select>
            <br>
            <br>
            <input type="submit" name="submit" value="Beli">
            <input type="submit" name="reset" value="reset">
</div>
        </form>
    </body>

</div>
</div>
    </html>