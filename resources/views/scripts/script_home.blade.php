 <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('/js/sb-admin-2.min.js') }}"></script>
  <script src="{{ asset('/js/html2pdf.bundle.js') }}"></script>
  <!-- Page level plugins -->
  <script src="{{ asset('/vendor/chart.js/Chart.min.js')}}"></script>
  <script type="text/javascript">
    $('#generate').click(function() {
      // Get the element.
      var element = document.getElementById('pdf');
      var pagebreak = { mode: '', before: '.before', after: '.after', avoid: '.avoid' };
      // Generate the PDF.
      html2pdf().from(element).set({
        filename: 'liste_des_cancéreux.pdf',
        pagebreak: pagebreak,
        jsPDF: {orientation: 'portrait', unit: 'in', format: 'letter', compressPDF: true}
      }).save();
    });
  </script>
  <script type="text/javascript">
    $.ajax({
          url: "/cancerfrequant", 
          success: function(result)
          {
            $('#cancer').html(result.nom_cancer);
          },
      });
  </script>

  <script type="text/javascript">
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart Example
    var masculin = {{ App\Patient::where("sexe_patient","M")->get()->count() }};
    var feminin = {{ App\Patient::where("sexe_patient","F")->get()->count() }};
    var ctx = document.getElementById("myPieChart"); 
    var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ["Masculin", "Féminin"],
        datasets: [{
          data: [masculin, feminin],
          backgroundColor: ['#4e73df', '#1cc88a'],
          hoverBackgroundColor: ['#2e59d9', '#17a673'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });

    var fumeur = {{ App\Patient::where("fumeur","F")->get()->count() }};
    var nonfumeur = {{ App\Patient::where("fumeur","NF")->get()->count() }};

    var ctx1 = document.getElementById("myPieChart1"); 
    var myPieChart = new Chart(ctx1, {
      type: 'doughnut',
      data: {
        labels: ["Fumeur", "Non Fumeur"],
        datasets: [{
          data: [fumeur, nonfumeur],
          backgroundColor: ['#2c9faf', '#1cc88a'],
          hoverBackgroundColor: ['#2e59d9', '#1cc88a'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });
    var alcoolique = {{ App\Patient::where("alcool","A")->get()->count() }};
    var nonalcoolique = {{ App\Patient::where("alcool","NA")->get()->count() }};

    var ctx2 = document.getElementById("myPieChart2"); 
    var myPieChart = new Chart(ctx2, {
      type: 'doughnut',
      data: {
        labels: ["Alcoolique", "Non Alcoolique"],
        datasets: [{
          data: [alcoolique, nonalcoolique],
          backgroundColor: ['#f5424b', '#f5bf42'],
          hoverBackgroundColor: ['#f5424b', '#f5bf42'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });
  </script>