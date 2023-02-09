<?php include (APPPATH.'views/admin/components/header.php'); ?>

<style>
    .img-audit{
      height: 100px !important;
    }
    .alert {
      padding: 0 !important;
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
            <a href="<?= base_url(); ?>admin/user" class="nav-link active">
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
            <h1>Data Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
              <li class="breadcrumb-item active">Data Admin</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="mb-3">
          <button class="btn btn-info mr-2" data-toggle="modal" data-target="#add-user"><i class="fa fa-plus-square"></i> Tambah Admin Baru</button>
        </div>

        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Data Admin</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr class="text-center">
                      <th>No.</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Level</th>
                      <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1;foreach($users as $row): ?>
                    <tr class="text-center">
                      <td><?= $no++ ?></td>
                      <td><?= $row->nama ?></td>
                      <td><?= $row->username ?></td>
                      <td><?= $row->level ?></td>
                      <td class="text-center">
                        <a id="update_user" class="btn btn-sm btn-primary" href="javascript:;" data-toggle="modal" data-target="#update-user" data-uid="<?= $row->uid; ?>" data-nama="<?= $row->nama; ?>" data-username="<?= $row->username; ?>" data-level="<?= $row->level; ?>"><i class="fa fa-pen-square text-light"></i> Edit</a>
                        <a class="btn btn-sm btn-danger" href="<?= base_url(); ?>admin/delete_user/<?= $row->uid; ?>" onclick="return confirm('Apakah anda yakin menghapus admin ini?');"><i class="fa fa-trash text-light"></i>  Hapus</a>
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

<!-- Modal Add User -->
<div class="modal fade bd-example-modal-lg" id="add-user" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Admin Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url(); ?>admin/add_user" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Admin" required autofocus>
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
          </div>
          <div class="form-group">
            <label for="konf_pass">Konfirmasi Password</label>
            <input id="konfPassword" type="password" name="konf_pass" class="form-control" placeholder="Masukkan Konfirmasi Password" required>
            <div>
              <span id="alertKonfPass"></span>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="" onclick="return confirm('Apakah anda yakin menambahkan admin baru?')">Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Add User -->

<!-- Modal Update User -->
<div class="modal fade bd-example-modal-lg" id="update-user" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url(); ?>admin/edit_user" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="hidden" name="id_user" class="form-control" id="id_user">
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama Admin" required autofocus>
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" id="username" disabled>
          </div>
          <div class="form-group">
            <label for="password">Password Baru</label>
            <input id="password" type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="" onclick="return confirm('Apakah anda yakin ubah data admin ini?')">Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Update User -->


<!-- Script File -->
<?php include (APPPATH.'views/admin/components/scripts.php'); ?>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

</script>

<script>
let pass = document.getElementById("password");
let pass_konf = document.getElementById("konfPassword");

pass_konf.addEventListener("input", () => {
	let alertPass = document.getElementById("alertKonfPass");

	if (pass.value != pass_konf.value) {
		alertPass.innerHTML = "*Konfirmasi password tidak sama!";
		alertPass.setAttribute("class", "alert alert-warning ");
	} else {
    alertPass.innerHTML = "*Konfirmasi password sesuai";
		alertPass.setAttribute("class", "alert alert-success");
  }
});
</script>

<script>
$(document).on("click", "#update_user", function () {
	var id       = $(this).data("uid");
	var username = $(this).data("username");
	var nama     = $(this).data("nama");

	$("#id_user").val(id);
	$("#username").val(username);
	$("#nama").val(nama);
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
