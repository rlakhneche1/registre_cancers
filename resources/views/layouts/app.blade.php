<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<meta name="description" content="">
  	<meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Registre des cancers</title>
	@include('partiels.header')
</head>
<body id="page-top">
	<div id="wrapper">
		@include('partiels.aside_bar')
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">
				@include('partiels.nav_bar')
				<div class="container-fluid">
					@yield('content')
				</div>
			</div>
			<footer class="sticky-footer bg-white">
				@include('partiels.footer')
			</footer>
		</div>
	</div>
	<!-- Scroll to Top Button-->
  	<a class="scroll-to-top rounded" href="#page-top">
    	<i class="fas fa-angle-up"></i>
  	</a>
  	<!-- Logout Modal-->
  	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    	<div class="modal-dialog" role="document">
      		<div class="modal-content">
        		<div class="modal-header">
          			<h5 class="modal-title" id="exampleModalLabel">Prêt à partir ?</h5>
          			<button class="close" type="button" data-dismiss="modal" aria-label="Close">
            			<span aria-hidden="true">×</span>
          			</button>
        		</div>
        		<div class="modal-body">
              Sélectionnez "Déconnexion" ci-dessous si vous êtes prêt à mettre fin à votre session en cours.
            </div>
        		<div class="modal-footer">
          			<button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
          			<a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  Déconnexion
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
        		</div>
      		</div>
    	</div>
  	</div>
  	@yield('scripts')
</body>
</html>