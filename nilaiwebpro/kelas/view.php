<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header row">
                <div class="card-title h3 col-8">Data kelas</div>
                <div class="col-4">
                    <a href="?ms=kelas&s=add" class="btn btn-lg btn-primary float-end">Tambah</a>
                </div>
            </div>
 
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama kelas</th>
                            <th>ruangan</th>
                            <th>Kapasitas</th>
                            <th>Terisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once('config.php');
                        $sql = "SELECT * FROM grades";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $no = 1;
                            while($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>
                                    <td>'.$no.'</td>
                                    <td>'.$row["grade"].'</td>
                                    <td>'.$row["room"].'</td>
                                    <td>'.$row["capacity"].'</td>
                                    <td>'.$row["fill"].'</td>
                                    <td>
                                        <a href="?ms=kelas&s=edit&id='.$row["id"].'" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="?ms=kelas&s=delete&id='.$row["id"].'" class ="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                    </tr>';
                            }
                        }
                        ?>
                    </tbody>
            </div>
        </div>
    </div>
</div>                      