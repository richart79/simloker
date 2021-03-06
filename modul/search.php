<?php

	echo '<div class="col-md-8">

            <h1 class="page-header" >  
                <small>Find Job</small>
            </h1>';

            if ($_POST['search'] <> '') {
                $search = $_POST['search'];
                $sql = "SELECT *FROM tb_lowongan a
                        LEFT JOIN tb_kategori_pekerjaan b ON 
                        (a.id_kategori_pekerjaan=b.id_kategori_kerja)
                        LEFT JOIN tb_kategori_pendidikan c ON 
                        (a.id_pendidikan=c.id_pendidikan)
                        LEFT JOIN tb_jenis_pekerjaan d ON
                        (a.id_jenis=d.id_jenis)
                        LEFT JOIN tb_perusahaan e ON 
                        (a.user_id=e.user_id) 
                        WHERE a.posisi LIKE '%$search'";

                $res = $conn->query($sql);
                $hasil = mysqli_num_rows($res);

                if ($hasil > 0){
                    echo '<h3>'.$hasil.' lowongan ditemukan dengan kata kunci: <span class="text-navy">"'.$search.'"</span></h3>';
                
                foreach ($res as $row => $data) {
                    
                    echo '<div class="col-md-2" id="crop">
		                <img class="img-responsive" src="dist/images/logo/'.$data['logo'].'" alt="" sizes="{max-width: 110px} 100vw, 110px" height="110" width="110">
		                </div>
		                
		                <h4>
		                    <a href="?p=job&id='.$data['id_lowongan'].'" class="title"> '.$data['posisi'].'</a>
		                </h4>
		                <h5>
		                    <a href="index.php" id="conten">
		                    <span class="glyphicon glyphicon-list-alt"></span>
		                '.$data['nama_perusahaan'].' 
                    	<span class="fa fa-bookmark fa-fw"></span> '.$data['nama_jenis_kerja'] .' 
                    	<span class="glyphicon glyphicon-map-marker"></span> '.$data['kota'].' </a>
                
                    	<span class="fa fa-calendar fa-fw"></span><span id=conten> '.
                    	date_format(date_create($data['tgl_posting']), 'd-m-Y').' - '. 
                    	date_format(date_create($data['tgl_akhir']), 'd-m-Y').' 
                     	<span class="glyphicon glyphicon-tags"></span> '. 
                     	$data['nama_kategori_kerja'].' '.$data['jk_require'].'
                     	<span class="fa fa-graduation-cap fa-fw"></span> '. 
                     	$data['nama_pendidikan'].'
                
                		</h5>
                		<br>
                		<hr>
		                ';
                    }
                }
                else{
                    echo "<h3>Not Found! </h3> Data yang kamu cari tidak ada pada database.";
                }
            }else{
                echo '<h3>Not Found! </h3>Silahkan masukkan kata kunci yang kamu cari dengan benar.';
            }
        echo "</div>";