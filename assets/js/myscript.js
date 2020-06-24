const flashData = $(".flash-data").data("flashdata");
if (flashData) {
	Swal.fire({
		title: "Data ",
		text: "Berhasil " + flashData,
		icon: "success",
	});
}

//tombol hapus
$(".tombol-hapus").on("click", function (e) {
	e.preventDefault(); //mencegah fungsi href tombol hapus dilakukan diawal
	const href = $(this).attr("href");

	Swal.fire({
		title: "Apakah Anda Yakin?",
		text: "Data akan dihapus",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Hapus Data!",
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});

//UBAH DATA DESA
$(".tombolTambahDesa").on("click", function () {
	$("#judulModalDesa").html("Tambah Data Desa");
	$(".modal-footer button[type=submit]").html("Tambah Data Desa");
});

$(".tombolUbahDataDesa").on("click", function () {
	$("#judulModalDesa").html("Ubah Data Desa");
	$(".modal-footer button[type=submit]").html("Ubah Data Desa");
	$(".modal-body form").attr(
		"action",
		"http://localhost/biod-admin/manage/ubahDesa"
	);
	const id = $(this).data("id");
	$.ajax({
		url: "http://localhost/biod-admin/manage/getubahDesa",
		data: { id: id },
		method: "post",
		dataType: "json",
		success: function (data) {
			$("#id").val(data.id);
			$("#desa").val(data.nama_desa);
		},
	});
});

//=================================JENIS BARANG================
//UBAH DATA BARANG
$(".tombolTambahJenisBarang").on("click", function () {
	$("#judulModalJenisBarang").html("Tambah Data Jenis Barang");
	$(".modal-footer button[type=submit]").html("Tambah Data Jenis Barang");
});

$(".tombolUbahDataJenisBarang").on("click", function () {
	$("#judulModalJenisBarang").html("Ubah Data Jenis Barang");
	$(".modal-footer button[type=submit]").html("Ubah Data Jenis Barang");
	$(".modal-body form").attr(
		"action",
		"http://localhost/biod-admin/manage/ubahBarang"
	);
	const id = $(this).data("id");
	$.ajax({
		url: "http://localhost/biod-admin/manage/getUbahBarang",
		data: { id: id },
		method: "post",
		dataType: "json",
		success: function (data) {
			$("#id").val(data.id);
			$("#jenis_barang").val(data.tipe_barang);
		},
	});
});
