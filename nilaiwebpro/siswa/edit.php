<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header row">
                <div class="card-title h3 col-8">Edit Data siswa</div>
                <div class="col-4">
                    <a href="?m=kelas&s=view" class="btn btn-lg btn-primary float-end">Kembali</a>
                </div>
            </div>
 
            <?php
            include_once('config.php');
            $id = $_GET['id'];
            $sql = "SELECT * FROM students WHERE id=$id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>
            <div class="card-body">
                <form action="?ms=siswa&s=save" method="post">
                    <div class="mb-2">
                        <input type="text" class="form-control"name="nis" value="<?= $row['nis'] ?>" placeholder="Nomor induk siswa" required autofocus>
                    </div>
                    
                    <div class="mb-2">
                        <input type="text" class="form-control"name="name" value="<?=$row['name'] ?>" placeholder="Nama siswa" required>
                    </div>
                    
                    <div class="mb-2">
                        <label for="">jenis kelamin: &nbsp;</label>
                        <input type="radio"name=gender value="laki-laki"<?= $row['gender']=='laki-laki'? "checked" : "" ?>>Laki-laki &nbsp;
                        <input type="radio" name="gender" value="perempuan"<?= $row['gender']=='perempuan'? "checked" : "" ?>>Perempuan
                    </div>
                    
                    <div class="mb-2">
                        <input type="text" class="form-control"name="pob" value="<?=$row['pob'] ?>" placeholder="Tempat lahir (isi dengan kabupaten sendiri)"> 
                    </div>
                    <div class="mb-2">
                        <input type="date" class="form-control"name="dob" value="<?=$row['dob'] ?>" placeholder="Tanggal lahir">
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control"name="phone" value="<?=$row['phone'] ?>" placeholder="Telepon">
                    </div>
                    <div class="mb-2">
                        <textarea name="address" class="form-control"><?=$row['address'] ?></textarea>
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control"name="email" value="<?=$row['email'] ?>" placeholder="Email">
                    </div>
                    <div class="mb-2">
                        <select name="grade_id" class="form-control" required>
                            <option value="">-- Pilih Kelas --</option>
                            <?php
                            include_once('config.php');
                            $sql = "SELECT * FROM grades";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['id'] . "'" . ($row['id'] == $row['grade_id'] ? "selected" : "") . ">" . $row['grade'] . "</option>";
                            }
                            ?>
                        </select>
                    <div class="mb-2">
                        <input type="hidden" name="id" value="<?= $r['id'] ?>">
                        <input type="reset" class="btn btn-warning">
                        <input type="submit" value="update" class="btn btn-primary" name="update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>