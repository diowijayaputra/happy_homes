<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../assets/css/main.css" rel="stylesheet" />
    <title>Happy Homes</title>
</head>

<body>
    <nav class="nav nav-top">
        <li class="nav-link nav-color fw-600" aria-current="page"><span class="fs-20">Timesheet</span><br>Management</li>
    </nav>
    <div class="row p-3 pb-0">
        <div class="col-12">
            <h3>HH Timesheet</h3>
        </div>
        <div class="col-12">
            <nav class="nav">
                <li class="nav-item">
                    <a onclick="btnKegiatan()" id="nav-kegiatan" class="nav-link nav-2-color active" aria-current="page" href="#">Daftar Kegiatan</a>
                </li>
                <li class="nav-item">
                    <a onclick="btnPengaturan()" id="nav-pengaturan" class="nav-link nav-2-color" href="#">Pengaturan</a>
                </li>
            </nav>
        </div>
    </div>
    <section id="halaman-kegiatan" class="row p-3 ps-4 pe-4">
        <div class="col-12 text-center bg-white p-0">
            <nav class="nav nav-content text-start">
                <li class="nav-link text-dark m-2" aria-current="page">Nama Karyawan<br><span id="nama-karyawan-header" class="fs-18"></span></li>
                <li class="nav-link text-dark m-2" aria-current="page">Rate<br><span id="rate-header" class="fs-18"></span></li>
                <li class="nav-link d-flex align-items-center m-2" aria-current="page"><button onclick="exportCSV()" class="btn btn-success for-export-btn"><i class="fa fa-file-excel-o me-1"></i> Export csv</button></li>
            </nav>
            <div class="row p-3">
                <div class="col-12 d-flex align-items-center m-2">
                    <span class="fs-18 fw-700">Daftar Kegiatan</span>
                    <button onclick="btnModalKegiatan()" class="btn btn-tambah-kegiatan ms-3"><i class="fa fa-plus-circle me-1"></i>Tambah Kegiatan</button>
                    <li class="nav-item d-flex for-searchbar">
                        <div class="input-group">
                            <span onclick="btnSearch()" class="input-group-text">
                                <i class="fa fa-search"></i>
                            </span>
                            <input id="search" type="text" class="form-control me-2" placeholder="Cari" aria-label="Cari">
                        </div>
                        <button onclick="btnFilter()" class="btn btn-filter">
                            <i class="fa fa-navicon"></i>
                        </button>
                    </li>
                </div>
            </div>
            <div class="row p-3 ps-4 pe-4">
                <div class="col-2 d-flex justify-content-center align-items-center table-header-top-left-corner">
                    Judul Kegiatan
                </div>
                <div class="col d-flex justify-content-center align-items-center table-header">
                    Nama Proyek
                </div>
                <div class="col d-flex justify-content-center align-items-center table-header">
                    Tgl Mulai
                </div>
                <div class="col d-flex justify-content-center align-items-center table-header">
                    Tgl Berakhir
                </div>
                <div class="col d-flex justify-content-center align-items-center table-header">
                    Waktu Mulai
                </div>
                <div class="col d-flex justify-content-center align-items-center table-header">
                    Waktu Berakhir
                </div>
                <div class="col d-flex justify-content-center align-items-center table-header">
                    Durasi
                </div>
                <div class="col-1 d-flex justify-content-center align-items-center table-header-top-right-corner">
                    Aksi
                </div>
                <div id="data">
                    <!-- APPEND BY JS -->
                </div>
                <div class="row gx-0 p-2 ps-3 pe-3 bg-grey table-header-bottom">
                    <div class="col-6 text-start">
                        <span class="total-data">Total Durasi</span>
                        <br>
                        <span class="total-data fs-18 fw-600">Total Pendapatan</span>
                        <br>
                        <br>
                        <span class="total-data">Total Durasi Overtime</span>
                        <br>
                        <span class="total-data fs-18 fw-600">Total Pendapatan Overtime</span>
                    </div>
                    <div class="col-6 text-end">
                        <span id="total-durasi" class="total-data"></span>
                        <br>
                        <span id="total-pendapatan" class="total-data fs-18 fw-600"></span>
                        <br>
                        <br>
                        <span id="total-durasi-overtime" class="total-data"></span>
                        <br>
                        <span id="total-pendapatan-overtime" class="total-data fs-18 fw-600"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="halaman-pengaturan" class="row d-none">
        <div class="col-12 text-start bg-light p-0">
            <div class="row p-3 m-3 bg-white br-10">
                <div class="col-12">
                    Nama Karyawan
                    <input id="nama-karyawan" type="text" class="form-control" placeholder="Nama Karyawan">
                </div>
                <div class="col-12 mt-3">
                    Rate
                    <input id="rate" type="text" class="form-control" placeholder="Rate">
                </div>
                <div class="col-6 mt-3">
                    <button class="btn btn-batalkan">Batalkan</button>
                </div>
                <div class="col-6 mt-3">
                    <button onclick="simpanPengaturan()" class="btn btn-simpan">Simpan</button>
                </div>
            </div>
        </div>
    </section>
</body>

<!-- MODAL CUSTOM -->
<div id="modal-utility" class="modal fade" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-600"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- APPEND BY JS -->
            </div>
            <div class="modal-footer">
                <!-- APPEND BY JS -->
            </div>
        </div>
    </div>
</div>

</html>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
<script src="export.js"></script>

<script>
    var arr_durasi_overtime_total = [];
    var each_Data = "";
    var total_durasi = 0;
    var total_durasi_overtime = 0;
    var total_pendapatan = 0;
    var total_pendapatan_overtime = 0;

    function btnKegiatan() {
        $("#nav-kegiatan").addClass("active");
        $("#nav-pengaturan").removeClass("active");

        $("#halaman-kegiatan").removeClass("d-none");
        $("#halaman-pengaturan").addClass("d-none");
    }

    function btnPengaturan() {
        $("#nav-kegiatan").removeClass("active");
        $("#nav-pengaturan").addClass("active");

        $("#halaman-kegiatan").addClass("d-none");
        $("#halaman-pengaturan").removeClass("d-none");
    }

    showKegiatan();
    showTotalData();

    function showKegiatan() {
        var fd = new FormData();

        $.ajax({
            type: "GET",
            url: "../logics/get-kegiatan.php",
            data: fd,
            enctype: 'multipart/form-data',
            cache: false,
            processData: false,
            async: false,
            contentType: false,
            success: function(response) {
                var data = JSON.parse(response);
                console.log(data);
                each_data = data;

                $("#data").html('');

                if (data.length > 0) {
                    for (var i = 0; i <= data.length; i++) {
                        var html = `<div class="row">
                            <div class="col-2 d-flex justify-content-center align-items-center table-header">
                                ${data[i].JUDUL_KEGIATAN}
                            </div>
                            <div class="col d-flex justify-content-center align-items-center table-header">
                                ${data[i].NAMA_PROYEK}
                            </div>
                            <div class="col d-flex justify-content-center align-items-center table-header">
                                ${data[i].TGL_MULAI}
                            </div>
                            <div class="col d-flex justify-content-center align-items-center table-header">
                                ${data[i].TGL_BERAKHIR}
                            </div>
                            <div class="col d-flex justify-content-center align-items-center table-header">
                                ${data[i].WAKTU_MULAI}
                            </div>
                            <div class="col d-flex justify-content-center align-items-center table-header">
                                ${data[i].WAKTU_BERAKHIR}
                            </div>
                            <div class="col d-flex justify-content-center align-items-center table-header">
                                ${data[i].DURASI}
                            </div>
                            <div class="col-1 d-flex justify-content-center align-items-center table-header">
                                <button onclick="btnModalEdit(${data[i].ID})" class="btn btn-custom d-flex justify-content-center align-items-center">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button onclick="btnDelete(${data[i].ID})" class="btn btn-custom d-flex justify-content-center align-items-center ms-1">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </div>
                        </div>`;

                        $("#data").append(html);
                        arr_durasi_overtime_total.push(data[i].DURASI_OVERTIME_TOTAL);
                    }
                } else {
                    var html = `<div class="row">
                        <div class="col-12 text-center table-header br-un">
                            <p class="m-5 text-light-2">Belum ada kegiatan</p>
                        </div>
                    </div>`;

                    $("#data").html(html);
                }
            },
            error: function(response) {
                alert("SHOW KEGIATAN GAGAL");
            }
        });
    }

    function showTotalData() {
        var rate = localStorage.getItem("rate");
        var fd = new FormData();

        fd.append("rate", parseInt(rate));

        $.ajax({
            type: "POST",
            url: "../logics/get-total.php",
            data: fd,
            enctype: 'multipart/form-data',
            cache: false,
            processData: false,
            async: false,
            contentType: false,
            success: function(response) {
                // MERUBAH FORMAT WAKTU KE MILISECOND
                function parseTimeString(timeString) {
                    const [hours, minutes, seconds] = timeString.split(':').map(Number);
                    return (hours * 3600 + minutes * 60 + seconds) * 1000;
                }

                // MERUBAH FORMAT WAKTU DARI MILISECOND KE FORMAT AWALNYA
                function formatDuration(milliseconds) {
                    const totalSeconds = Math.floor(milliseconds / 1000);
                    const hours = Math.floor(totalSeconds / 3600);
                    const minutes = Math.floor((totalSeconds % 3600) / 60);
                    const seconds = totalSeconds % 60;
                    return `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
                }

                // MERUBAH FORMAT WAKTU DARI 06:50:00 => 6 JAM 50 MENIT
                function convertTimeStringToReadableFormat(timeString) {
                    const [hours, minutes, seconds] = timeString.split(':').map(Number);
                    let result = "";

                    if (hours > 0) {
                        result += `${hours} jam `;
                    }

                    if (minutes > 0) {
                        result += `${minutes} menit`;
                    }

                    return result.trim();
                }

                let totalMilliseconds = arr_durasi_overtime_total.reduce((total, timeString) => {
                    return total + parseTimeString(timeString);
                }, 0);

                // UNTUK MENGHITUNG TARIF OVERTIME
                function convertTimeStringToTotalMinutes(timeString) {
                    const [hours, minutes, seconds] = timeString.split(':').map(Number);
                    return (hours * 60) + minutes;
                }

                function calculateTotalCost(timeString, ratePerHour) {
                    const totalMinutes = convertTimeStringToTotalMinutes(timeString);
                    const ratePerMinute = ratePerHour / 60;
                    return totalMinutes * ratePerMinute;
                }

                function formatCurrency(amount) {
                    return amount.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                }

                // var ratePerHour = $("#rate-header").text();
                let totalTime = formatDuration(totalMilliseconds);
                let totalCost = calculateTotalCost(totalTime, rate);
                let total_tarif_overtime = formatCurrency(totalCost * 30 / 100);
                var data = JSON.parse(response);

                $("#total-durasi").text(data[0].TOTAL_DURASI);
                $("#total-pendapatan").text("Rp" + data[0].TOTAL_PENDAPATAN);
                $("#total-durasi-overtime").text(convertTimeStringToReadableFormat(totalTime));
                $("#total-pendapatan-overtime").text("Rp" + total_tarif_overtime);

                total_durasi = data[0].TOTAL_DURASI;
                total_pendapatan = data[0].TOTAL_PENDAPATAN;
                total_durasi_overtime = convertTimeStringToReadableFormat(totalTime);
                total_pendapatan_overtime = total_tarif_overtime;
            },
            error: function(response) {
                alert("SHOW TOTAL GAGAL");
            }
        });
    }

    function btnModalKegiatan() {
        var html_body = `<div class="row">
            <div class="col-3">
                Tgl Mulai
                <input id="tgl_mulai" type="date" class="form-control">
            </div>
            <div class="col-3">
                Tgl Berakhir
                <input id="tgl_berakhir" type="date" class="form-control">
            </div>
            <div class="col-3">
                Jam Mulai
                <input id="waktu_mulai" type="time" class="form-control">
            </div>
            <div class="col-3">
                Jam Berakhir
                <input id="waktu_berakhir" type="time" class="form-control">
            </div>
            <div class="col-12 mt-3">
                <span class="text-light-2">Judul Kegiatan <span class="text-red">*</span></span>
                <input id="judul_kegiatan" type="text" class="form-control mt-1" placeholder="Judul Kegiatan">
            </div>
            <div class="col-12 mt-3">
                <span class="text-light-2">Nama Proyek <span class="text-red">*</span></span>
                <select id="select_proyek" class="form-select mt-1">
                    <option value="0" selected>+ Tambah Proyek</option>
                </select>
            </div>
        </div>`;

        var html_footer = `<button type="button" class="btn btn-kembali" data-bs-dismiss="modal">Kembali</button>
        <button onclick="btnTambahKegiatan()" type="button" class="btn btn-simpan-modal">Simpan</button>`;

        $(".modal-title").text("Tambah Kegiatan Baru");
        $(".modal-body").html(html_body);
        $(".modal-footer").html(html_footer);

        $("#modal-utility").modal('show');
        getProyek();
    }

    function btnTambahKegiatan() {
        var object = {}

        $("input, select").each(function(index, value) {
            object[value.id] = $(value).val();
        });

        if (object.waktu_mulai && object.waktu_berakhir) {
            var start = new Date('1970-01-01T' + object.waktu_mulai + 'Z');
            var end = new Date('1970-01-01T' + object.waktu_berakhir + 'Z');
            var gap = end - start;
            var hours = Math.floor(gap / 1000 / 60 / 60);
            var minutes = Math.floor((gap % (1000 * 60 * 60)) / 1000 / 60);
            var seconds = Math.floor((gap % (1000 * 60)) / 1000);

            hours = String(hours).padStart(2, '0');
            minutes = String(minutes).padStart(2, '0');
            seconds = String(seconds).padStart(2, '0');
            durasi = hours + ':' + minutes + ':' + seconds
        }

        var fd = new FormData();

        fd.append("judul_kegiatan", object.judul_kegiatan);
        fd.append("nama_proyek", object.select_proyek);
        fd.append("tgl_mulai", object.tgl_mulai);
        fd.append("tgl_berakhir", object.tgl_berakhir);
        fd.append("waktu_mulai", object.waktu_mulai);
        fd.append("waktu_berakhir", object.waktu_berakhir);
        fd.append("durasi", durasi);

        $.ajax({
            type: "POST",
            url: "../logics/save-kegiatan.php",
            data: fd,
            enctype: 'multipart/form-data',
            cache: false,
            processData: false,
            async: false,
            contentType: false,
            success: function(response) {
                var info = "Tambah Kegiatan Baru Berhasil";
                popUp(info);
            },
            error: function(response) {
                alert("SAVE KEGIATAN GAGAL");
            }
        });
    }

    function btnModalEdit(id) {
        var fd = new FormData();

        fd.append("id", id);

        $.ajax({
            type: "POST",
            url: "../logics/get-edit-kegiatan.php",
            data: fd,
            enctype: 'multipart/form-data',
            cache: false,
            processData: false,
            async: false,
            contentType: false,
            success: function(response) {
                var data = JSON.parse(response);

                var html_body = `<div class="row">
                    <div class="col-3">
                        Tgl Mulai
                        <input id="edit_tgl_mulai" type="date" class="form-control" value="${data[0].TGL_MULAI}">
                    </div>
                    <div class="col-3">
                        Tgl Berakhir
                        <input id="edit_tgl_berakhir" type="date" class="form-control" value="${data[0].TGL_BERAKHIR}">
                    </div>
                    <div class="col-3">
                        Jam Mulai
                        <input id="edit_waktu_mulai" type="time" class="form-control" value="${data[0].WAKTU_MULAI}">
                    </div>
                    <div class="col-3">
                        Jam Berakhir
                        <input id="edit_waktu_berakhir" type="time" class="form-control" value="${data[0].WAKTU_BERAKHIR}">
                    </div>
                    <div class="col-12 mt-3">
                        <span class="text-light-2">Judul Kegiatan <span class="text-red">*</span></span>
                        <input id="edit_judul_kegiatan" type="text" class="form-control mt-1" placeholder="Judul Kegiatan" value="${data[0].JUDUL_KEGIATAN}">
                    </div>
                    <div class="col-12 mt-3">
                        <span class="text-light-2">Nama Proyek <span class="text-red">*</span></span>
                        <select id="edit_select_proyek" class="form-select mt-1">
                            <option value="0" selected>+ Tambah Proyek</option>
                        </select>
                    </div>
                </div>`;

                var html_footer = `<button type="button" class="btn btn-kembali" data-bs-dismiss="modal">Kembali</button>
                <button onclick="btnEdit(${data[0].ID})" type="button" class="btn btn-simpan-modal">Simpan</button>`;

                $(".modal-title").text("Tambah Kegiatan Baru");
                $(".modal-body").html(html_body);
                $(".modal-footer").html(html_footer);
                $("#modal-utility").modal('show');

                getProyek();

                $("#edit_select_proyek").val(data[0].NAMA_PROYEK).attr("selected");
            },
            error: function(response) {
                alert("GET EDIT KEGIATAN GAGAL");
            }
        });
    }

    function btnEdit(id) {
        var object = {}

        $("input, select").each(function(index, value) {
            object[value.id] = $(value).val();
        });

        if (object.edit_waktu_mulai && object.edit_waktu_berakhir) {
            var start = new Date('1970-01-01T' + object.edit_waktu_mulai + 'Z');
            var end = new Date('1970-01-01T' + object.edit_waktu_berakhir + 'Z');
            var gap = end - start;
            var hours = Math.floor(gap / 1000 / 60 / 60);
            var minutes = Math.floor((gap % (1000 * 60 * 60)) / 1000 / 60);
            var seconds = Math.floor((gap % (1000 * 60)) / 1000);

            hours = String(hours).padStart(2, '0');
            minutes = String(minutes).padStart(2, '0');
            seconds = String(seconds).padStart(2, '0');
            edit_durasi = hours + ':' + minutes + ':' + seconds
        }

        var fd = new FormData();

        fd.append("id", id);
        fd.append("edit_judul_kegiatan", object.edit_judul_kegiatan);
        fd.append("edit_nama_proyek", object.edit_select_proyek);
        fd.append("edit_tgl_mulai", object.edit_tgl_mulai);
        fd.append("edit_tgl_berakhir", object.edit_tgl_berakhir);
        fd.append("edit_waktu_mulai", object.edit_waktu_mulai);
        fd.append("edit_waktu_berakhir", object.edit_waktu_berakhir);
        fd.append("edit_durasi", edit_durasi);

        $.ajax({
            type: "POST",
            url: "../logics/edit-kegiatan.php",
            data: fd,
            enctype: 'multipart/form-data',
            cache: false,
            processData: false,
            async: false,
            contentType: false,
            success: function(response) {
                var info = "Edit Kegiatan Berhasil";
                popUp(info);
            },
            error: function(response) {
                alert("EDIT KEGIATAN GAGAL");
            }
        });
    }

    function btnDelete(id) {
        var fd = new FormData();

        fd.append("id", id);

        $.ajax({
            type: "POST",
            url: "../logics/delete-kegiatan.php",
            data: fd,
            enctype: 'multipart/form-data',
            cache: false,
            processData: false,
            async: false,
            contentType: false,
            success: function(response) {
                var info = "Delete Kegiatan Berhasil";
                popUp(info);
            },
            error: function(response) {
                alert("DELETE KEGIATAN GAGAL");
            }
        });
    }

    function btnFilter() {
        var html_body = `<span class="text-light-2">Proyek <span class="text-red">*</span></span>
        <select id="select_filter" class="form-select mt-1">
            <option value="0" selected>Proyek</option>
        </select>`;

        var html_footer = `<button onclick="clearFilter()" type="button" class="btn btn-hapus-filter">Hapus Filter</button>
        <button onclick="applyFilter()" type="button" class="btn btn-terapkan">Terapkan</button>`;

        $(".modal-title").text("Filter");
        $(".modal-body").html(html_body);
        $(".modal-footer").html(html_footer);

        $("#modal-utility").modal('show');
        getProyek();
    }

    function btnSearch() {
        var search = $("#search").val();
        var fd = new FormData();

        fd.append("search", search);

        $.ajax({
            type: "POST",
            url: "../logics/search-proyek.php",
            data: fd,
            enctype: 'multipart/form-data',
            cache: false,
            processData: false,
            async: false,
            contentType: false,
            success: function(response) {
                var data = JSON.parse(response);
                each_data = data;

                $("#data").html('');

                if (data.length > 0) {
                    for (var i = 0; i <= data.length; i++) {
                        var html = `<div class="row">
                            <div class="col-2 d-flex justify-content-center align-items-center table-header">
                                ${data[i].JUDUL_KEGIATAN}
                            </div>
                            <div class="col d-flex justify-content-center align-items-center table-header">
                                ${data[i].NAMA_PROYEK}
                            </div>
                            <div class="col d-flex justify-content-center align-items-center table-header">
                                ${data[i].TGL_MULAI}
                            </div>
                            <div class="col d-flex justify-content-center align-items-center table-header">
                                ${data[i].TGL_BERAKHIR}
                            </div>
                            <div class="col d-flex justify-content-center align-items-center table-header">
                                ${data[i].WAKTU_MULAI}
                            </div>
                            <div class="col d-flex justify-content-center align-items-center table-header">
                                ${data[i].WAKTU_BERAKHIR}
                            </div>
                            <div class="col d-flex justify-content-center align-items-center table-header">
                                ${data[i].DURASI}
                            </div>
                            <div class="col-1 d-flex justify-content-center align-items-center table-header">
                                <button onclick="btnModalEdit(${data[i].ID})" class="btn btn-custom d-flex justify-content-center align-items-center">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button onclick="btnDelete(${data[i].ID})" class="btn btn-custom d-flex justify-content-center align-items-center ms-1">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </div>
                        </div>`;

                        $("#data").append(html);
                    }
                } else {
                    var html = `<div class="row">
                        <div class="col-12 text-center table-header br-un">
                            <p class="m-5 text-light-2">Data tidak ditemukan</p>
                        </div>
                    </div>`;

                    $("#data").html(html);
                }
            },
            error: function(response) {
                alert("SEARCH PROYEK GAGAL");
            }
        });
    }

    function saveProyek() {
        var nama_proyek = $("#proyek-baru").val();
        var fd = new FormData();

        fd.append("nama_proyek", nama_proyek);

        $.ajax({
            type: "POST",
            url: "../logics/save-proyek.php",
            data: fd,
            enctype: 'multipart/form-data',
            cache: false,
            processData: false,
            async: false,
            contentType: false,
            success: function(response) {
                var info = "Tambah Proyek Baru Berhasil";
                popUp(info);
            },
            error: function(response) {
                alert("SAVE PROYEK GAGAL");
            }
        });
    }

    function getProyek() {
        var fd = new FormData();

        $.ajax({
            type: "GET",
            url: "../logics/get-proyek.php",
            data: fd,
            enctype: 'multipart/form-data',
            cache: false,
            processData: false,
            async: false,
            contentType: false,
            success: function(response) {
                var data = JSON.parse(response);

                for (var i = 0; i <= data.length; i++) {
                    var proyek_list_html = `<option value="${data[i].ID}">${data[i].NAMA_PROYEK}</option>`;

                    $("#select_proyek").append(proyek_list_html);
                    $("#edit_select_proyek").append(proyek_list_html);
                    $("#select_filter").append(proyek_list_html);
                }
            },
            error: function(response) {
                alert("GET PROYEK GAGAL");
            }
        });
    }

    function clearFilter() {
        $("#select_filter").val(0);
        showKegiatan();
    }

    function applyFilter() {
        var select_filter = $("#select_filter").val();
        var fd = new FormData();

        fd.append("select_filter", select_filter);

        $.ajax({
            type: "POST",
            url: "../logics/filter-proyek.php",
            data: fd,
            enctype: 'multipart/form-data',
            cache: false,
            processData: false,
            async: false,
            contentType: false,
            success: function(response) {
                var data = JSON.parse(response);
                each_data = data;

                $("#data").html('');

                if (data.length > 0) {
                    for (var i = 0; i <= data.length; i++) {
                        var html = `<div class="row">
                            <div class="col-2 d-flex justify-content-center align-items-center table-header">
                                ${data[i].JUDUL_KEGIATAN}
                            </div>
                            <div class="col d-flex justify-content-center align-items-center table-header">
                                ${data[i].NAMA_PROYEK}
                            </div>
                            <div class="col d-flex justify-content-center align-items-center table-header">
                                ${data[i].TGL_MULAI}
                            </div>
                            <div class="col d-flex justify-content-center align-items-center table-header">
                                ${data[i].TGL_BERAKHIR}
                            </div>
                            <div class="col d-flex justify-content-center align-items-center table-header">
                                ${data[i].WAKTU_MULAI}
                            </div>
                            <div class="col d-flex justify-content-center align-items-center table-header">
                                ${data[i].WAKTU_BERAKHIR}
                            </div>
                            <div class="col d-flex justify-content-center align-items-center table-header">
                                ${data[i].DURASI}
                            </div>
                            <div class="col-1 d-flex justify-content-center align-items-center table-header">
                                <button onclick="btnModalEdit(${data[i].ID})" class="btn btn-custom d-flex justify-content-center align-items-center">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button onclick="btnDelete(${data[i].ID})" class="btn btn-custom d-flex justify-content-center align-items-center ms-1">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </div>
                        </div>`;

                        $("#data").append(html);
                    }
                } else {
                    var html = `<div class="row">
                        <div class="col-12 text-center table-header br-un">
                            <p class="m-5 text-light-2">Data tidak ditemukan</p>
                        </div>
                    </div>`;

                    $("#data").html(html);
                }
            },
            error: function(response) {
                alert("APPLY FILTER GAGAL");
            }
        });
    }

    function exportCSV() {
        const new_datas = each_data.map((user, index) => ({
            ...user,
            no: index + 1
        }));

        const excel_data = [
            ['Judul Kegiatan', 'Nama Proyek', 'Tgl Mulai', 'Tgl Berakhir', 'Waktu Mulai', 'Waktu Berakhir', 'Durasi'],
            ...new_datas.map(data => [data.JUDUL_KEGIATAN, data.NAMA_PROYEK, data.TGL_MULAI, data.TGL_BERAKHIR, data.WAKTU_MULAI, data.WAKTU_BERAKHIR, data.DURASI]),
            [],
            ['Total Durasi', total_durasi],
            ['Total Pendapatan', "Rp" + total_pendapatan],
            [],
            ['Total Durasi Overtime', total_durasi_overtime],
            ['Total Pendapatan Overtime', "Rp" + total_pendapatan_overtime],
        ];

        const workbook = XLSX.utils.book_new();
        const worksheet = XLSX.utils.aoa_to_sheet(excel_data);

        XLSX.utils.book_append_sheet(workbook, worksheet, 'Sheet1');

        const excelBuffer = XLSX.write(workbook, {
            bookType: 'xlsx',
            type: 'array'
        });

        const blob = new Blob([excelBuffer], {
            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        });

        const url = URL.createObjectURL(blob);

        const link = document.createElement('a');
        link.href = url;
        link.download = 'data_kegiatan.xlsx';

        link.click();

        setTimeout(() => {
            URL.revokeObjectURL(url);
        }, 0);
    }

    $("#search").bind("change space keyup", function() {
        var key = $(this).val();

        if (key == "") {
            showKegiatan();
        }
    });

    $(document).on("change space keyup", "#select_proyek", function() {
        var val = $(this).val();

        if (val == 0) {
            var html_body = `<span class="text-light-2">Nama Proyek <span class="text-red">*</span></span>
            <input id="proyek-baru" type="text" class="form-control" placeholder="Nama Proyek">`;

            var html_footer = `<button type="button" class="btn btn-kembali" data-bs-dismiss="modal">Kembali</button>
            <button onclick="saveProyek()" type="button" class="btn btn-simpan-modal">Simpan</button>`;

            $(".modal-title").text("Tambah Proyek Baru");
            $(".modal-body").html(html_body);
            $(".modal-footer").html(html_footer);

            $("#modal-utility").modal('show');
        }
    });
</script>

<script>
    if (localStorage.nama_karyawan != "") {
        var nama_karyawan = localStorage.getItem("nama_karyawan");
        $("#nama-karyawan").val(nama_karyawan);
        $("#nama-karyawan-header").text(nama_karyawan);
    }
    if (localStorage.rate != "") {
        var rate = localStorage.getItem("rate");
        $("#rate").val(rate);
        $("#rate-header").text("Rp" + parseInt(rate).toLocaleString('id-ID') + "/jam");
    }

    function simpanPengaturan() {
        var nama_karyawan = $("#nama-karyawan").val();
        var rate = $("#rate").val();
        var text = "Berhasil mengubah data user"

        localStorage.setItem("nama_karyawan", nama_karyawan);
        localStorage.setItem("rate", rate);

        popUp(text);
    }
</script>

<script>
    function popUp(info) {
        Swal.fire({
            icon: "success",
            title: "Berhasil",
            text: info,
            showConfirmButton: false,
            timer: 2000
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
                window.location.reload();
            }
        });
    }
</script>