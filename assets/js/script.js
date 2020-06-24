$(function () {
	$(".tombolTambahData").on("click", function () {
		$("#judulModal").html("Tambah Data Kreditor");
		$(".modal-footer button[type=submit]").html("Tambah Data");
	});

	$(".tombolUbahData").on("click", function () {
		$("#judulModal").html("Ubah Data Kreditor");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".password :input").attr("disabled", true);
		$(".modal-body form").attr(
			"action",
			"http://localhost/biod-admin/kreditor/ubah"
		);
		const id = $(this).data("id");

		$.ajax({
			url: "http://localhost/biod-admin/kreditor/getubah",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#id_kreditor").val(data.id_kreditor);
				$("#nama_kreditor").val(data.nama_kreditor);
				$("#desa_id").val(data.desa_id);
				$("#pekerjaan_kreditor").val(data.pekerjaan);
				$("#alamat_kreditor").val(data.alamat);
				$("#nomor_hp").val(data.nomor_hp);
				$("#nomor_ktp").val(data.nomor_ktp);
				$("#password1").val(data.password);
				$("#password2").val(data.password);
			},
		});
	});

	//UBAH BARANG
	$(".tombolTambahBarang").on("click", function () {
		$("#judulModalBarang").html("Tambah Data Barang");
		$(".modal-footer button[type=submit]").html("Tambah Data");
	});

	$(".tombolUbahDataBarang").on("click", function () {
		$("#judulModalBarang").html("Ubah Data Barang");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".id_kreditor option:selected").attr("disabled", true);
		$(".modal-body form").attr(
			"action",
			"http://localhost/biod-admin/barang/ubah"
		);
		const id = $(this).data("id");
		$.ajax({
			url: "http://localhost/biod-admin/barang/getubah",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#id_kreditor").val(data.id_kreditor);
				$("#id_barang").val(data.id_barang);
				$("#nama_barang").val(data.nama_barang);
				$("#barang_id").val(data.barang_id);
				$("#harga_barang").val(data.harga_barang);
				$("#uang_muka").val(data.uang_muka);
				$("#kredit_total").val(data.kredit_total);
				$("#tanggal_masuk").val(data.tanggal_masuk);
				$("#angsuran_id").val(data.angsuran_id);
				$("#nominal_angsuran").val(data.nominal_angsuran);
			},
		});
	});
});
