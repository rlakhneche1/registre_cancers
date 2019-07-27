 <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('/js/sb-admin-2.min.js') }}"></script>
  <!-- Page level plugins -->
  <script src="{{ asset('/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script type="text/javascript">
  	$(document).ready(function() {
      $('#liste_patients').DataTable({
        processing: true,
        serverSide: false,
        ajax: '/getpatients',
        columns: [
            {data: 'nom_patient', name: 'nom_patient'},
            {data: 'prenom_patient', name: 'prenom_patient'},
            {data: 'date_naissance_patient', name: 'date_naissance_patient'},
            {data: 'lieunaissance', name: 'lieunaissance'},
            {data: 'sexe', name: 'sexe'},
            {data: 'cancer', name: 'cancer'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        "language": 
        {
            "url": "{{ asset('/js/French.json') }}"
        },
      });
  		$('#dataTable').DataTable({
  			"language": 
        	{
            	"url": "{{ asset('/js/French.json') }}"
        	},
  		});
	});
  </script>