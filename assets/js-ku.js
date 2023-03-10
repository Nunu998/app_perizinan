const notifikasi = $('.info-data').data('infodata');

if(notifikasi == "Disimpan" || notifikasi=="Dihapus"){
	Swal.fire({
	  icon: 'success',
	  title: 'Sukses',
	  text: 'Data Berhasil '+notifikasi,
	})
if(notifikasi == "Berhasil" || notifikasi=="Dihapus"){
	Swal.fire({
	  icon: 'success',
	  title: 'Sukses',
	  text: 'Anda Berhasil Login '+ notifikasi,
	})	
}else if(notifikasi == "Gagal Disimpan" || notifikasi=="Gagal Dihapus"){
	Swal.fire({
	  icon: 'error',
	  title: 'GAGAL',
	  text: 'Data '+notifikasi,
	})
}else if(notifikasi == "Kosong"){
 Swal.fire({
	  icon: 'error',
	  title: 'Kode Barang Sudah ada!',
	  text: 'Data '+notifikasi,
}




$('.delete-data').on('click', function(e){
	e.preventDefault();
	var getLink = $(this).attr('href');

	Swal.fire({
	  title: 'Hapus Data?',
	  text: "Data akan dihapus permanen",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus'
	}).then((result) => {
	  if (result.value) {
	    window.location.href = getLink;
	  }
	})
});