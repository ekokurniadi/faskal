
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; <?php echo date('Y')?> My Company<div class="bullet"></div><a href="">Allright Reserved</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?php echo base_url()?>/assets/js/stisla.js"></script>
 


  <!-- Template JS File -->
  <script src="<?php echo base_url()?>/assets/js/scripts.js"></script>
  <script src="<?php echo base_url()?>/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
 <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
 <script src=" https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> 
 <script src=" https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script> 
 <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
 <script src="assets/js/page/forms-advanced-forms.js"></script>
  
  <script>
  // In your Javascript (external .js resource or <script> tag)
  $(document).ready(function() {
    // load select2
    $('#pilihan').select2(
      {
      width: 'resolve',
      placeholder:"Select an option"
    }
    );

  });
  $(document).ready(function() {
    // load select2
    $('#jabat').select2(
      {
      width: 'resolve',
      placeholder:"Select an option"
    }
    );

  });

  // load ckeditor
  CKEDITOR.replace( 'alamat' );

  // load datepicker
  $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
  $('#datepicker2').datepicker({
            uiLibrary: 'bootstrap4'
        });
  </script>
 
   

</body>
</html>
