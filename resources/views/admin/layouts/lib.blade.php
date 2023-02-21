  <!-- Main CSS-->

  <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/main.css') }}">
 <!--===============================================================================================-->

 <!-- Main JS-->
<script src="{{ asset('admin/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('admin/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/pace.min.js')}}"></script>
<script src="{{ asset('admin/js/plugins/chart.js')}}"></script>
<script src="{{ asset('admin/ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset('admin/ckfinder/ckfinder.js')}}"></script>
<script>

</script>

<!--===============================================================================================-->

  <!-- Essential javascripts for application to work-->
  
  
  <script src="{{ asset('admin/js/main.js') }} "></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="{{  asset('admin/js/plugins/pace.min.js')}} "></script>
  
 
  <!-- Data table plugin-->
  <script type="text/javascript" src="{{ asset('admin/js/plugins/jquery.dataTables.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/plugins/dataTables.bootstrap.min.js')}}"></script>
   <!-- Essential javascripts for application to work-->

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 
 <!-- Page specific javascripts-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
 <!-- Data table plugin-->

 <script type="text/javascript">
	$('.comment_duyet_btn').click(function(){
		var comment_status = $(this).data('comment_status');
		var id_comment = $(this).data('id_comment');
    var id_product = $(this).attr('id');
    alert(comment_status);
    alert(id_comment);
    alert(id_product);
		// if(comment_status==0){
		// 	var alret = 'Duyệt thành công';
		// }else{
		// 	var alret = 'Duyệt không  thành công';
		// }

		
	});
	
	
</script>