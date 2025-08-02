<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header row">
                <div class="card-title h3 col-8">Tambah Data siswa</div>
                <div class="col-4">
                    <a href="?ms=siswa&s=view" class="btn btn-lg btn-primary float-end">Kembali</a>
                </div>
            </div>

            <div class="card-body">
                <form action="?ms=siswa&s=save" method="post">
                    <div class="mb-2">
                        <input type="text" class="form-control"  name="nis" placeholder="Nomor induk siswa" required autofocus>
                    </div>
                    
                    <div class="mb-2">
                        <input type="text" class="form-control"  name="name" placeholder="Nama siswa" required>
                    </div>
                    <div class="mb-2">
                        <label for="">jenis kelamin: &nbsp;</label>
                        <input type="radio" name="gender" value="Laki-laki" checked>Laki-laki &nbsp;
                        <input type="radio" name="gender" value="Peremuan">Perempuan
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control"  name="pob" placeholder="Tempat lahir
                        (isi dengan kabupaten sendiri)"> 
                    </div>
                    <div class="mb-2">
                        <input type="date" class="form-control"  name="dob" placeholder="Tanggal lahir"> 
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control"  name="phone" placeholder="Telepon"> 
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control"  name="email" placeholder="Email"> 
                    </div>
                    <div class="mb-2">
                        <textarea name="address" class="form-control" placeholder="Alamat"></textarea> 
                    </div>
                    <div class="mb-2">
                        <select name="grade_id" class="form-control" required>
                            <option value="">Pilih Kelas</option>
                            <?php
                            include_once("config.php");
                            $sql = "SELECT * FROM grades";
                            $result = mysqli_query($conn, $sql);
                            while ($r = mysqli_fetch_assoc($result)) {
                                echo '<option value="'.$r['id'].'">'.$r['grade'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-2">
                        <input type="file" name="photo" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-2">
                        <input type="reset" class="btn btn-warning">
                        <input type="submit" value="Simpan" class="btn btn-primary" name="save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>