@include('admin-lte/flash')

    <!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalLong">
    Info Pemakaian
</button>
  
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
          <p class="mb-5 mb-lg-3">3. Jika ingin mendapatkan rekomendasi buku yang banyak dipinjam, nilai minimum support dapat dinaikkan. Jika ingin mendapatkan rekomendasi yang bervariasi, nilai minimum support dapat direndahkan.</p>
          <p class="mb-5 mb-lg-3">4. Nilai confidence merupakan nilai kuatnya antara kedua item. Sebagai contoh, nilai min. support adalah 5 dan terdapat 2 contoh kombinasi antara dua item yang lewat nilai support 5.
            Item A/B memiliki kombinasi dengan nilai 6, dan sementara C/D memiliki kombinasi dengan nilai 7. Akan tetapi, nilai confidence yang ditentukan misalnya adalah 7, maka item kombinasi A/B tidak akan lulus,
            karena nilai tersebut tidak terlalu kuat dibandingkan dengan item kombinasi C/D yang memiliki nilai 7.
          </p>
            <br>
            <center><p class="mb-5 mb-lg-3"><b>------- PETUNJUK PEMAKAIAN-------</b></p></center>
          <p class="mb-5 mb-lg-3">1. Silahkan memasukkan nama anda pada form</p>
          <p class="mb-lg-3">2. Silahkan memilih nilai minimal support (1-10), perlu diingat bahwa jika nilai minimal support 
            yang dipilih semakin rendah maka proses akan menjadi semakin lama (tergantung seberapa banyak data diproses)</p>
          <p class="mb-5 mb-lg-3"> 3. Silahkan memilih nilai minimal confidence (1-10)</p>     
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

<br>
<br>

<div class="row" id="divDataMentor">
    <div class="col-12">
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
                <div class="form-group d-flex justify-content-center">
                    <a class="btn btn-success float-center" href="javascript:void(0)" onclick="prosesAlgoritma()">Mulai Rekomendasi</a>
                </div>
            </div>

            <div id="divLoadingPengujian" style="text-align: center;margin-bottom:30px;display:none;">
                <img src="{{ asset('ladun/base/loading.svg') }}"><br/>
                Memproses rekomendasi buku, akan memakan waktu sesuai dengan banyaknya data yang diproses
            </div>

        </div>

    </div>
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
            renderPage('hasil/'+kdPengujian, 'hasilAnalisa');
            
            // window.location.replace('app/algoritma/analisa/hasil/'+kdPengujian);
        });
    }

</script>