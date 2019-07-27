<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	@include('partiels.header')
	<style type="text/css">
		.before {
        	page-break-before: always;
      	}
      	.after {
        	page-break-after: always;
      	}
      	.avoid {
        	page-break-inside: avoid;
      	}
		table 
		{
    		border-collapse: collapse;
		}
		table, th, td 
		{
    		border: 1px solid black;
    		padding: 5px;
		}
		.section
		{
			margin-bottom: 20px;
		}
		.sec-gauche
		{
			float: left;
		}
		.sec-droite
		{
			float: right;
		}
		.center
		{
			text-align: center;
		}
		.col-sm-12
		{
			margin-bottom: 10px;
		}
		body
		{
			font-size: 13px;
		}
	</style>
</head>
<body>
<div>
	<br><br>
	<h3 class="center">liste des cancéreux</h3>
	<br><br>
	<div class="col-sm-12">
		<table style="width:100%">
			<thead>
				<tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Séxe</th>
                    <th>Cancer</th>
                </tr>
			</thead>
			<tbody>
				@foreach($patients as $patient)
                	<tr>
                		<td>{{ $patient->nom_patient }}</td>
                		<td>{{ $patient->prenom_patient }}</td>
                		<td>{{ $patient->date_naissance_patient }}</td>
                		<td>{{ $patient->sexe_patient == "M" ? "Masculin" : "Féminin" }}</td>
                		<td>{{ $patient->cancer->nom_cancer }}</td>
                	</tr>
                @endforeach
			</tbody>
		</table>
	</div>
</div>
</body>
@include('scripts.script_home')
</html>