<main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <div class="alert alert-success" style="display:none"><i class="fa fa-handshake"></i> Terimakasih, telah menyetujui progress pada laporan : <b><?=$_GET['q']?></b>.</div>
          <h1 class="display-3" style="text-align: center;">WhistleBlowing System Online <img src="<?php echo base_url('assets/img/peluit3.jpg') ?>"><br>PT. ALP Petro Industry </h1> 
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-3">
            <p><a href="<?php echo site_url('syarat/sy_pelapor') ?>"><img src="<?php echo base_url('assets/img/pelapor.png') ?>"></a></p>
            <p>Menjadi Pelapor</p>
          </div>
          <div class="col-md-3">
            <p><a href="<?php echo site_url('Syarat/sy_terkait') ?>"><img src="<?php echo base_url('assets/img/jenis.png') ?>"></a></p>
            <p>Jenis Pelanggaran</p>
          </div>
          <div class="col-md-3">
            <p><a href="<?php echo site_url('laporan/create') ?>"><img src="<?php echo base_url('assets/img/buat.png') ?>"></a></p>
            <p>Buat Pelaporan</p>
          </div>
          <div class="col-md-3">
            <p><a href="<?php echo site_url('laporan/check') ?>"><img src="<?php echo base_url('assets/img/cari2.png') ?>"></a></p>
            <p>Cek Status Laporan</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <h2 style="text-align: center;">Selamat Datang Pada Aplikasi</h2>
            <h2 style="text-align: center;">Sistem Pengelolaan Pengaduan Pelanggaran <br>PT. ALP Petro Industry</h2>
        </div>
        </div>    
        <div class="row">
          <div class="col-lg-5" style="background-color:#4172b7">
            <h3 style="text-align: center;color: #ecf0f1">
              Sistem Pelaporan Pelanggaran <br> (Whistle Blowing System) 
            </h3>
          </div>
           <div class="col-lg-7" style="background-color:#7cadde">
            <p style="text-align: justify;color: #ecf0f1">Adalah sistem yang digunakan untuk menerima, mengolah dan menindaklanjuti serta membuat pelaporan atas informasi yang disampaikan oleh pelapor mengenai pelanggaran yang terjadi dilingkungan perusahaan. </p>
          </div> 
        </div>
        

        <div class="row">
          <div class="col-lg-12">
            <br>
        <h3 style="text-align: left; color:#16a085">Tujuan & Manfaat WBS ALP :</h3>
        <ul style="text-align: justify;list-style-type:none">
            <li>1.  Tujuan ditetapkannya Peraturan ini adalah sebagai pedoman dalam mempermudah dan mempercepat proses pelaksanaan penyelesaian pengaduan atas adanya indikasi pelanggaran yang dilaporkan oleh terlapor.</li>
            <li>2.  Manfaat ditetapkannya Peraturan ini adalah sebagai berikut :</li>
            
        </ul> 
        <div class="row">
             <div class="col-lg-1">
             </div>
          <div class="col-lg-11">
            <ul style="text-align: justify;">
              <li>Tersediannya sarana penyampaian informasi untuk keberlangsungan pengelolaan perusahaan yang memenuhi prinsip-prinsip tata kelola perusahaan (Good Corporate           Governance).</li>
              <li>Tersedianya mekanisme deteksi dini (early warning system) sehingga perusahaan dapat mengambil langkah-langkah yang cepat dan tepat untuk menghindarkan/menyelesaikan          terjadinya penyimpangan dilingkungan perusahaan.</li>
              <li>Meningkatkan reputasi perusahaan dalam pandangan Stakeholder, regulator/pemerintah dan masyarakat umum.</li>
              <li>Perusahaan mendapat masukan untuk memperbaiki sistem pengendalian internal dalam mencegah terjadinya pelanggaran dan merangcang tindakan perbaikan secara           berkesinambungan.</li>
              <li>Memberi informasi atas kelemahan pengendalian internal yang ada.</li>
              <li>Mengurangi risiko yang dihadapi perusahaan akibat dari pelanggaran baik dari segi keuangan, operasi, hukum, keselamatan kerja dan risiko.</li>
            </ul>
         
          </div>
          
        </div> 
          </p>
         </div>
        </div>  

        <div class="row">
          <div class="col-lg-12">
        <h3 style="text-align: left; color:#16a085">Prinsip – Prinsip WBS ALP :</h3>
        <ul style="text-align: justify;">
          <li>Obyektifitas, bahwa kegiatan pelaporan harus berdasarkan pada fakta dan bukti yang dapat dinilai berdasarkan kriteria yang ditetapkan.</li>
          <li>Koordinasi, bahwa pelaporan pelanggaran harus dilaksanakan dengan kerjasama yang baik antara yang berwenang dan terkait berdasarkan mekanisme, tata kerja dan           prosedur yang berlaku.</li>
          <li>Efektifitas dan Efesiensi, bahwa kegiatan pelaporan pelanggaran harus dilaksanakan secara tepat sasaran, hemat tenaga, waktu dan biaya.</li>
          <li>Akuntabilitas, bahwa proses kegiatan pelaporan pelanggaran beserta tindak lanjutnya harus dapat dipertanggungjawabkan sesuai dengan ketentuan yang berlaku.</li>
          <li>Transparan, bahwa hasil kegiatan pelaporan harus diinformasikan berdasarkan mekanisme dan prosedur yang jelas dan terbuka sesuai ketentuan yang berlaku.</li>
          <li>Kerahasiaan, bahwa dalam melakukan proses pemeriksaan atas pelanggaran wajib mengedepankan kerahasiaan, asas praduga tak bersalah dan profesionalisme.</li>
          <li>Itikad baik, bahwa dalam melakukan pengaduan atas suatu pelanggaran tidak berdasarkan atas kepentingan pribadi atau balas dendam.</li>
          <li>Kemanfaatan, bahwa pengaduan atas pelanggaran harus mengedepankan manfaatnya untuk kepentingan bersama seluruh insan PT ALP Petro Industry</li>

        </ul>
           </div>
        </div> 


        <hr>

      </div> <!-- /container -->

    </main>
    <script>
    $(document).ready(function () {
      $(".alert").slideDown('fast').delay(5000).slideUp('fast');
    })
    </script>