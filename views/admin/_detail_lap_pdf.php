<head>
	<style>
        #table-ttd {
            /*font-family: "consolas";*/
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 14px;
		}
        #table-ttd td {
            border: 1px solid #ddd;
            padding: 6px;
            }
		#table-ttd th {
            /*border: 1px solid #ddd;*/
            padding: 6px;
		}


		#table-report {
            /*font-family: "consolas";*/
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 14px;
		}

		#table-report td {
            border: 1px solid #ddd;
            padding: 6px;
            }
		#table-report th {
            /*border: 1px solid #ddd;*/
            padding: 6px;
		}
        .penutup{
            margin-left:50px;
        }
		/*#table-report tr:nth-child(even){background-color: #f2f2f2;}*/

		/*#table-report tr:hover {background-color: #ddd;}*/

		#table-report th {
            padding-top: 12px;
            padding-bottom: 12px;
            /*text-align: center;*/
            background-color: #4CAF50;
            color: white;
		}
	</style>
</head>
<body>
    <table>
        <tr>
            <td>
                <img style="height: 78px" src="data:image/png;base64,<?=base64_encode(file_get_contents(base_url('IMAGES').'/header.jpg'))?>" alt="">
            </td>
        </tr>
    </table>
    <center>Jl. Raya Kebonsari KM. 1 Desa, Legok, Kec. Gempol, Pasuruan, Jawa Timur </center>
    <hr>
    <h4>
        <center>Laporan pelanggaran perilaku kecurangan di PT. ALP Petro Industry </center>
    </h4>
    
    <table id="table-report">
        <tr>
            <td>ID Laporan</td>
            <td>:      <?=$data['id_laporan'];?></td>
        </tr>
        <tr>
            <td>Pelapor</td>
            <td>:      <?=$data['pelapor'];?></td>
        </tr>
        <tr>
            <td>Tanggal Pembuatan</td>
            <td>:      <?=date('d M Y',strtotime($data['tanggal_pembuatan']))?></td>
        </tr>
        <tr>
            <td>Pernah Lapor</td>
            <td>:      <?=($data['lapor_sebelum']=='Y')?'Ya':'Tidak';?>
                
            </td>
        </tr>
        <?php
            if($data['lapor_sebelum']=='Y'){
        ?>
        <tr>
            <td>Laporan ke</td>
            <td>:      
                <?=$data['lapor_sebelum_ke']?>
            </td>
        </tr>
        <?php
            }
        ?>
        <tr>
            <td>Masalah</td>
            <td>:      <?=$data['jenis_masalah'];?>
            </td>
        </tr>
        <tr>
            <td>Jumlah Kerugian</td>
            <td>:      <?=$data['jumlah_kerugian'];?></td>
        </tr>
        <tr>
            <td>Pihak Terlapor</td>
            <td>:      <?=$data['pihak_terlapor'];?></td>
        </tr>
        <tr>
            <td>Lokasi Kejadian</td>
            <td>:      <?=$data['lokasi_kejadian'];?></td>
        </tr>
        <tr>
            <td>Tanggal Kejadian</td>
            <td>:      <?=date('d M Y',strtotime($data['tanggal_kejadian']))?></td>
        </tr>
        <tr>
            <td>Kronologis</td>
            <td>:      <?=$data['kronologis'];?></td>
        </tr>
        
        <tr>
            <td>Keterangan Tambahan</td>
            <td>:      <?=$data['keterangan'];?></td>
        </tr>
        <tr>
            <td>Bukti Laporan</td>
            <td>
                <img style="max-width: 250px;max-height:150px" src="data:image/png;base64,<?=base64_encode(file_get_contents(base_url($data['file_url'])))?>" alt="">
            
            </td>
        </tr>
    </table>
    <br>
        <span class="penutup">
        Demikian surat laporan pelanggaran di lingkungan PT. ALP Petro Industry dibuat sebagai pelengkap laporan yang sudah dibuat.
        </span>
        <br>
        <br>
        <br>
        <br>
        <br>
    <table id="table-ttd">
        <tr>
            <th></th>
            <th>
                <!-- <center>Mengetahui</center> -->
            </th>
        </tr>
        <tr>
            <th style="width:50%">
            <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <center>
                <u>Tim WBS ALP</u>
                </center>
                
            </th>
            <th style="width:50%">
            <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <center>
                    <?=$direksi->name?>
                    <br>
                    ( <u><?=$direksi->jabatan?></u> )
                    
                </center>
            </th>
        </tr>
    </table>
</body>

