<table style="font-size: 14px" class="table table-striped table-bordered " id="datatable" width="100%" >
  <thead>
    <tr style="text-align: center;">
      <th style="width:15%">ID LAPORAN</th>
      <th style="width:35%">INFORMASI LAPORAN</th>
      <th>MASALAH</th>
      <th>STATUS PROGRESS</th>
      <!-- <th >KRONOLOGIS</th>
      <th>KETERANGAN <br>TAMBAHAN</th>
      <th>ATTACHMENT</th>
      <th>UPDATE PROGRESS</th> -->
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
     
        <button type="button"  class="btn btn-danger btn-sm btn-detail-lap" id="<?=$row->id_laporan;?>"> <i class="fa fa-plus"></i> <?=$row->id_laporan;?></button>
      </td>
      <td>
        Pelapor : <?=($row->pelapor=='Anonim')?'<b>Anonim</b>':'<button type="button"  class="btn btn-warning btn-sm btn-detail-pelapor" id="'.$row->id_pelapor.'"> <i class="fa fa-hand-point-up"></i> '.$row->pelapor.'</button>';?><br>
        Pihak Terlapor :<b>  <?=$row->pihak_terlapor;?><br></b>
        Tanggal Pembuatan :<b> <?=$newdate?><br></b>
        Tanggal Kejadian :<b> <?=date('d M Y',strtotime($row->tanggal_kejadian))?><br></b>
        Lokasi Kejadian :<b>  <?=$row->lokasi_kejadian;?><br></b>
        Pernah Lapor :<b> <?=($row->lapor_sebelum=='Y')?'Ya':'Tidak'.'<br>';?></b>
        <?php
          if($row->lapor_sebelum=='Y'){
        ?>
            , Sebelumnya :<b> <?=$row->lapor_sebelum_ke;?><br></b>
        <?php
          }
        ?>
        Jumlah Kerugian :<b>  <?=$row->jumlah_kerugian;?><br></b>
      </td>

      <td style="vertical-align: middle; text-align: center;">
        <?=$row->jenis_masalah;?>
      </td> 
      <td style="vertical-align: middle; text-align: center;">
        <?=$row->last_progress;?>
      </td> 
      <!-- <td style=text-align: center;">
        <?=$row->kronologis;?>
        </td>
      <td style=" text-align: center;">
        <?=$row->keterangan;?>
        </td>
      <td style=" text-align: center;">
        <a href="<?=base_url($row->file_url); ?>" target="_blank" ><img src="<?=base_url('assets/img/folder.png') ?>"></img></a>
      </td>
      <td style=" text-align: center;">
        <a href="<?=base_url();?>index.php/admin/Alaporan/progress/<?=$row->id_laporan; ?>" target="_blank" ><img src="<?=base_url('assets/img/test.png') ?>"></img></a>
      </td> -->
  </tr>
  <?php }
    }?>
  </tbody>
</table>
