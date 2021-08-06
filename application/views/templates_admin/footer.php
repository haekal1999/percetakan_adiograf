         <!-- Footer -->
         <div class="bottom">
             <footer class="sticky-footer bg-white">
                 <div class="container my-auto">
                     <div class="copyright text-center my-auto">
                         <span>Copyright &copy; Adiograf.id 2021</span>
                     </div>
                 </div>
             </footer>
         </div>
         <!-- End of Footer -->
         <!-- Bootstrap core JavaScript-->
         <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
         <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

         <!-- Data Table-->

         <script src="<?php echo base_url() ?>assets/vendor/datatables/DataTables-1.10.24/js/jquery.dataTables.min.js"></script>
         <script src="<?php echo base_url() ?>assets/vendor/datatables/DataTables-1.10.24/js/dataTables.bootstrap4.min.js"></script>

         <script src="<?php echo base_url() ?>assets/vendor/datatables/Buttons/js/dataTables.buttons.min.js"></script>
         <script src="<?php echo base_url() ?>assets/vendor/datatables/Buttons/js/buttons.bootstrap4.min.js"></script>
         <script src="<?php echo base_url() ?>assets/vendor/datatables/Buttons/js/buttons.html5.min.js"></script>
         <script src="<?php echo base_url() ?>assets/vendor/datatables/Buttons/js/buttons.print.min.js"></script>
         <script src="<?php echo base_url() ?>assets/vendor/datatables/Buttons/js/buttons.colVis.min.js"></script>

         <script src="<?php echo base_url() ?>assets/vendor/datatables/JSZip/jszip.min.js"></script>
         <script src="<?php echo base_url() ?>assets/vendor/datatables/pdfmake/pdfmake.min.js"></script>
         <script src="<?php echo base_url() ?>assets/vendor/datatables/pdfmake/vfs_fonts.js"></script>


         <script>
             $(document).ready(function() {
                 var table = $('#order-listing').DataTable({

                     buttons: ['copy', 'csv', 'print', 'excel', 'pdf', 'colvis']
                 });

                 table.buttons().container()
                     .appendTo('#order-listing_wrapper .col-md-6:eq(0)');
             });
         </script>

         <!-- Dropify-->
         <script src="<?php echo base_url() ?>assets/vendor/dropify/dist/js/dropify.min.js"></script>

         <!-- Core plugin JavaScript-->
         <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

         <!-- Custom scripts for all pages-->
         <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

         <!-- Page level plugins -->
         <script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

         <!-- Page level custom scripts -->
         <script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script>
         <script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script>

         </body>

         </html>