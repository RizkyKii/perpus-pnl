@extends('layouts/app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    @include('admin-lte/flash')
    <div class="col-12 col-lg-5">
        <center><h2 class="mb-4">Rekomendasi Buku</h2></center>
    </div>

    <!-- Button trigger modal -->
<center><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalLong">
    Info Pemakaian
  </button></center>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong"  role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <center><p class="mb-5 mb-lg-3"><b>INFORMASI FITUR REKOMENDASI</b></p></center>
          <p class="mb-5 mb-lg-3">1. Fitur ini dibangun untuk memberikan rekomendasi buku yang paling banyak dipinjam</p>
          <p class="mb-5 mb-lg-3">2. Fitur ini memakai algoritma CT-PRO (Compact-Tree Apriori)</p>
          <p class="mb-5 mb-lg-3">3. Minimum support adalah ambang batas untuk menentukan seberapa umum sebuah aturan asosiasi harus muncul dalam data agar dianggap penting. 
            Jika minimum support yang ditentukan adalah 3, artinya aturan tersebut harus terjadi dalam setidaknya 3 atau di atas 3 dari total transaksi agar dianggap relevan.</p>
          <p class="mb-5 mb-lg-3">4. Minimum confidence adalah ambang batas untuk menentukan seberapa kuat sebuah aturan asosiasi harus ada agar dianggap penting. 
            Jika minimum confidence adalah 5%, artinya aturan tersebut harus terbukti benar setidaknya 5% dari keseluruhan kasus agar 
            dianggap signifikan.</p>
            <br>
            <center><p class="mb-5 mb-lg-3"><b>------- PETUNJUK PEMAKAIAN-------</b></p></center>
          <p class="mb-5 mb-lg-3">1. Silahkan memasukkan nama anda pada form</p>
          <p class="mb-lg-3">2. Silahkan memilih nilai minimal support (1-10), perlu diingat bahwa jika nilai minimal support 
            yang dipilih semakin rendah maka proses akan menjadi semakin lama</p>
          <p class="mb-5 mb-lg-3"> 3. Silahkan memilih nilai minimal confidence (1-10), perlu diingat bahwa jika nilai minimal confidence
            yang dipilih semakin tinggi akan menyebabkan jumlah rekomendasi menjadi lebih sedikit atau tidak. Dengan begitu, disarankan untuk
            memilih nilai yang setara atau di atas minimal support. Contoh: min. supp: 2, min. confidence 2 atau 3</p>     
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

<br>

<div class="row" id="divDataMentor">
    <center><div class="col-md-7">
        <div class="card">
            <div class="card-header">Setup nilai support & confidence</div>
            <div class="card-body" id="divFormSupp">
                <div class="form-group">
                    <label class="float-start">Nama</label>
                    <input type="text" class="form-control" id="txtNama" placeholder="Masukkan nama anda">
                </div>
                <br>
                <div class="form-group">
                    <label for="company" class="float-start">Min. Support</label>
                    <br> 
                   <strong>
                        <small class="float-start">( Semakin rendah nilai support yang dipilih, 
                            semakin banyaknya proses yang dilakukan sehingga memakan waktu lebih lama )</small>
                    </strong> 
                    <select class="form-control" id="txtSupport">
                        <?php
                        $x = 1;
                        for ($x; $x <= 10; $x++) { ?>
                            <option value="<?= $x; ?>"><?= $x; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="company" class="float-start">Min. Confidence</label>
                    <br>
                    <strong>
                        <small class="float-start">( Jika ingin mendapatkan rekomendasi yang lebih kuat, minimum confidence dapat dinaikkan.</small>
                    </strong> 
                    <br>
                    <strong>
                        <small class="float-start"> Namun, semakin tinggi nilai confidence juga dapat menyebabkan jumlah rekomendasi yang dihasilkan menjadi lebih sedikit atau bahkan tidak ada. )</small>
                    </strong>
                    <select class="form-control" id="txtConfidence">
                        <?php
                        $x = 1;
                        for ($x; $x <= 10; $x++) { ?>
                            <option value="<?= $x; ?>"><?= $x; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <a class="btn btn-success float-center" href="javascript:void(0)" onclick="prosesAlgoritma()">Mulai Rekomendasi</a>
                </div>
            </div>

            <div id="divLoadingPengujian" style="text-align: center;margin-bottom:30px;display:none;">
                <img src="{{ asset('ladun/base/loading.svg') }}"><br/>
                Memproses rekomendasi buku, akan memakan waktu sesuai dengan banyaknya data yang diproses
            </div>

        </div>

    </div></center>
</div>

<script>
    var rProsesAlgoritma = server + "proses";

    document.querySelector("#txtNama").focus();

    function prosesAlgoritma() {
        let nama = document.querySelector("#txtNama").value;
        let support = document.querySelector("#txtSupport").value;
        let confidence = document.querySelector("#txtConfidence").value;
        let ds = {
            'support': support,
            'confidence': confidence,
            'nama' : nama
        }
        confirmQuest('info', 'Konfirmasi', 'Mulai pembentukan rekomendasi ?', function (x) {konfirmasiAlgoritma(ds)});
    }
    
    function konfirmasiAlgoritma(ds)
    {
        $("#divFormSupp").hide();
        $("#divLoadingPengujian").show();
        axios.post(rProsesAlgoritma, ds).then(function(res){
            console.log(res.data);
            let kdPengujian = res.data.kdPengujian;
            pesanUmumApp('success', 'Sukses', 'Proses analisa rekomendasi buku selesai !');
            renderPage('app/algoritma/analisa/hasil/'+kdPengujian, 'hasilAnalisa');
            
            // window.location.replace('app/algoritma/analisa/hasil/'+kdPengujian);
        });
    }

</script>
</body>
</html>

@endsection