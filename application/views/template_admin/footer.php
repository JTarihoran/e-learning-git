<!-- External JavaScripts -->
<script src="<?= base_url(); ?>assets/admin/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/vendors/bootstrap/js/popper.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="<?= base_url(); ?>assets/admin/vendors/magnific-popup/magnific-popup.js"></script>
<script src="<?= base_url(); ?>assets/admin/vendors/counter/waypoints-min.js"></script>
<script src="<?= base_url(); ?>assets/admin/vendors/counter/counterup.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/vendors/imagesloaded/imagesloaded.js"></script>
<script src="<?= base_url(); ?>assets/admin/vendors/masonry/masonry.js"></script>
<script src="<?= base_url(); ?>assets/admin/vendors/masonry/filter.js"></script>
<script src="<?= base_url(); ?>assets/admin/vendors/owl-carousel/owl.carousel.js"></script>
<script src='<?= base_url(); ?>assets/admin/vendors/scroll/scrollbar.min.js'></script>
<script src="<?= base_url(); ?>assets/admin/js/functions.js"></script>
<script src="<?= base_url(); ?>assets/admin/vendors/chart/chart.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/js/admin.js"></script>
<script src='<?= base_url(); ?>assets/admin/vendors/calendar/moment.min.js'></script>
<script src='<?= base_url(); ?>assets/admin/vendors/calendar/fullcalendar.js'></script>


<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.19/datatables.min.js"></script> -->
  
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

<script type="text/javascript">
	$(document).ready( function () {
	    $('#table_id').DataTable({
	    	"lengthMenu": [ 5, 25, 50, 75]
	    });

	});

	// $(document).ready(function() {
	//      for(B=1; B<=1; B++){
	//       Barisbaru();
	//      } 
	//      $('#BarisBaru').click(function(e) {
	//          e.preventDefault();
	//          Barisbaru();
	//      });

	//      $("tableLoop tbody").find('input[type=text]').filter(':visible:first').focus();
	// });

	  // function Barisbaru() {
	  //     $(document).ready(function() {
	  //         $("[data-toggle='tooltip']").tooltip(); 
	  //     });
	  //     var Nomor = $("#tableLoop tbody tr").length + 1;
	  //     var Baris = '<tr>';
	  //             Baris += '<td class="text-center">'+Nomor+'</td>';
	  //             Baris += '<td>';
	  //                 Baris += '<input type="file" name="fileUp[]" class="form-control fileUp" multiple="">';
	  //             Baris += '</td>';
	  //             Baris += '<td>';
	  //                 Baris += '<input type="text" name="menu_course[]" class="form-control menu_course" placeholder="Menu Course">';
	  //             Baris += '</td>';
	  //             Baris += '<td>';
	  //                 Baris += '<input type="text" name="submenu_course[]" class="form-control submenu_course" placeholder="Submenu Course">';
	  //             Baris += '</td>';
	  //             Baris += '<td class="text-center">';
	  //                 Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Baris" id="HapusBaris"><i class="fa fa-times"></i></a>';
	  //             Baris += '</td>';
	  //         Baris += '</tr>';

	  //     $("#tableLoop tbody").append(Baris);
	  //     $("#tableLoop tbody tr").each(function () {
	  //        $(this).find('td:nth-child(2) input'); 
	  //     });

	  // }

	  // $(document).on('click', '#HapusBaris', function(e) {
	  //    e.preventDefault();
	  //    var Nomor = 1;
	  //    $(this).parent().parent().remove();
	  //    $('tableLoop tbody tr').each(function() {
	  //        $(this).find('td:nth-child(1)').html(Nomor);
	  //        Nomor++;
	  //    });
	  // });

	  // $(document).ready(function() {
	  //    $('#SimpanData').submit(function(e) {
	  //        course();
	  //        e.preventDefault();
	  //    });
	  // });

	  // function course() {
	  //     $.ajax({
	  //         url:$("#SimpanData").attr('action'),
	  //         type:'post',
	  //         cache:false,
	  //         dataType:"json",
	  //         enctype: 'multipart/form-data',
	  //         data: $("#SimpanData").serializeArray(),
	  //         success:function (data) {
	  //             if (data.success == true) {
	  //                 $('.fileUp').val('');
	  //                 $('.menu_course').val('');
	  //                 $('.submenu_course').val('');
	  //             }
	  //             else{
	  //                 $('#notif').html('<div class="alert alert-danger">Data Gagal Disimpan</div>');
	  //             }
	  //         }, 
	  //     });
	  // }

</script>
</body>
</html>