<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header row">
                <div class="card-title h3 col-8">Tambah Data Kelas</div>
                <div class="col-4">
                    <a href="?ms=kelas&s=view" class="btn btn-lg btn-primary float-end">Kembali</a>
                </div>
            </div>

            <div class="card-body">
                <form action="?ms=kelas&s=save" method="post">
                    <div class="mb-2">
                        <input type="text" class="form-control" id="grade" name="grade" placeholder="Nama Kelas" required>
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control" id="grade" name="room" placeholder="Ruangan">
                    </div>
                    <div class="mb-2">
                        <input type="number" class="form-control" id="grade" name="capacity" placeholder="Kapasitas Ruangan"> 
                    </div>
                    <div class="mb-2">
                        <input type="number" class="form-control" id="grade" name="fill" placeholder="Jumlah Siswa (Terisi)"> 
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