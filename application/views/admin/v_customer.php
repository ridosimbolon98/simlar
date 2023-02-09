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
            <a href="<?= base_url(); ?>admin/customer" class="nav-link active">
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
            <a href="<?= base_url(); ?>admin/kartu" class="nav-link">
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
            <h1>Data Pelanggan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
              <li class="breadcrumb-item active">Data Pelanggan</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="mb-3">
          <button class="btn btn-info mr-2" data-toggle="modal" data-target="#add-customer"><i class="fa fa-plus-square"></i> Tambah Pelanggan Baru</button>
        </div>

        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Data Pelanggan</h3>
              </div>

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr class="text-center">
                      <th>No.</th>
                      <th>Nama</th>
                      <th>Griya</th>
                      <th>Alamat</th>
                      <th>Nomor Meter</th>
                      <th>Status</th>
                      <th>Tanggal Input</th>
                      <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach($customer as $row): ?>
                    <tr class="text-center">
                      <td><?= $no++ ?></td>
                      <td><?= $row->nama ?></td>
                      <td><?= $row->nama_griya ?></td>
                      <td><?= $row->alamat ?></td>
                      <td><?= $row->nomor_meter ?></td>
                      <td><?= ($row->status == '1') ? 'AKTIF' : 'NON-AKTIF'; ?></td>
                      <td><?php echo date('d-M-Y', strtotime($row->inserted_at)); ?></td>
                      <td class="text-center">
                        <a id="update_customer" class="btn btn-sm btn-primary" href="javascript:;" data-toggle="modal" data-target="#update-customer" data-cid="<?= $row->cid; ?>" data-nama="<?= $row->nama; ?>" data-griya_id="<?= $row->id; ?>" data-alamat="<?= $row->alamat; ?>" data-golongan="<?= $row->golongan; ?>" data-nomor_meter="<?= $row->nomor_meter; ?>"><i class="fa fa-pen-square text-light"></i> Edit</a>
                        <a href="<?= base_url() ?>admin/status_pelanggan/<?= $row->cid ?>/<?= $row->status ?>" class="btn btn-sm btn-secondary" onclick="return confirm('Apakah anda yakin update status pelanggan?')"><?= ($row->status == '1') ? 'Non-aktifkan' : 'Aktifkan'; ?></a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
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

<!-- Modal Add Customer -->
<div class="modal fade bd-example-modal-lg" id="add-customer" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url(); ?>admin/add_customer" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Pelanggan" required autofocus>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" class="form-control" cols="30" rows="3" required></textarea>
          </div>
          <div class="form-group">
            <label for="alamat">Golongan (*Opsional)</label>
            <input name="golongan" class="form-control" placeholder="Masukkan Golongan Pelanggan">
          </div>
          <div class="form-group">
            <label for="level">Girya</label>
            <select class="form-control" name="griya" id="" required>
                <option value="" hidden disabled-selected>--Pilih Griya--</option>
                <?php foreach($griya as $row): ?>
                  <option value="<?= $row->id ?>" ><?= $row->nama ?></option>
                <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="nama">Nomor Meter</label>
            <input type="text" name="nomor_meter" class="form-control" placeholder="Masukkan Nomor Meter" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id=""><i class="fa fa-save text-light" onclick="return confirm('Apakah anda yakin tambah data pelanggan baru?')"></i> Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times-circle text-light"></i> Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Add Customer -->

<!-- Modal Update Customer -->
<div class="modal fade bd-example-modal-lg" id="update-customer" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Pelanggan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url(); ?>admin/update_customer" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="hidden" name="cid" id="cid">
            <input type="text" name="nama" id="nama_customer" class="form-control" placeholder="Masukkan Nama Pelanggan" required autofocus>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat_customer" class="form-control" cols="30" rows="3" required></textarea>
          </div>
          <div class="form-group">
            <label for="alamat">Golongan (*Opsional)</label>
            <input name="golongan" id="golongan_customer" class="form-control">
          </div>
          <div class="form-group">
            <label for="id_griya">Girya</label>
            <select class="form-control" name="griya" id="id_griya" required>
            </select>
          </div>
          <div class="form-group">
            <label for="nama">Nomor Meter</label>
            <input type="text" name="nomor_meter" id="nomor_meter" class="form-control" placeholder="Masukkan Nomor Meter" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id=""><i class="fa fa-save text-light" onclick="return confirm('Apakah anda yakin ubah data pelanggan ini?')"></i> Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times-circle text-light"></i> Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Update Customer -->


<!-- Script File -->
<?php include (APPPATH.'views/admin/components/scripts.php'); ?>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

</script>

<script>
$(document).on("click", "#update_customer", function () {
  $(".s_griya").remove();

	var cid         = $(this).data("cid");
	var nama        = $(this).data("nama");
	var alamat      = $(this).data("alamat");
	var griya_id    = $(this).data("griya_id");
	var golongan    = $(this).data("golongan");
	var nomor_meter = $(this).data("nomor_meter");

  $.ajax({
    type: "POST",
    url: "<?php echo base_url(); ?>" + "admin/get_griya",
    async: false,
    success: function (result) {
      var data = jQuery.parseJSON(result);
      var i = 0;
      while (i < data.length) {
        if (griya_id == data[i].id) {
          $("#id_griya").append(
            "<option class='s_griya' value='"+ data[i].id +"' selected>"+ data[i].nama +"</option>"                  
          );
        } else {
          $("#id_griya").append(
            "<option class='s_griya' value='"+ data[i].id +"'>"+ data[i].nama +"</option>"    
          );              
        }
        i++;
      }
    },
  });

	$("#cid").val(cid);
	$("#nama_customer").val(nama);
	$("#alamat_customer").val(alamat);
	$("#golongan_customer").val(golongan);
	$("#nomor_meter").val(nomor_meter);
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
