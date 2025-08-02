<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header row">
                <div class="card-title h3 col-8">Edit Data Kelas</div>
                <div class="col-4">
                    <a href="?m=kelas&s=view" class="btn btn-lg btn-primary float-end">Kembali</a>
                </div>
            </div>
 
            <?php
            include_once('config.php');
            $id = $_GET['id'];
            $sql = "SELECT * FROM grades WHERE id=$id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>
            <div class="card-body">
                <form action="?ms=kelas&s=save" method="post">
                    <div class="mb-2">
                        <input type="text" class="form-control" id="grade" name="grade" value="<?= $row['grade'] ?>" placeholder="Nama Kelas" required>
                    </div>
                    
                    <div class="mb-2">
                        <input type="text" class="form-control" id="grade" name="room" value="<?=$row['room'] ?>" placeholder="Ruangan">
                    </div>
                    
                    <div class="mb-2">
                        <input type="number" class="form-control" id="grade" name="capacity" value="<?=$row['capacity'] ?>" placeholder="Kapasitas Ruangan"> 
                    </div>
                    
                    <div class="mb-2">
                        <input type="number" class="form-control" id="grade" name="fill" value="<?=$row['fill'] ?>" placeholder="Jumlah Siswa (Terisi)"> 
                        <input type="hidden" name="id" value="<?=$row['id'] ?>">
                    </div>
                    <div class="mb-2">
                        <input type="reset" class="btn btn-warning">
                        <input type="submit" value="update" class="btn btn-primary" name="update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>