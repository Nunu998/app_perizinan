
  <br>
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Keluar?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">Pilih "Keluar" untuk mengakhiri sesi masuk ini.</div>
              <div class="modal-footer">
                  <button class="btn btn-warning" type="button" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
                  <a class="btn btn-danger" href="keluar.php"><i class="fa fa-arrow-circle-right"></i> Keluar</a>
              </div>
          </div>
      </div>
  </div>

  </div>
  <script src="../assets/leaflet/leaflet.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="../assets/js/jquery.min.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="../assets/js/bootstrap.min.js"></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src="../assets/js/metisMenu.min.js"></script>

  <!-- DataTables JavaScript -->
  <script src="../assets/js/dataTables/jquery.dataTables.min.js"></script>
  <script src="../assets/js/dataTables/dataTables.bootstrap.min.js"></script>

  <!-- Custom Theme JavaScript -->
  <script src="../assets/js/startmin.js"></script>
  <!-- Page level plugins -->
  <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../assets/js/demo/datatables-demo.js"></script>


  <!-- DataTables JavaScript -->
  <script src="/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
  <script src="/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../js-ku.js"></script>
  <script>
      $(document).ready(function() {
          $("#show_hide_password a").on('click', function(event) {
              event.preventDefault();
              if ($('#show_hide_password input').attr("type") == "text") {
                  $('#show_hide_password input').attr('type', 'password');
                  $('#show_hide_password i').addClass("glyphicon glyphicon-eye-close");
              } else if ($('#show_hide_password input').attr("type") == "password") {
                  $('#show_hide_password input').attr('type', 'text');
                  $('#show_hide_password i').removeClass("glyphicon glyphicon-eye-close");
                  $('#show_hide_password i').addClass("glyphicon glyphicon-eye-open");
              }
          });
      });
  </script>
  <script>
      $(document).ready(function() { // Ketika halaman selesai di load
          $('.input-tanggal').datepicker({
              dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
          });
          $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
          $('#filter').change(function() { // Ketika user memilih filter
              if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
                  $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                  $('#form-tanggal').show(); // Tampilkan form tanggal
              } else if ($(this).val() == '2') { // Jika filter nya 2 (per bulan)
                  $('#form-tanggal').hide(); // Sembunyikan form tanggal
                  $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
              } else { // Jika filternya 3 (per tahun)
                  $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                  $('#form-tahun').show(); // Tampilkan form tahun
              }
              $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
          })
      })
  </script>

  <script src="../assets/plugin/jquery-ui/jquery-ui.min.js"></script> <!-- Load file plugin js jquery-ui -->

  <script>
      var flash = $('flash').data("falsh")
      if (flash) {
          Swal.fire({
              icon: 'success',
              title: 'Sukses',
              text: flash
          })
      }
  </script>

  <script>
      $(document).ready(function() {
          $('#dataTables-example').DataTable({
              responsive: true
          });
      });
  </script>


  <script>
      $(document).ready(function() {
          $('#table1').DataTable()
      })
  </script>

  <script>
      jQuery(document).ready(function($) {
          $('#cmb_barang').change(function() { // Jika Select Box id provinsi dipilih
              var tamp = $(this).val(); // Ciptakan variabel provinsi
              $.ajax({
                  type: 'POST', // Metode pengiriman data menggunakan POST
                  url: 'get_barang.php', // File yang akan memproses data
                  data: 'tamp=' + tamp, // Data yang akan dikirim ke file pemroses
                  success: function(data) { // Jika berhasil
                      $('.tampung').html(data); // Berikan hasil ke id kota
                  }
              });
          });
      });
  </script>
  <script>
    jQuery(document).ready(function($) {
        $('#kode').change(function() { // Jika Select Box id provinsi dipilih
            var tamp = $(this).val(); // Ciptakan variabel provinsi
            $.ajax({
                type: 'POST', // Metode pengiriman data menggunakan POST
                url: 'get_kode.php', // File yang akan memproses data
                data: 'tamp=' + tamp, // Data yang akan dikirim ke file pemroses
                success: function(data) { // Jika berhasil
                    $('.tampung1').html(data); // Berikan hasil ke id kota
                }


            });
        });
    });
</script>
<script src="plugin/jquery-ui/jquery-ui.min.js"></script> <!-- Load file plugin js jquery-ui -->

  <script>
      jQuery(document).ready(function($) {
          $('#cmb_barang').change(function() { // Jika Select Box id provinsi dipilih
              var tamp = $(this).val(); // Ciptakan variabel provinsi
              $.ajax({
                  type: 'POST', // Metode pengiriman data menggunakan POST
                  url: 'get_sumberdana.php', // File yang akan memproses data
                  data: 'tamp=' + tamp, // Data yang akan dikirim ke file pemroses
                  success: function(data) { // Jika berhasil
                      $('.tampung4').html(data); // Berikan hasil ke id kota
                  }


              });
          });
      });
  </script>

  <script>
      jQuery(document).ready(function($) {
          $('#cmb_barang').change(function() { // Jika Select Box id provinsi dipilih
              var tamp = $(this).val(); // Ciptakan variabel provinsi
              $.ajax({
                  type: 'POST', // Metode pengiriman data menggunakan POST
                  url: 'get_merek.php', // File yang akan memproses data
                  data: 'tamp=' + tamp, // Data yang akan dikirim ke file pemroses
                  success: function(data) { // Jika berhasil
                      $('.tampung2').html(data); // Berikan hasil ke id kota
                  }


              });
          });
      });
  </script>

  <script>
      jQuery(document).ready(function($) {
          $('#cmb_barang').change(function() { // Jika Select Box id provinsi dipilih
              var tamp = $(this).val(); // Ciptakan variabel provinsi
              $.ajax({
                  type: 'POST', // Metode pengiriman data menggunakan POST
                  url: 'get_satuan.php', // File yang akan memproses data
                  data: 'tamp=' + tamp, // Data yang akan dikirim ke file pemroses
                  success: function(data) { // Jika berhasil
                      $('.tampung1').html(data); // Berikan hasil ke id kota
                  }


              });
          });
      });
  </script>

  <script>
      function sum() {
          var stok = document.getElementById('stok').value;
          var jumlahkeluar = document.getElementById('jumlahkeluar').value;
          var result = parseInt(stok) - parseInt(jumlahkeluar);
          if (!isNaN(result)) {
              document.getElementById('total').value = result;
          }
      }
  </script>


  <script>
      $('.delete-data').on('click', function(e) {
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
  </script>

  <script>
      const notifikasi = $('.info-data').data('infodata');

      if (notifikasi == "Disimpan" || notifikasi == "Dihapus") {
          Swal.fire({
              icon: 'success',
              title: 'Sukses',
              text: 'Data Berhasil ' + notifikasi,
          })
      }
      if (notifikasi == "Berhasil" || notifikasi == "Dihapus") {
          Swal.fire({
              icon: 'success',
              title: 'Sukses',
              text: 'Anda Berhasil Login  ',
          })
      }
      if (notifikasi == "Edit" || notifikasi == "Dihapus") {
          Swal.fire({
              icon: 'success',
              title: 'Sukses',
              text: 'Anda Berhasil Melakukan Edit Data  ',
          })
      }
      if (notifikasi == "Dikonfirmasi" || notifikasi == "Dihapus") {
          Swal.fire({
              icon: 'success',
              title: 'Sukses',
              text: 'Data Berhasil Dikonfirmasi',
          })
      }
      if (notifikasi == "Username" || notifikasi == "Dihapus") {
          Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Username Sudah Ada !!  ',
          })
      }
      if (notifikasi == "Salah" || notifikasi == "Dihapus") {
          Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Username atau Password Anda Salah',
          })
      }
      if (notifikasi == "Dihapus" || notifikasi == "Dihapus") {
          Swal.fire({
              icon: 'success',
              title: 'Sukses',
              text: 'Data Berhasil Dihapus  ',
          })
      }
      if (notifikasi == "Gagal Disimpan" || notifikasi == "Gagal Dihapus") {
          Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Data ' + notifikasi,
          })
      }
      if (notifikasi == "Nomor Berkas" || notifikasi == "Gagal Dihapus") {
          Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Nomor Surat Masuk Sudah Ada ! ',
          })
      }
      if (notifikasi == "Nomor Telahaan" || notifikasi == "Gagal Dihapus") {
          Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Nomor Telahaan Sudah Ada ! ',
          })
      }
      if (notifikasi == "Nomor Surat" || notifikasi == "Gagal Dihapus") {
          Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Nomor Surat Sudah Ada ! ',
          })
      }
      if (notifikasi == "hp" || notifikasi == "Gagal Dihapus") {
          Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Nomor Telpon Sudah Ada ! ',
          })
      }
      if (notifikasi == "nip" || notifikasi == "Gagal Dihapus") {
          Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'NIP Sudah Ada ! ',
          })
      }
  </script>




  </body>

  </html>