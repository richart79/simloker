
    <div class="row">
        <div class="col-lg-8">
            <h3 class="page-header"><small> Profil Pelamar</small></h3>
        
        <div class="panel panel-default">
            <div class="panel-heading">Informasi Pelamar</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                    
        <?php
            $GetID  = $_GET['id'];
            $sql = "SELECT *FROM tb_pelamar WHERE id_pelamar = '$GetID'";
            $res = $conn->query($sql);
            $data = $res->fetch_assoc();

            $sql = "SELECT * FROM tb_jenis_pekerjaan";
            $res = $conn->query($sql);
                while ($row = $res->fetch_assoc()) {
                    $jenis_kerja .= "<option value='{$row['id_jenis']}'> {$row['nama_jenis_kerja']} </option>";
                }

            $sql = "SELECT * FROM tb_kategori_pekerjaan";
            $res = $conn->query($sql);
                while ($row = $res->fetch_assoc()) {
                    $kategori_kerja .= "<option value='{$row['id_kategori_kerja']}'> {$row['nama_kategori_kerja']} </option>";
                }

            $sql = "SELECT * FROM tb_kategori_pendidikan";
            $res = $conn->query($sql);
                while ($row = $res->fetch_assoc()) {
                    $kategori_pendidikan .= "<option value='{$row['id_pendidikan']}'> {$row['nama_pendidikan']} </option>";
                }
        ?>    
                   
                <form class="" role="form" style="margin-top: 10px;" action="?p=applicant.action" id="defaultForm" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $GetID; ?>">
                    <div class="form-group">
                    <label> Nama Depan</label>
                        <input type="text" class="form-control" name="nama_depan" value="<?php echo $data['nama_depan']; ?>"/>
                    </div>
                    <div class="form-group">
                    <label> Nama Belakang</label>
                        <input type="text" class="form-control" name="nama_belakang" value="<?php echo $data['nama_belakang']; ?>"/>
                    </div>
                    <div class="form-group">
                    <label> Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>"/>
                    </div>
                    <div class="form-group">
                    <label> Tanggal Lahir</label>
                        <input type="text" class="form-control" name="tgl_lahir" id="datepicker" value="<?php echo date_format(date_create($data['tgl_lahir']), 'd-m-Y'); ?>">
                    </div>
                    <div class="form-group">
                    <label> Jenis Kelamin</label>
                        <select class="form-control" name="jk"/>
                            <option value="<?php echo $data['jk']; ?>"><?php echo $data['jk']; ?></option>
                            <option value="P">Pria</option>
                            <option value="W">Wanita</option>
                        </select>
                    </div>

                    <div class="form-group">
                    <label> Agama</label>
                        <input type="text" class="form-control" name="agama" value="<?php echo $data['agama']; ?>"/>
                    </div>
                    <div class="form-group">
                    <label> Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']; ?>"/>
                    </div>
                    <div class="form-group">
                    <label> Lulusan</label>
                        <select class="form-control" name="lulusan" value="<?php echo $data['lulusan'];?>" required/>
                            <option value="<?php echo $data['lulusan'];?>"><?php echo $data['lulusan'];?></option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="SMK">SMK</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="D4">D4</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label> Usia</label>
                        <input type="text" class="form-control" name="usia" value="<?php echo $data['usia']; ?>"/>
                    </div>
                    <div class="form-group">
                    <label> Nomor Telepon</label>
                        <input type="text" class="form-control" name="no_hp" value="<?php echo $data['no_hp']; ?>"/>
                    </div>
                    <div class="form-group">
                    <label> Pengalaman</label>
                        <input type="text" class="form-control" name="pengalaman" value="<?php echo $data['pengalaman']; ?>"/>
                    </div>
                    <div class="form-group">
                    <label> Tinggi Badan</label>
                        <input type="text" class="form-control" name="tinggi_badan" value="<?php echo $data['tinggi_badan']; ?>"/>
                    </div>
                    <div class="form-group">
                    <label> Foto</label>
                        <input type="file" name="foto"/><img src="dist/images/foto/<?php echo $data['foto'];?>" width="90" height="90">
                    </div>
                    <div class="form-group">
                    <label> Kelebihan</label>
                        <textarea id="editor" name="kelebihan"><?php echo $data['kelebihan']; ?></textarea>
                    </div>
                    <div class="form-group">
                    <label></label>
                        <a class="btn btn-default" href="?p=applicant.view">Batal</a>
                        <button class="btn btn-primary" type="submit" name="edit">Ubah</button>
                    </div>                   
                </form>
            </div>
        </div>
    </div>
</div>
</div>

