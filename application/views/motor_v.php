<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />

    <title>Daftar Motor</title>

    <style type="text/css">
        body {
            background: whitesmoke;
        }

        .nav-item a {
            color: grey;
        }

        .nav-item a.active {
            color: white;
            font-weight: bold;
        }

        .nav-item :hover {
            font-weight: bold;
            color: whitesmoke;
            /* background-color: blue; */
        }

        #sidebar {
            min-height: 100vh;
        }
    </style>
</head>

<body>
    <script src="<?= base_url(); ?>js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>js/script.js"></script>

    <!-- Navbar  -->
    <nav class="navbar navbar-light bg-info fixed-top">
        <div>
            <button type="button" class="btn btn-outline-light" id="sidebarmenu" title="Menu">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand text-white"><strong>RentBike</strong></a>
        </div>
        <a href="<?php echo base_url('Login/logout'); ?>">
            <button type="button" class="btn btn-outline-light " title="sign out">
                <i class="fas fa-sign-out-alt"></i>
            </button>
        </a>
    </nav>

    <div class="container-fluid mt-4">
        <div class="row">

            <!-- sidebar -->
            <div class="col-2 pt-5 bg-dark" id="sidebar">
                <div class="position-fixed">
                    <ul class="nav flex-column">
                        <?php if ($this->session->userdata('user_role') == "1") : ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url() ?>motor" title="Daftar Motor">
                                    <i class="fas fa-motorcycle"></i>
                                    <span class="ml-3">Daftar Motor</span>
                                </a>
                                <hr class="bg-secondary">
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url() ?>User" title="Kelola User">
                                    <i class="fas fa-clipboard-list"></i>
                                    <span class="ml-3">Kelola User</span>
                                </a>
                                <hr class="bg-secondary">
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url() ?>Pinjam" title="Pinjaman">
                                    <i class="fas fa-cart-arrow-down"></i>
                                    <span class="ml-3">Peminjaman Motor</span>
                                </a>
                                <hr class="bg-secondary">
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url() ?>Riwayat" title="pendapatan">
                                    <i class="fas fa-history"></i>
                                    <span class="ml-3">Riwayat Peminjaman</span>
                                </a>
                                <hr class="bg-secondary">
                            </li>
                        <?php else :  ?>

                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url() ?>motor" title="Daftar Motor">
                                    <i class="fas fa-motorcycle"></i>
                                    <span class="ml-3"> Daftar Motor</span>
                                </a>
                                <hr class="bg-secondary">
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url() ?>Pinjam" title="Peminjaman Motor">
                                    <i class="fas fa-cart-arrow-down"></i>
                                    <span class="ml-3">Peminjaman Motor</span>
                                </a>
                                <hr class="bg-secondary">
                            </li>

                        <?php endif ?>
                    </ul>
                </div>
            </div>

            <!-- main -->
            <div class="col-10" id="utama">
                <!-- Heading  -->
                <div class="head bg-white p-4 m-2 mt-5">
                    <h3 class="bg-white">Daftar Motor

                        <?php if ($this->session->userdata('user_role') == "1") : ?>
                            <?= "(Admin)" ?>
                        <?php else : ?>
                            <?= "yang Tersedia" ?>
                        <?php endif ?>

                    </h3>
                    <!-- Button trigger modal -->
                    <?php if ($this->session->userdata('user_role') == "1") : ?>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#staticBackdrop">
                            <i class="fa fa-plus"><strong> Tambah Motor</strong></i>
                        </button>
                    <?php else : ?>
                        <strong style="color: red"><small>* Silahkan pesan motor, kemudian melapor ke Admin untuk <strong>Konfirmasi!</strong> </small> </strong>
                    <?php endif ?>
                </div>

                <!-- Modal Tambah Daftar Motor-->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info text-white">
                                <h4 class="modal-title" id="staticBackdropLabel">Tambah Daftar Motor</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url() ?>motor/add" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Nama Motor</label>
                                        <input class="form-control" name="nama" id="exampleFormControlInput1" placeholder="Input Nama Motor">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Merk Motor</label>
                                        <input class="form-control" name="merk" id="exampleFormControlInput1" placeholder="Input Merk Motor">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Harga Sewa</label>
                                        <input type='number' min='0' class="form-control" name="harga" id="exampleFormControlInput1" placeholder="Input Harga Sewa Motor">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Tahun Motor</label>
                                        <input type='number' min='1990' class="form-control" name="tahun" id="exampleFormControlInput1" placeholder="Input Tahun Motor">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Jumlah Motor</label>
                                        <input type='number' min='0' class="form-control" name="jumlah" id="exampleFormControlInput1" placeholder="Input Jumlah Motor">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Done</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Motor -->

                <div class="makanan m-2 bg-white p-4 mt-4">
                    <?php if ($this->session->flashdata('flash')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('flash'); ?>
                            <button type="button" , class="close" , data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <script>
                                    <?= $this->session->set_flashdata('flash') ?>
                                </script>
                            </button>
                        </div>
                    <?php endif; ?>
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <button type="button" , class="close" , data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <?= validation_errors() ?>
                        </div>
                    <?php endif; ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">ID Motor</th>
                                <th scope="col">Merk</th>
                                <th scope="col">Tipe</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Harga Sewa</th>
                                <?php if ($this->session->userdata('user_role') == "3") : ?>
                                    <th scope="col">Status</th>
                                    <th scope="col">Durasi Sewa</th>
                                <?php else : ?>
                                    <th scope="col">Jumlah</th>
                                <?php endif ?>

                                <th scope="col">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php $i = 1 ?>
                            <?php foreach ($motor as $K) : ?>

                                <tr>
                                    <th scope="row"><?= $i ?>.</th>
                                    <td><?= $K['id_motor'] ?></td>
                                    <td> <?= $K['merk'] ?></td>
                                    <td> <?= $K['nama'] ?></td>
                                    <td><?= $K['tahun'] ?></td>
                                    <td>Rp. <?= $K['harga'] ?> / Hari</td>

                                    <?php if ($this->session->userdata('user_role') == "3") : ?>
                                        <?php if ($K['jumlah'] < 1) : ?>
                                            <td style="color: red;"><b>
                                                    Motor Tidak Tersedia
                                                </b></td>
                                        <?php endif ?>

                                        <?php if ($K['jumlah'] > 0) : ?>
                                            <td style="color: green;">
                                                Motor Tersedia
                                            </td>
                                        <?php endif ?>

                                    <?php else : ?>
                                        <td><?= $K['jumlah'] ?></td>
                                    <?php endif ?>


                                    <td>

                                        <?php if ($this->session->userdata('user_role') == '1') : ?>
                                            <a href="<?= base_url(); ?>motor/ubah/<?= $K['id_motor']; ?>" class="badge">
                                                <button type="button" class="btn btn-warning">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>


                                            <a href="<?= base_url(); ?>motor/del/<?= $K['id_motor']; ?>" onclick="return confirm('Apakah Motor Ini Akan Dihapus?'); Swal.fire()">
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>

                                            </a>
                                        <?php else : ?>
                                            <form action="<?= base_url() ?>motor/addPinjam/?>" method="post">
                                                <div class="form-group">
                                                    <div class="input-group mb-3" hidden>
                                                        <input type="text" name="id_user" class="form-control" aria-label="id_user" placeholder="" value="<?= $this->session->userdata('id') ?>">
                                                    </div>

                                                    <div class="input-group mb-3" hidden>
                                                        <input type="text" name="id_motor" class="form-control" aria-label="id_motor" placeholder="" value="<?= $K['id_motor']; ?>">
                                                    </div>

                                                    <div class="input-group mb-3" hidden>
                                                        <input type="text" name="status_pinjaman" class="form-control" aria-label="status_pinjaman" placeholder="" value="Menunggu Konfirmasi">
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <select class="form-control" name="paket" id="paket">
                                                            <option value="1">1 Hari</option>
                                                            <option value="3">3 Hari</option>
                                                            <option value="7">7 Hari</option>
                                                        </select>
                                                    </div>
                                                </div>
                                    <td>
                                        <?php if ($K['jumlah'] < 1) : ?>
                                            <button class="btn btn-success" type="submit" disabled><i class="fas fa-shopping-cart"></i></button> <!-- Arahkan ke Post -->
                                        <?php else : ?>
                                            <button class="btn btn-success" type="submit" onclick="Swal.fire({text:'Berhasil Menambahkan Motor', icon: 'success'})" data-toggle="tooltip" data-placement="top" title="Sewa Motor"><i class="fas fa-shopping-cart">

                                                </i></button> <!-- Arahkan ke Post -->
                                        <?php endif ?>
                                    </td>
                                    </form>

                                <?php endif ?>
                                </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>





            </div>

        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script>
        $(function() {

            // mobile aplication
            if ($(window).width() < 768) {
                $("#sidebar").hide();
                $("#utama").toggleClass('col-10 col');
            } else {
                $("#sidebar").show();
            }

            // want user show/head navbar
            $("#sidebarmenu").click(function() {
                if ($("#sidebar").is(":hidden")) {
                    if ($(window).width() < 768) {
                        $("#sidebar").show();
                        $("#utama").toggleClass('col col-10');
                        $(".nav-item span").hide();
                        // $(".nav-item hr").hide();
                    } else {
                        $("#sidebar").show();
                        $("#utama").toggleClass('col col-10');
                    }

                } else {
                    $("#sidebar").hide();
                    $("#utama").toggleClass('col-10 col');
                }
            });
        });

        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>
</body>

</html>