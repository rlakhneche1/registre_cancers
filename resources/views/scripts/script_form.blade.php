 <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('/js/popper.min.js') }}"></script>
  <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('/js/sb-admin-2.min.js') }}"></script>
  <script src="{{ asset('/js/larails.js') }}"></script>
  <script src="{{ asset('/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>
  <script>
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })
  </script>
  <script>
    $(document).ready(function() {
      $('.simple-select2').select2({
        theme: 'bootstrap4',
        placeholder: "Sélectionner une option",
         allowClear: true
      });
    });
  </script>
  <script>
  	$("#wilaya").change(function() {
   		var id_wilaya = $(this).val();
    	var dairas = "<option value=''>Sélectionner</option>";
    	$.ajax({
      		url: "/getdairas/"+id_wilaya, 
      		success: function(result)
      		{
        		for(var i = 0; i < result.length; i++)
        		{
          			dairas+= "<option value="+result[i].id+">"+result[i].nom+"</option>";
        		}
        		$('#daira').html(dairas);
      		},
    	});
  	});
  	$("#daira").change(function() {
    	var id_daira = $(this).val();
    	var communes = "<option value=''>Sélectionner</option>";
    	$.ajax({
      		url: "/getcommunes/"+id_daira, 
      		success: function(result)
      		{
        		for(var i = 0; i < result.length; i++)
        		{
          			communes+= "<option value="+result[i].id+">"+result[i].nom+"</option>";
        		}
        		$('#commune').html(communes);
      		}
    	});
  	});
</script>
<script type="text/javascript">
  $('#submit_edition').click(function() {
    $('#edit').submit();
  });
</script>