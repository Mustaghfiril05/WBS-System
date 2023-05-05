<div class="container">
  <div class="page-header">
    <div class="row">
      <div class="col-lg-12">
        <h1 id="">Buat Laporan</h1>
      </div>
    </div>
  </div> 
    <div class="col-lg-12">
            <?php echo validation_errors(); ?>
            <?php echo form_open_multipart('laporan/insert'); ?>
      <fieldset>
        <div class="row">
          <div class="col-sm-6 col-md-6"> 
              <div class="form-group" id="div_data_diri">
                <strong >Nama</strong>
                <input type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" placeholder=" " > 
                <strong >Nomor Telepon</strong>
                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder=" " > 
                <strong >Alamat</strong>
                <textarea class="form-control" id="alamat_pelapor" name="alamat_pelapor" placeholder=""></textarea>
                <strong >Sub Directorate </strong><em>(Khusus Pegawai PT. Terminal Teluk Lamong)</em>
                <input type="text" class="form-control" id="sub_directorate" name="sub_directorate" placeholder=" "> 
              </div>
              <div class="form-group">
                <strong for="lapor_sebelum">Apakah Laporan Pernah Dilaporkan Sebelumnya?</strong>
                <select class="form-control" id="lapor_sebelum" name="lapor_sebelum" >
                  <option value="N">TIDAK</option>
                  <option value="Y">YA</option>
                </select>
              </div>
              <div class="form-group" id="div_lapor_sebelum_ke">
                <strong >Kemana Laporan Sebelumnya Disampaikan / Nomor Laporan Sebelumnya</strong>
                <input type="text" class="form-control" id="lapor_sebelum_ke" name="lapor_sebelum_ke" placeholder=" "> 
              </div>
              <!-- <div class="form-group">
                <strong for="pengulangan">Apakah Hal yang anda laporkan termasuk pengulangan?</strong>
                <select class="form-control" name="pengulangan" id="pengulangan">
                  <option>YA</option>
                  <option>TIDAK</option>
                </select>
              </div> -->
              <div class="form-group">
                <strong >Alamat Email <a  style="text-align: center;color:#c0392b">*</a></strong>
                <input type="email" class="form-control" id="email_pelapor" name="email_pelapor" placeholder="Masukkan email" required> 
              </div>
              <div class="form-group">
                <strong >Jenis Dugaan Pelanggaran <a  style="text-align: center;color:#c0392b">*</a></strong>
                <select class="form-control" id="masalah" name="masalah">   
                  <option>--Pilih Pelanggaran--</option>               
                  <?php 
                      foreach($optionmasalah->result() as $row)
                      { 
                        echo '<option value="'.$row->ID_MASALAH.'">'.$row->MASALAH_DESC.'</option>';
                      }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <strong >Nominal Kerugian (Rp)</strong>
                <input type="number" class="form-control" id="jumlah_kerugian" name="jumlah_kerugian"  placeholder="Jumlah Kerugian Dalam Angka"> 
              </div>
                <div class="form-group">
                <strong >Identitas Terlapor (Nama / Area Kerja Petugas)<a  style="text-align: center;color:#c0392b">*</a></strong>
                <input type="text" class="form-control" id="pihak_terlapor" name="pihak_terlapor" placeholder="Identitas Terlapor" required> 
              </div>
              <!-- <div class="form-group">
                <strong >Sub Direktorat Terlapor</strong>
                <input type="text" class="form-control" id="sub_terlapor" name="sub_terlapor" placeholder="Sub Terlapor"> 
              </div> -->
          </div>
          <div class="col-sm-6 col-md-6">
            <div class="form-group">
              <strong >Lokasi Kejadian </strong>
              <input type="text" class="form-control" id="lokasi_kejadian" name="lokasi_kejadian" placeholder="Lokasi Kejadian" > 
            </div> 
              <div class="form-group">
                <div class="form-group col-sm-4 col-md-6" style="padding-left: 0px">
                  <strong >Tanggal Kejadian <a  style="text-align: center;color:#c0392b">*</a></strong>
                  <input name="waktu_awal_kejadian" class="form-control datepicker" id="waktu_awal_kejadian"  required> 
                </div>
                <div class="form-group col-sm-2 col-sm-6" style="padding-left: 0px ">
                  <strong >Estimasi Jam Kejadian </strong>
                  <div class="form-group col-sm-5 col-sm-5" style="padding-left: 0px ">
                    <input type="text" placeholder="hh:mm" name="waktu_akhir_kejadian" class="form-control" id="waktu_akhir_kejadian" maxlength="5" > 
                  </div>
                </div>
              </div>
            <div class="form-group">
              <strong >Kronologis<a  style="text-align: center;color:#c0392b">*</a></strong>
              <textarea class="form-control" id="kronologis" name="kronologis" placeholder="Kronologis Kejadian" required></textarea>
            </div>
            <div class="form-group">
              <strong >Keterangan Tambahan</strong>
              <textarea class="form-control" id="keterangan_tambahan" name="keterangan_tambahan" placeholder="Keterangan Tambahan"></textarea>
            </div>
            <div class="form-group">
              <strong for="exampleInputFile">Bukti Dugaan Pelanggaran (Bukti Audio/Visual) Maks 2 Mb </strong>
              <input type="file" class="form-control-file" id="attachment" name="attachment" aria-describedby="fileHelp"> 
            </div> 
            <!-- <div class="g-recaptcha" data-sitekey="6Lc3OUAUAAAAAEnhiWqTVZj1JhjY-rwf15GQnE9G"></div> -->
            <button type="submit" class="btn btn-primary">Submit</button>          
          </div>
        </div>
      </fieldset>
      <?= form_close();?>
    </div> 
</div>
<script type="text/javascript">
  $("#div_lapor_sebelum_ke").hide();

  $("#lapor_sebelum").bind("change", function() {
    if ($(this).val() == "Y") {
      $("#div_lapor_sebelum_ke").show();
    }
    else $("#div_lapor_sebelum_ke").hide();
  });

 
</script>

<script type="text/javascript">
  $('#waktu_akhir_kejadian').timepicker();
 
</script>