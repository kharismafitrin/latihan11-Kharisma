@extends('layouts.app')

@section('content')
<?php
// Mengambil ID dari URL jika tersedia
$id = isset($_GET['id']) ? $_GET['id'] : null;
?>
<section id="data_diri" class="container my-4 mx-auto shadow bg-white p-4">
    <div class="row">
        <div class="col-lg-7 col-md-12 row mx-auto">
            <div class="col-md-4 col-12 text-center my-auto">
                <img class="rounded-circle img-fluid" src="https://picsum.photos/600" alt="">
            </div>
            <div class="col-md-8 col-12 my-auto py-4">
                <?php if (isset($nama)) { ?>
                <p id="dataNama" class="fw-bold fs-5"><?php    echo ($nama); ?></p>
                <p id="dataRole"><?php    echo ($role); ?></p>
                <div class="row">
                    <div class="col-sm-6 col-12 d-grid gap-2">
                        <button class="btn btn-primary">edit</button>
                    </div>
                    <form action="crud.php" method="get" class="col-sm-6 col-12 d-grid gap-2 mt-2 mt-sm-0">
                        <input type="hidden" name="delete" value="<?php    echo ($id); ?>">
                        <input type="submit" value="delete" class="btn btn-outline-danger">
                    </form>
                </div>
                <?php } else { ?>
                <p id="dataNama" class="fw-bold fs-5">Nama Anda</p>
                <p id="dataRole">Role Anda</p>
                <?php } ?>
            </div>
        </div>
        <div class="col-lg-5 col-md-12 my-4 border-lg-start">
            <table class="table table-borderless">
                <tr>
                    <td class="fw-bold">Availability</td>
                    <td id="dataAvailability">
                        <?php echo isset($availability) ? ($availability) : 'Availability anda'; ?>
                    </td>
                </tr>
                <tr>
                    <td class="fw-bold">Usia</td>
                    <td id="dataAge"><?php echo isset($usia) ? ($usia) : 'umur anda'; ?></td>
                </tr>
                <tr>
                    <td class="fw-bold">Lokasi</td>
                    <td id="dataLokasi"><?php echo isset($lokasi) ? ($lokasi) : 'Lokasi anda'; ?></td>
                </tr>
                <tr>
                    <td class="fw-bold">Pengalaman</td>
                    <td id="dataPengalaman">
                        <?php echo isset($experience) ? ($experience) : 'Tahun pengalaman anda'; ?>
                    </td>
                </tr>
                <tr>
                    <td class="fw-bold">Email</td>
                    <td id="dataEmail" class="text-break"><?php echo isset($email) ? ($email) : 'email anda'; ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</section>
<section id="form-data" class="container my-4 mx-auto p-4 shadow bg-white">
    <?php
if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Tidak dapat menambah data!</strong> 
                        <p class="border-top border-danger mt-2">Terdapat kesalahan input pada form di bawah!<p>';
    foreach ($_SESSION['errors'] as $error) {
        echo '<ul><li>' . $error . '</li></ul>';
    }
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
    unset($_SESSION['errors']); // Hapus error setelah ditampilkan
}
if (isset($_SESSION['success']) && !empty($_SESSION['success'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
    echo '<strong>Success!</strong>' . $_SESSION["success"];
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    echo '</div>';
    unset($_SESSION['success']);
}
    ?>
    <form id="tambah_data" action="function.php" method="POST">
        <label class="form-label mt-4" for="nama">Nama</label>
        <input class="form-control" type="text" name="nama" id="nama" placeholder="masukkan nama anda">
        <label class="form-label mt-4" for="role">Role</label>
        <input class="form-control" type="text" name="role" id="role">
        <label class="form-label mt-4" for="availability">Availability</label>
        <select class="form-select" name="availability" id="availabilitySelect" aria-label="Default select example">
            <option value="Full Time" selected>Full time</option>
            <option value="Part Time">Part time</option>
            <option value="Internship">Internship</option>
        </select>
        <label class="form-label mt-4" for="usia">Usia</label>
        <input class="form-control" type="number" name="usia" id="usia">
        <label class="form-label mt-4" for="lokasi">Lokasi</label>
        <input class="form-control" type="text" name="lokasi" id="lokasi">
        <label class="form-label mt-4" for="experience">Years Experience</label>
        <input class="form-control" type="number" name="experience" id="experience">
        <label class="form-label mt-4" for="email">Email</label>
        <input class="form-control" type="text" name="email" id="email">
        <div class="d-grid gap-2 my-4">
            <input class="btn btn-success" type="submit" id="submit" value="submit">
        </div>
    </form>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection