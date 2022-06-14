<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />

    <title>Kelola User</title>

    <style type="text/css">
        body {
            background: #edf1f5;
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
            color: white;
            /* background-color: blue; */
        }

        #sidebar {
            min-height: 100vh;
        }

        .password {

            display: inline-block;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 15ch;
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
                                <a class="nav-link" href="<?= base_url() ?>motor" title="Daftar Motor">
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
                                <a class="nav-link active" href="<?= base_url() ?>Pinjam" title="Pinjaman">
                                    <i class="fas fa-cart-arrow-down"></i>
                                    <span class="ml-3">Peminjaman Motor</span>
                                </a>
                                <hr class="bg-secondary">
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url() ?>Riwayat" title="riwayat">
                                    <i class="fas fa-history"></i>
                                    <span class="ml-3">Riwayat Peminjaman</span>
                                </a>
                                <hr class="bg-secondary">
                            </li>
                        <?php else :  ?>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url() ?>motor" title="Daftar Motor">
                                    <i class="fas fa-motorcycle"></i>
                                    <span class="ml-3"> Daftar Motor</span>
                                </a>
                                <hr class="bg-secondary">
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url() ?>Pinjam" title="Peminjaman Motor">
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
                    <h3 class="bg-white">Daftar Peminjaman Motor</h3>
                    <!-- Button trigger modal -->

                </div>

                <!-- Menunggu Konfirmasi -->
                <div class="m-2 bg-white p-4 mt-4">
                    <h5>Menunggu Konfirmasi</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">ID Motor</th>
                                <th scope="col">Merk</th>
                                <th scope="col">Tipe</th>
                                <th scope="col">Status Peminjaman</th>
                                <th scope="col">Durasi Sewa</th>


                                <?php if ($this->session->userdata('user_role') == "1") : ?>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Stok</th>
                                    <th> Aksi</th>
                                    <th></th>
                                <?php elseif ($this->session->userdata('user_role') == "3") : ?>
                                    <th scope="col">Total Harga</th>
                                    <th> Aksi</th>
                                <?php endif ?>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php var_dump($addkonf) ?> -->
                            <?php $i = 1 ?>
                            <?php $no = 1 ?>
                            <?php foreach ($addkonf as $A) : ?>
                                <?php if ($this->session->userdata('user_role') == "1") : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?>.</th>
                                        <td><?= $A['id_motor'] ?></td>
                                        <td><?= $A['merk'] ?></td>
                                        <td><?= $A['nama'] ?></td>
                                        <td><?= $A['status_pinjaman'] ?> </td>
                                        <td><?= $A['paket'] ?> Hari</td>
                                        <td><?= $A['username'] ?></td>
                                        <td><?= $A['email'] ?></td>
                                        <?php if ($A['jumlah'] < 1) : ?>
                                            <td style="color: red;"><b>
                                                    Tidak Tersedia
                                                </b></td>
                                        <?php else : ?>
                                            <td style="color: green;"><b>
                                                    Tersedia
                                                </b></td>
                                        <?php endif ?>

                                        <td>
                                            <form action="<?= base_url() ?>Pinjam/addkonfirmasi/<?= $A['id_sdpinjam']; ?>" method="post">
                                                <div class="form-group" hidden>
                                                    <div class="input-group mb-3" hidden>
                                                        <input type="text" name="id_user" class="form-control" aria-label="id_user" placeholder="" value="<?= $A['id_user'] ?>">
                                                    </div>
                                                    <div class="input-group mb-3" hidden>
                                                        <input type="text" name="id_motor" class="form-control" aria-label="id_motor" placeholder="" value="<?= $A['id_motor'] ?>">
                                                    </div>
                                                    <div class="input-group mb-3" hidden>
                                                        <input type="text" name="status_pinjaman" class="form-control" aria-label="status_pinjaman" placeholder="" value="<?= $A['status_pinjaman'] = 'Sedang Dipinjam' ?>">
                                                    </div>
                                                    <div class="input-group mb-3" hidden>
                                                        <input type="text" name="jumlah" class="form-control" aria-label="jumlah" placeholder="" value="<?= $A['jumlah'] - 1 ?>">
                                                    </div>
                                                    <div class="input-group mb-3" hidden>
                                                        <input type="text" name="paket" class="form-control" aria-label="paket" placeholder="" value="<?= $A['paket'] ?>">
                                                    </div>
                                                    <div class="input-group mb-3" hidden>
                                                        <input type="text" name="waktu_pinjam" class="form-control" aria-label="waktu_pinjam" placeholder="" value="<?= date("Y-m-d h:i:s"); ?>">
                                                    </div>

                                                </div>
                                                <?php if ($A['jumlah'] < 1) : ?>
                                                    <button class="btn btn-success" type="submit" disabled>
                                                        <i class="fa fa-check"></i>
                                                    </button> <!-- Arahkan ke Post -->
                                                <?php else : ?>
                                                    <button class="btn btn-success" type="submit" onclick="Swal.fire({text:'Motor Berhasil Dikonfirmasi', icon: 'success'})" data-toggle="tooltip" data-placement="top" title="Konfirmasi Sewa"><i class="fa fa-check"></i></button> <!-- Arahkan ke Post -->
                                                <?php endif ?>

                                            </form>


                                        </td>
                                        <td>
                                            <form action="<?= base_url() ?>Pinjam/del/<?= $A['id_sdpinjam']; ?>" method="post">
                                                <button type="submit" class="btn btn-danger" onclick="Swal.fire({text:'Peminjaman Motor Berhasil Dibatalkan', icon: 'success'})" data-toggle="tooltip" data-placement="top" title="Batalkan Sewa">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>

                                    <?php endif ?>

                                    <?php if ($this->session->userdata('user_role') == "3") : ?>
                                        <?php if ($this->session->userdata('id') == $A['id_user']) : ?>
                                    <tr>
                                        <th scope="row"><?= $no ?>.</th>
                                        <td><?= $A['id_motor'] ?></td>
                                        <td><?= $A['merk'] ?></td>
                                        <td><?= $A['nama'] ?></td>
                                        <td><?= $A['status_pinjaman'] ?> </td>
                                        <td><?= $A['paket'] ?> Hari</td>
                                        <div hidden>
                                            <?= $total_harga = $A['paket'] * $A['harga'] ?>
                                        </div>
                                        <td>Rp. <?= $total_harga ?></td>
                                        <td>
                                            <form action="<?= base_url() ?>Pinjam/del/<?= $A['id_sdpinjam']; ?>" method="post">
                                                <button type="submit" class="btn btn-danger" onclick="Swal.fire({text:'Peminjaman Motor Berhasil Dibatalkan', icon: 'success'})" data-toggle="tooltip" data-placement="top" title="Batalkan Sewa">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <?php $no++ ?>
                                    </tr>
                                <?php endif ?>
                            <?php endif ?>
                            <?php $i++ ?>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>




                <!-- Sedang Dipinjam -->
                <div class="m-2 bg-white p-4 mt-4">

                    <h5>Sedang Dipinjam</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">ID Motor</th>
                                <th scope="col">Merk</th>
                                <th scope="col">Tipe</th>

                                <th scope="col">Status Peminjaman</th>
                                <th scope="col">Durasi Sewa</th>

                                <?php if ($this->session->userdata('user_role') == "1") : ?>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th>Aksi</th>
                                <?php endif ?>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $i = 1 ?>
                            <?php $no = 1 ?>
                            <?php foreach ($pinjam as $P) : ?>
                                <?php if ($this->session->userdata('user_role') == "1") : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?>.</th>
                                        <td><?= $P['id_motor'] ?></td>
                                        <td><?= $P['merk'] ?></td>
                                        <td><?= $P['nama'] ?></td>
                                        <td><?= $P['status_pinjaman'] ?> </td>
                                        <td><?= $P['paket'] ?> Hari</td>
                                        <td><?= $P['username'] ?></td>
                                        <td><?= $P['email'] ?></td>

                                        <td>
                                            <form action="<?= base_url() ?>Pinjam/addriwayat/<?= $P['id_pinjam']; ?>" method="post">
                                                <div class="form-group" hidden>
                                                    <div class="input-group mb-3" hidden>
                                                        <input type="text" name="id_user" class="form-control" aria-label="id_user" placeholder="" value="<?= $P['id_user'] ?>">
                                                    </div>
                                                    <div class="input-group mb-3" hidden>
                                                        <input type="text" name="id_motor" class="form-control" aria-label="id_motor" placeholder="" value="<?= $P['id_motor'] ?>">
                                                    </div>
                                                    <div class="input-group mb-3" hidden>
                                                        <input type="text" name="tanggal_kembali" class="form-control" aria-label="tanggal_kembali" placeholder="" value="<?= date("Y-m-d h:i:s"); ?>">
                                                    </div>
                                                    <div class="input-group mb-3" hidden>
                                                        <input type="text" name="jumlah" class="form-control" aria-label="jumlah" placeholder="" value="<?= $P['jumlah'] + 1 ?>">
                                                    </div>
                                                    <div class="input-group mb-3" hidden>
                                                        <input type="text" name="paket" class="form-control" aria-label="paket" placeholder="" value="<?= $P['paket'] ?>">
                                                    </div>
                                                    <div class="input-group mb-3" hidden>
                                                        <input type="text" name="tanggal_pinjam" class="form-control" aria-label="tanggal_pinjam" placeholder="" value="<?= $P['waktu_pinjam'] ?>">
                                                    </div>
                                                </div>


                                                <button class="btn btn-success" type="submit" onclick="Swal.fire({text:'Peminjaman Berhasil Diselesaikan', icon: 'success'})">Selesai</button> <!-- Arahkan ke Post -->
                                            </form>
                                        </td>


                                    <?php endif ?>
                                    <?php if ($this->session->userdata('user_role') == "3") : ?>
                                        <?php if ($this->session->userdata('id') == $P['id_user']) : ?>
                                    <tr>
                                        <th scope="row"><?= $no ?>.</th>
                                        <td><?= $P['id_motor'] ?></td>
                                        <td><?= $P['merk'] ?></td>
                                        <td><?= $P['nama'] ?></td>
                                        <td><?= $P['status_pinjaman'] ?> </td>
                                        <td><?= $P['paket'] ?> Hari</td>

                                        <?php $no++ ?>
                                    </tr>
                                <?php endif; ?>
                            <?php endif ?>
                            <?php $i++ ?>
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
    </script>
</body>

</html>