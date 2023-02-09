<?php include (APPPATH.'views/admin/components/header.php'); ?>

<style>
    .img-audit{
      height: 100px !important;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="fas fa-user"></i> 
          <?= strtoupper($this->session->userdata('username')) ?>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>auth/logout" role="button" onclick="return confirm('Apakah anda yakin untuk keluar dari sistem?')">
          <i class="fas fa-power-off"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="<?= base_url('admin'); ?>" class="brand-link">
      <img src="<?= base_url(); ?>assets/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ADMIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?= base_url(); ?>admin/" class="nav-link">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">MASTER DATA</li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>admin/user" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Admin
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>admin/customer" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Data Pelanggan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>admin/setup" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Pengaturan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>admin/griya" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Griya
              </p>
            </a>
          </li>
          <li class="nav-header">LAPORAN</li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>admin/kartu" class="nav-link active">
              <i class="nav-icon far fa-file-pdf"></i>
              <p>
                Kartu Pelanggan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>admin/aka" class="nav-link">
              <i class="nav-icon fas fa-file-invoice"></i>
              <p>
                Input AKA
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>admin/transaksi" class="nav-link">
              <i class="nav-icon fas fa-file-invoice"></i>
              <p>
                Transaksi
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- sidebar-menu -->

    </div>
    <!-- Sidebar -->
  </aside>
  <!-- Main Sidebar Container -->

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Kartu Pelanggan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin/kartu'); ?>">Data Kartu Pelanggan</a></li>
              <li class="breadcrumb-item active">Detail</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="pb-2 px-2">
        <form action="<?= base_url('admin/detail_kartu') ?>/<?= $cust_id ?>" method="post">
          <div class="row">
            <div class="col-sm-3">
              <select class="form-control form-sm" name="tahun" required>
                <option value="" disabled selected>--Pilih Tahun--</option>
                <?php 
                $cur_year = (int)date('Y');
                $bef_year = 2020;
                while ($cur_year >= $bef_year){ ?>
                  <option value="<?= $cur_year ?>"><?= $cur_year ?></option>
                <?php $cur_year--; } ?>
              </select>
            </div>
            <div class="col-sm-2">
              <button type="submit" class="form-control btn btn-primary btn-sm">Filter</button>
            </div>
          </div>
        </form>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kartu Palanggan, Tahun: <span id="flt_thn"><?= $tahun ?></span></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="kartu" class="table table-bordered table-striped">
                  <thead>
                    <tr class="text-center">
                      <th>No.</th>
                      <th>Nama</th>
                      <th>Periode</th>
                      <th>AKA Lalu</th>
                      <th>AKA Akhir</th>
                      <th>Jml Pakai</th>
                      <th>Total Biaya (Rp)</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach($kartu as $row): ?>
                      <tr class="text-center">
                        <td><?= $no++; ?></td>
                        <td><?= $row->nama_cust ?></td>
                        <td><?= date('M-Y', strtotime($row->periode.'-'.$row->bulan)) ?></td>
                        <td><?= $row->aka_lalu ?></td>
                        <td><?= $row->aka_akhir ?></td>
                        <td><?= $row->jlh_pakai ?></td>
                        <td><?php echo number_format($row->jlh_biaya,2,",","."); ?></td>
                        <td class="text-center">
                          <a id="detail_kartu" class="btn btn-sm btn-primary" href="javascript:;" data-toggle="modal" data-target="#detail-kartu" data-id="<?= $row->id; ?>" data-harga_pm="<?= $setup[0]->nilai; ?>"><i class="fa fa-receipt text-light"></i> Detail</a>
                          <a id="ubah_kartu" class="btn btn-sm btn-info" href="javascript:;" data-toggle="modal" data-target="#ubah-kartu" data-id="<?= $row->id; ?>" data-harga_pm="<?= $setup[0]->nilai; ?>" data-akalalu="<?= $row->aka_lalu ?>" data-akaakhir="<?= $row->aka_akhir ?>" data-tahun="<?= $row->periode ?>" data-bulan="<?= $row->bulan ?>" data-cid="<?= $cust_id ?>"><i class="fa fa-pen-square text-light"></i> Ubah</a>
                          <a id="print_struk" class="btn btn-sm btn-secondary" data-idaka="<?= $row->id ?>" ><i class="fa fa-print text-light"></i> Cetak</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <?php include (APPPATH.'views/footer/footer.php'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  
  
</div>
<!-- ./wrapper -->

<!-- Modal Detail AKA -->
<div class="modal fade bd-example-modal-lg" id="detail-kartu" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Tagihan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="printThis" class="modal-body">
        <div class="row">
          <div class="col-4">Nama</div>
          <div class="col-8">: <span id="nama_cust"></span></div>
        </div>
        <div class="row">
          <div class="col-4">Alamat</div>
          <div class="col-8">: <span id="alamat_cust"></span></div>
        </div>
        <div class="row">
          <div class="col-4">Periode (Bln / Thn)</div>
          <div class="col-8">: <span id="periode"></span></div>
        </div>
        <div class="row">
          <div class="col-4">Harga / M3</div>
          <div class="col-8">: <span id="harga_pm"></span></div>
        </div>
        <div class="row">
          <div class="col-4">B. Perawatan</div>
          <div class="col-8">: <span id="biaya_mtc"></span></div>
        </div>
        <div class="row">
          <div class="col-4">Stand Meter</div>
          <div class="col-8">: <span id="stand_meter"></span></div>
        </div>
        <div class="row">
          <div class="col-4">Jumlah Pemakaian (M3)</div>
          <div class="col-8">: <span id="pemakaian"></span></div>
        </div>
        <div class="row">
          <div class="col-4">Total Bayar (Rp)</div>
          <div class="col-8">: <span id="total_bayar"></span></div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="" class="btn btn-primary" id="btnCetak"><i class="fa fa-save text-light"></i> Cetak</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times-circle text-light"></i> Batal</button>
      </div>
    </div>
  </div>
</div>
<!-- End Detail AKA -->

<!-- Modal Ubah AKA -->
<div class="modal fade bd-example-modal-lg" id="ubah-kartu" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/update_aka') ?>" method="post">
          <div class="modal-body">
            <div class="form-group row">
              <label for="aka_lalu" class="col-sm-2 col-form-label">AKA Lalu</label>
              <div class="col-sm-10">
                <input id="id" type="hidden" name="id" class="form-control" required>
                <input id="harga_pm1" type="hidden" name="harga_pm" class="form-control" required>
                <input id="aka_lalu" type="number" name="aka_lalu" step="1" class="form-control" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="aka_akhr" class="col-sm-2 col-form-label">AKA Akhir</label>
              <div class="col-sm-10">
                <input id="aka_akhr" type="number" name="aka_akhir" step="1" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id=""><i class="fa fa-save text-light"></i> Submit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times-circle text-light"></i> Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Ubah AKA -->


<!-- Script File -->
<?php include (APPPATH.'views/admin/components/scripts.php'); ?>
<script src="<?= base_url(); ?>assets/js/moment-with-locales.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#kartu").DataTable({
      "responsive": true, "lengthMenu": [12,50,100,500], "lengthChange": true, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "colvis"]
    }).buttons().container().appendTo('#kartu_wrapper .col-md-6:eq(0)');
  });
</script>

<script>
  let base_url = window.location.origin + "/simlar/";

  // format currency
  function commify(n) {
    var parts = n.toString().split(".");
    const numberPart = parts[0];
    const decimalPart = parts[1];
    const thousands = /\B(?=(\d{3})+(?!\d))/g;
    return numberPart.replace(thousands, ".") + (decimalPart ? "," + decimalPart : "");
  }

  $(document).on("click", "#print_struk", function () {
    var id_aka = $(this).data("idaka");

    $.ajax({
      type: 'GET',
      url: base_url + "admin/print/"+id_aka,
      cache: false,
      success: function(msg){
        toastr.success("Berhasil Mencetak!");
      }
    });
  });
  
  $(document).on("click", "#btnCetak", function () {
    var id_aka = $(this).data("idaka");

    $.ajax({
      type: 'GET',
      url: base_url + "admin/print/"+id_aka,
      cache: false,
      success: function(msg){
        toastr.success("Pembayaran berhasil!");
      }
    });
  });

  $(document).on("click", "#detail_kartu", function () {
    var id = $(this).data("id");
    var harga_pm = $(this).data("harga_pm");

    $.ajax({
      type: 'POST',
      url: base_url + "admin/get_kartu_byid",
      data: {kid: id},
      cache: false,
      success: function(msg){
        var kartu_byid = JSON.parse(msg);
        var per = moment().format('MMMM-YYYY', kartu_byid[0].bulan+'-'+kartu_byid[0].periode);
        $("#nama_cust").text(kartu_byid[0].nama_cust);
        $("#alamat_cust").text(kartu_byid[0].alamat_cust+', '+kartu_byid[0].alamat_griya);
        $("#periode").text(per);
        $("#harga_pm").text(commify(harga_pm));
        $("#biaya_mtc").text(commify(kartu_byid[0].biaya_mtc));
        $("#stand_meter").text(kartu_byid[0].aka_akhir);
        $("#pemakaian").text(kartu_byid[0].jlh_pakai);
        $("#total_bayar").text(commify(kartu_byid[0].jlh_biaya));
        $("#btnCetak").data("idaka", id);
      }
    });
  });
  
  $(document).on("click", "#ubah_kartu", function () {
    var id = $(this).data("id");
    var cid = $(this).data("cid");
    var harga_pm = $(this).data("harga_pm");
    var akalalu  = $(this).data("akalalu");
    var akaakhir = $(this).data("akaakhir");

    $("#id").val(id);
    $("#harga_pm1").val(harga_pm);
    $("#aka_lalu").val(akalalu);
    $("#aka_akhr").val(akaakhir);
  });
</script>

<script>
  <?php if($this->session->flashdata('success')){ ?>
    toastr.success("<?php echo $this->session->flashdata('success'); ?>");
  <?php }else if($this->session->flashdata('error')){  ?>
    toastr.error("<?php echo $this->session->flashdata('error'); ?>");
  <?php }else if($this->session->flashdata('warning')){  ?>
    toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
  <?php }else if($this->session->flashdata('info')){  ?>
    toastr.info("<?php echo $this->session->flashdata('info'); ?>");
  <?php } ?>
</script>

</body>
</html>
