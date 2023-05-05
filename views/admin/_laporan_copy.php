
<table style="font-size: 14px" class="table table-striped table-bordered nowrap" id="datatable" width="100%" >
  <thead>
    <tr style="text-align: center;">
    
      <th>ID LAPORAN</th>
      <th>Laporan</th>
      <th>TANGGAL PEMBUATAN <br>LAPORAN</th>
      <th>PERNAH LAPOR ?</th>
      <th>LAPORAN <br> SEBELUMNYA</th>
      <th>MASALAH</th>
      <th>JUMLAH <br> KERUGIAN</th>
      <th>PIHAK <br>TERLAPOR</th>
      <th>LOKASI <br>KEJADIAN</th>
      <th>TANGGAL <br>KEJADIAN</th>
      <th>KRONOLOGIS</th>
      <th>KETERANGAN <br>TAMBAHAN</th>
      <th>ATTACHMENT</th>
      <th>UPDATE PROGRESS</th>
    </tr>
  </thead>
  <tbody>
  <?php
    if ($listlaporan) {
      foreach($listlaporan->result() as $row){
      $date = strtotime($row->tanggal_pembuatan);
      $newdate = date('d M Y', $date); // Format in which I want to display
      $dateOrder = date('Y-m-d', $date); // Sort Order
    ?>
  <tr>
    
      <td style="vertical-align: middle; text-align: center;">
        <a href="#" data-toggle="modal" data-target="#laporanModal"><?=$row->id_laporan;?></a>
      </td>
      <td>
        Tanggal Pembuatan : <?=$newdate?><br>
        Jenis Pelanggaran : <?=$row->last_progress?><br>
        Pernah Lapor : <?=($row->lapor_sebelum=='Y')?'Ya':'Tidak';?><br>
      </td>
      <td style="vertical-align: middle; text-align: center;" data-order="<?=$dateOrder; ?>">
        <?=$newdate;?>
      </td>
      <td style="vertical-align: middle; text-align: center;">
        <?=($row->lapor_sebelum=='Y')?'Ya':'Tidak';?>
      </td>
      <td style="vertical-align: middle; text-align: center;">
        <?=$row->lapor_sebelum_ke;?>
        </td>
      <td style="vertical-align: middle; text-align: center;">
        <?=$row->id_masalah;?>
        </td>
      <td style="vertical-align: middle; text-align: center;">
        <?=$row->jumlah_kerugian;?>
        </td>
      <td style="vertical-align: middle; text-align: center;">
        <?=$row->pihak_terlapor;?>
        </td>
      <td style="vertical-align: middle; text-align: center;">
        <?=$row->lokasi_kejadian;?>
        </td>
      <td style="vertical-align: middle; text-align: center;">
        <?=$row->tanggal_kejadian;?>
        </td>
      <td style="vertical-align: middle; text-align: center;">
        <?=$row->kronologis;?>
        </td>
      <td style="vertical-align: middle; text-align: center;">
        <?=$row->keterangan;?>
        </td>
      <td style="vertical-align: middle; text-align: center;">
        <a href="<?=base_url($row->file_url); ?>" target="_blank" ><img src="<?=base_url('assets/img/folder.png') ?>"></img></a>
      </td>
      <td style="vertical-align: middle; text-align: center;">
        <a href="<?=base_url();?>index.php/admin/Alaporan/progress/<?=$row->id_laporan; ?>" target="_blank" ><img src="<?=base_url('assets/img/test.png') ?>"></img></a>
      </td>
  </tr>
  <?php }
    }?>
  </tbody>
</table>
<table border="0" cellpadding="0" cellspacing="0">
                  <tbody>
                      <tr>
                          <td class="gutter">
                              <div class="line number1 index0 alt2" style="display: none;">
                                  1
                              </div>
                          </td>
                          <td class="code">
                              <div class="container" style="display: none;">
                                  <div class="line number1 index0 alt2" style="display: none;">
                                  </div>
                              </div>
                          </td>
                      </tr>
                  </tbody>
              </table>