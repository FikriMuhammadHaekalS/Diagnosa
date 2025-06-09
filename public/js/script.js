// Script Halaman Gejala
$(function () {
  $(".tambahGejala").on("click", function () {
    $("#TambahDataGejala").html("Tambah Gejala");
    $(".modal-footer button[type=submit]").html("Tambah Gejala");
  });
  $(".ubahGejala").on("click", function () {
    $("#TambahDataGejala").html("Ubah Gejala");
    $(".modal-footer button[type=submit]").html("Ubah Gejala");
    $(".modal-body form").attr("action", "http://localhost/Diagnosa/admin/ubahGejala");
    const id_gejala = $(this).data("gejala");
    $.ajax({
      url: "http://localhost/Diagnosa/admin/getUbahGejala",
      data: { id_gejala: id_gejala },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        $("#namaGejala").val(data.nama_gejala); // Memasukkan nama_gejala ke input
        $("#idGejala").val(data.id_gejala); // Memasukkan nama_gejala ke input
      },
      error: function (xhr, status, error) {
        console.error("Error: " + error);
      },
    });
  });
});

// Script Halaman Penyakit
$(function () {
  $(".tambahPenyakit").on("click", function () {
    $("#TambahDataPenyakit").html("Tambah Penyakit");
    $(".modal-footer button[type=submit]").html("Tambah Penyakit");
  });
  $(".ubahPenyakit").on("click", function () {
    $("#TambahDataPenyakit").html("Ubah Penyakit");
    $(".modal-footer button[type=submit]").html("Ubah Penyakit");
    $(".modal-body form").attr("action", "http://localhost/Diagnosa/admin/ubah");
    const id_penyakit = $(this).data("penyakit");
    $.ajax({
      url: "http://localhost/Diagnosa/admin/getUbahPenyakit",
      data: { id_penyakit: id_penyakit },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        $("#namaPenyakit").val(data.nama_penyakit); // Memasukkan nama_penyakit ke input
        $("#keteranganPenyakit").val(data.keterangan_penyakit); // Memasukkan nama_penyakit ke input
        $("#solusiPenyakit").val(data.solusi); // Memasukkan nama_penyakit ke input
        $("#idPenyakit").val(data.id_penyakit); // Memasukkan nama_penyakit ke input
      },
      error: function (xhr, status, error) {
        console.error("Error: " + error);
      },
    });
  });
});

// Script Halaman Aturan
$(function () {
  $(".tambahAturan").on("click", function () {
    console.log(ok);
    $("#TambahDataAturan").html("Tambah Aturan");
    $(".modal-footer button[type=submit]").html("Tambah Aturan");
  });
  $(".ubahAturan").on("click", function () {
    $("#TambahDataAturan").html("Ubah Aturan");
    $(".modal-footer button[type=submit]").html("Ubah Aturan");
    $(".modal-body form").attr("action", "http://localhost/Diagnosa/admin/ubahAturan");
    const id_aturan = $(this).data("aturan");
    $.ajax({
      url: "http://localhost/Diagnosa/admin/getUbahAturan",
      data: { id_aturan: id_aturan },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        $("#namaAturan").val(data.nama_aturan); // Memasukkan nama_aturan ke input
        $("#idAturan").val(data.id_aturan); // Memasukkan nama_gejala ke input
      },
      error: function (xhr, status, error) {
        console.error("Error: " + error);
      },
    });
  });
});
