    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="tabel_pelatihan_pejabat_pengadaan">        
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Peserta</th>
            <th>Nama Perusahaan</th>
            <th>Alamat Nama Peserta</th>
            <th>Tanggal Pelatihan</th>
          </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
          @foreach($data as $row)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$row->nama}}</td>
              <td>{{$row->nama_perusahaan}}</td>
              <td>{{$row->alamat}}</td>
              <td>{{$row->tanggal_pelatihan}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <script>
      $("#tabel_pelatihan_pejabat_pengadaan").dataTable();
    </script>