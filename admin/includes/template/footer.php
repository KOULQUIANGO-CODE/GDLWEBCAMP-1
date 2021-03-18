<?php 
function obtenederPaginaActual(){
  // server accede a los archivos donde se encuentra hospedado
  $archivo = basename($_SERVER['PHP_SELF']);
  // remplaza una parte de un string con otra
  $pagina = str_replace(".php","",$archivo);
  return $pagina;
}
?>
<?php $actual = obtenederPaginaActual();
  if($actual != 'login'){
    //  crear-admin 
    echo ' <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.1.0-rc
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>';
  }?>


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap4.min.js"></script>
<script src="js/dataTables.responsive.min.js"></script>
<script src="js/responsive.bootstrap4.min.js"></script>
<script src="js/dataTables.buttons.min.js"></script>
<script src="js/buttons.bootstrap4.min.js"></script>
<script src="js/jszip.min.js"></script>
<script src="js/pdfmake.min.js"></script>
<script src="js/vfs_fonts.js"></script>
<script src="js/buttons.html5.min.js"></script>
<script src="js/buttons.print.min.js"></script>
<script src="js/buttons.colVis.min.js"></script>
 <!-- InputMask -->
 <script src="js/moment.min.js"></script> <!-- datepicker -->
<!-- overlayScrollbars -->
<script src="js/jquery.overlayScrollbars.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="js/tempusdominus-bootstrap-4.min.js"></script> <!-- datepicker -->
<!-- Select2 -->
<script src="js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>
<!-- fontawesome-iconpicker -->
<script src="js/fontawesome-iconpicker.min.js"></script>
<!-- bs-custom-file-input -->
<script src="js/bs-custom-file-input.min.js"></script>
<!-- app js-->
<script src="js/app.js"></script>

<!-- sweetalert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php $actual = obtenederPaginaActual();
  if($actual != 'login'){
    //  crear-admin 
    echo ' <script src="js/ajax.js"></script>';
  }else if($actual === 'login'){
    echo ' <script src="js/login-admin.js"></script>';
  }
  ?>
<script src="../js/cotizador.js"></script>


</body>

</html>