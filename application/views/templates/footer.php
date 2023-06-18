          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Badan Layanan Umum Daerah RSUD Lahat &copy 2023</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="<?=base_url('assets/') ?>assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?=base_url('assets/') ?>assets/vendors/chart.js/Chart.min.js"></script>
    <script src="<?=base_url('assets/') ?>assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?=base_url('assets/') ?>assets/js/off-canvas.js"></script>
    <script src="<?=base_url('assets/') ?>assets/js/hoverable-collapse.js"></script>
    <script src="<?=base_url('assets/') ?>assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?=base_url('assets/') ?>assets/js/dashboard.js"></script>
    <script src="<?=base_url('assets/') ?>assets/js/todolist.js"></script>
    <!-- End custom js for this page -->

    <!-- Data Tables -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



    <!-- Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Keluar dari aplikasi</h5>
            <button type="button" class="btn btn-danger btn-sm close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Apakah kamu yakin ingin keluar dari aplikasi?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="<?=base_url('auth/logout/') ?>" class="btn btn-danger">Keluar</a>
          </div>
        </div>
      </div>
    </div>


    <script>
     $(document).ready(function() {
      var table = $('#tabel-data').DataTable( {
        responsive: true
      } );

      new $.fn.dataTable.FixedHeader( table );
    });
  </script>

  <script>
    $(document).ready(function() {
      $('#select2').select2();
      $('#selectPasien').select2();
      $('#selectUnit').select2();
      $('#selectRekap').select2();
    });
  </script>

  <script type="text/javascript">
    /* Dengan Rupiah */
    var dengan_rupiah = document.getElementById('dengan-rupiah');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
      dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    var dengan_rupiah_2 = document.getElementById('dengan-rupiah-2');
    dengan_rupiah_2.addEventListener('keyup', function(e)
    {
      dengan_rupiah_2.value = formatRupiah(this.value, 'Rp. ');
    });

    var dengan_rupiah_radiologi = document.getElementById('dengan-rupiah-radiologi');
    dengan_rupiah_radiologi.addEventListener('keyup', function(e)
    {
      dengan_rupiah_radiologi.value = formatRupiah(this.value, 'Rp. ');
    });

    var dengan_rupiah_labor = document.getElementById('dengan-rupiah-labor');
    dengan_rupiah_labor.addEventListener('keyup', function(e)
    {
      dengan_rupiah_labor.value = formatRupiah(this.value, 'Rp. ');
    });

    var dengan_rupiah_ekg = document.getElementById('dengan-rupiah-ekg');
    dengan_rupiah_ekg.addEventListener('keyup', function(e)
    {
      dengan_rupiah_ekg.value = formatRupiah(this.value, 'Rp. ');
    });

    var dengan_rupiah_bdrs = document.getElementById('dengan-rupiah-bdrs');
    dengan_rupiah_bdrs.addEventListener('keyup', function(e)
    {
      dengan_rupiah_bdrs.value = formatRupiah(this.value, 'Rp. ');
    });

    

    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split    = number_string.split(','),
      sisa     = split[0].length % 3,
      rupiah     = split[0].substr(0, sisa),
      ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
  </script>

<script type="text/javascript">
  var dengan_rupiah_rotgen = document.getElementById('dengan-rupiah-rotgen');
  dengan_rupiah_rotgen.addEventListener('keyup', function(e)
  {
    dengan_rupiah_rotgen.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_DR = document.getElementById('dengan-rupiah-DR');
  dengan_rupiah_DR.addEventListener('keyup', function(e)
  {
    dengan_rupiah_DR.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_labor = document.getElementById('dengan-rupiah-labor');
  dengan_rupiah_labor.addEventListener('keyup', function(e)
  {
    dengan_rupiah_labor.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_kiur = document.getElementById('dengan-rupiah-kiur');
  dengan_rupiah_kiur.addEventListener('keyup', function(e)
  {
    dengan_rupiah_kiur.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_dr1 = document.getElementById('dengan-rupiah-dr1');
  dengan_rupiah_dr1.addEventListener('keyup', function(e)
  {
    dengan_rupiah_dr1.value = formatRupiah(this.value, 'Rp. ');
  });


  var dengan_rupiah_pbedah = document.getElementById('dengan-rupiah-pbedah');
  dengan_rupiah_pbedah.addEventListener('keyup', function(e)
  {
    dengan_rupiah_pbedah.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_dr2 = document.getElementById('dengan-rupiah-dr2');
  dengan_rupiah_dr2.addEventListener('keyup', function(e)
  {
    dengan_rupiah_dr2.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_pgigi = document.getElementById('dengan-rupiah-pgigi');
  dengan_rupiah_pgigi.addEventListener('keyup', function(e)
  {
    dengan_rupiah_pgigi.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_dr3 = document.getElementById('dengan-rupiah-dr3');
  dengan_rupiah_dr3.addEventListener('keyup', function(e)
  {
    dengan_rupiah_dr3.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_igd = document.getElementById('dengan-rupiah-igd');
  dengan_rupiah_igd.addEventListener('keyup', function(e)
  {
    dengan_rupiah_igd.value = formatRupiah(this.value, 'Rp. ');
  });


  // Baris 3
  var dengan_rupiah_karcis = document.getElementById('dengan-rupiah-karcis');
  dengan_rupiah_karcis.addEventListener('keyup', function(e)
  {
    dengan_rupiah_karcis.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_dr4 = document.getElementById('dengan-rupiah-dr4');
  dengan_rupiah_dr4.addEventListener('keyup', function(e)
  {
    dengan_rupiah_dr4.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_pkb = document.getElementById('dengan-rupiah-pkb');
  dengan_rupiah_pkb.addEventListener('keyup', function(e)
  {
    dengan_rupiah_pkb.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_dr5 = document.getElementById('dengan-rupiah-dr5');
  dengan_rupiah_dr5.addEventListener('keyup', function(e)
  {
    dengan_rupiah_dr5.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_ptht = document.getElementById('dengan-rupiah-ptht');
  dengan_rupiah_ptht.addEventListener('keyup', function(e)
  {
    dengan_rupiah_ptht.value = formatRupiah(this.value, 'Rp. ');
  });


  // Baris 4
  var dengan_rupiah_dr6 = document.getElementById('dengan-rupiah-dr6');
  dengan_rupiah_dr6.addEventListener('keyup', function(e)
  {
    dengan_rupiah_dr6.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_pmata = document.getElementById('dengan-rupiah-pmata');
  dengan_rupiah_pmata.addEventListener('keyup', function(e)
  {
    dengan_rupiah_pmata.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_dr7 = document.getElementById('dengan-rupiah-dr7');
  dengan_rupiah_dr7.addEventListener('keyup', function(e)
  {
    dengan_rupiah_dr7.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_fisio = document.getElementById('dengan-rupiah-fisio');
  dengan_rupiah_fisio.addEventListener('keyup', function(e)
  {
    dengan_rupiah_fisio.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_dr8 = document.getElementById('dengan-rupiah-dr8');
  dengan_rupiah_dr8.addEventListener('keyup', function(e)
  {
    dengan_rupiah_dr8.value = formatRupiah(this.value, 'Rp. ');
  });


  // Baris 4
  var dengan_rupiah_panak = document.getElementById('dengan-rupiah-panak');
  dengan_rupiah_panak.addEventListener('keyup', function(e)
  {
    dengan_rupiah_panak.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_dr9 = document.getElementById('dengan-rupiah-dr9');
  dengan_rupiah_dr9.addEventListener('keyup', function(e)
  {
    dengan_rupiah_dr9.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_hemodia = document.getElementById('dengan-rupiah-hemodia');
  dengan_rupiah_hemodia.addEventListener('keyup', function(e)
  {
    dengan_rupiah_hemodia.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_dr10 = document.getElementById('dengan-rupiah-dr10');
  dengan_rupiah_dr10.addEventListener('keyup', function(e)
  {
    dengan_rupiah_dr10.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_pimu = document.getElementById('dengan-rupiah-pimu');
  dengan_rupiah_pimu.addEventListener('keyup', function(e)
  {
    dengan_rupiah_pimu.value = formatRupiah(this.value, 'Rp. ');
  });


  // Baris 5
  var dengan_rupiah_pvct = document.getElementById('dengan-rupiah-pvct');
  dengan_rupiah_pvct.addEventListener('keyup', function(e)
  {
    dengan_rupiah_pvct.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_visum = document.getElementById('dengan-rupiah-visum');
  dengan_rupiah_visum.addEventListener('keyup', function(e)
  {
    dengan_rupiah_visum.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_asuransi = document.getElementById('dengan-rupiah-asuransi');
  dengan_rupiah_asuransi.addEventListener('keyup', function(e)
  {
    dengan_rupiah_asuransi.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_drpparu = document.getElementById('dengan-rupiah-drpparu');
  dengan_rupiah_drpparu.addEventListener('keyup', function(e)
  {
    dengan_rupiah_drpparu.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_drpsaraf = document.getElementById('dengan-rupiah-drpsaraf');
  dengan_rupiah_drpsaraf.addEventListener('keyup', function(e)
  {
    dengan_rupiah_drpsaraf.value = formatRupiah(this.value, 'Rp. ');
  });


  // Baris 6
  var dengan_rupiah_pdalam = document.getElementById('dengan-rupiah-pdalam');
  dengan_rupiah_pdalam.addEventListener('keyup', function(e)
  {
    dengan_rupiah_pdalam.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_dr11 = document.getElementById('dengan-rupiah-dr11');
  dengan_rupiah_dr11.addEventListener('keyup', function(e)
  {
    dengan_rupiah_dr11.value = formatRupiah(this.value, 'Rp. ');
  });

</script>

<script type="text/javascript">
  var dengan_rupiah_psikolog = document.getElementById('dengan-rupiah-psikolog');
  dengan_rupiah_psikolog.addEventListener('keyup', function(e)
  {
    dengan_rupiah_psikolog.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_drkulit = document.getElementById('dengan-rupiah-drkulit');
  dengan_rupiah_drkulit.addEventListener('keyup', function(e)
  {
    dengan_rupiah_drkulit.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah_ambulance = document.getElementById('dengan-rupiah-ambulance');
  dengan_rupiah_ambulance.addEventListener('keyup', function(e)
  {
    dengan_rupiah_ambulance.value = formatRupiah(this.value, 'Rp. ');
  });
</script>
</body>
</html>