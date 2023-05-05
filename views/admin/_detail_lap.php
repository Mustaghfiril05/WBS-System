<h5>
<center>  ID LAPORAN : <b class="text-danger"><?=$data['id_laporan'];?></b></center>
</h5>
<table class="table">
    <tr>
        <td style="width:40%">Pihak Terlapor</td>
        <td>:&emsp;<?=$data['pihak_terlapor'];?></td>
    </tr>
    <tr>
        <td style="width:40%">Tanggal Pembuatan</td>
        <td>:&emsp;<?=date('d M Y',strtotime($data['tanggal_pembuatan']))?></td>
    </tr>
    <tr>
        <td style="width:40%">Tanggal Kejadian</td>
        <td>:&emsp;<?=date('d M Y',strtotime($data['tanggal_kejadian']))?></td>
    </tr>
    <tr>
        <td style="width:40%">Lokasi Kejadian</td>
        <td>:&emsp;<?=$data['lokasi_kejadian'];?></td>
    </tr>
    <tr>
        <td style="width:40%">Pernah Lapor</td>
        <td>:&emsp;<?=($data['lapor_sebelum']=='Y')?'Ya':'Tidak';?>
            <?=$data['lapor_sebelum']=='Y' ? ', Sebelumnya :'.$data['lapor_sebelum_ke']:"";?>
        </td>
    </tr>
    <tr>
        <td style="width:40%">Jumlah Kerugian</td>
        <td>:&emsp;<?=$data['jumlah_kerugian'];?></td>
    </tr>
    <tr>
        <td style="width:40%">Keterangan Tambahan</td>
        <td>:&emsp;<?=$data['keterangan'];?></td>
    </tr>
    <tr>
        <td style="width:40%">Kronologis</td>
        <td>:&emsp;<?=$data['kronologis'];?></td>
    </tr>
</table>
<hr>
<div class="row">
    <div class="col-md-4">
        <a target="_blank" href="<?=base_url($data['file_url']); ?>" class="btn btn-success btn-block"><i class="fa fa-download"></i> Bukti</a>
    </div>
    <div class="col-md-4">
        <a href="<?=base_url();?>admin/Alaporan/progress/<?=$data['id_laporan']; ?>" class="btn btn-danger btn-block"> <i class="fa fa-edit"></i> Update Progress</a>
    </div>
    <div class="col-md-4">
        <a target="_blank" href="<?=base_url();?>admin/Alaporan/detailLaporan_pdf?id=<?=$data['id_laporan']; ?>" class="btn btn-warning btn-block"> <i class="fa fa-file-pdf"> Print Laporan</i> </a>
    </div>
</div>
