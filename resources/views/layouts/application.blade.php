<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Gestion de courriers MENA</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
  <link href="{{asset('bootstrap/css/simple-sidebar.css')}}" rel="stylesheet">
  <link href="{{asset('bootstrap/css/all.css')}}" type="text/css" rel="stylesheet">
  <link href="{{asset('bootstrap/iconfont/material-icons.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{{asset('datetimepicker-master/jquery.datetimepicker.css')}}" rel="stylesheet">
  <link href="{{asset('datetimepicker-master/build/jquery.datetimepicker.min.css')}}" rel="stylesheet">

        <link  href="{{asset('datatables/datatables.min.css')}}" rel="stylesheet">
        <link  href="{{asset('datatables/datatables.css')}}" rel="stylesheet">
        <link  href="{{asset('DataTables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
        <link  href="{{asset('datatables/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Gestion des courrier</div>
      <div class="list-group list-group-flush">
        <a href="/home" class="list-group-item list-group-item-action bg-light"> <i class="fa fa-bars"></i> Menu</a>
        <a href="/Accueil" class="list-group-item list-group-item-action bg-light"> <i class="fa fa-paper-plane"></i> Courriers</a>
        <a href="/Administration" class="list-group-item list-group-item-action bg-light"> <i class="fa fa-sitemap"></i> Administration</a>
        <a href="/test" class="list-group-item list-group-item-action bg-light"> <i class="fa fa-cog"></i> Paramètres</a>
        <!-- Authentication Links -->
                        @guest
                           <!-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>-->
                            @if (Route::has('register'))
                               <!-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Regqister') }}</a>
                                </li>-->
                            @endif
                        @else
                                    <a class="dropdown-item list-group-item list-group-item-action bg-light" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <i class="fa fa-power-off"></i>
                                         {{ Auth::user()->name }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        @endguest

      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom ">
        <button class="btn btn-success" id="menu-toggle"><i class="fa fa-angle-double-left"></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Recherche">
                    </div>
              </form>
            </li>

            <li class="nav-item active">
               <button type="submit" class="btn btn-default btn-success"><i class="fa fa-search"></i></button>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">

        @if(Session::has('notif.message'))
        <div class="alert alert-{{session('notif.type')}}">
          {{session('notif.message')}}
        </div>
        @endif
        @yield('content')
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('bootstrap/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('bootstrap/jquery/jquery.js')}}"></script>
  <script src="{{asset('bootstrap/jquery/jqPerso.js')}}"></script>
  <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
  <script src="{{asset('bootstrap/js/main.js')}}"></script>
  <script src="{{asset('datatables/datatables.min.css')}}"></script>
  <script src="{{asset('datatables/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('datatables/js/jquery.dataTables.bootstrap.min.js')}}"></script>
  <script src="{{asset('datatables/js/jquery.dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('datetimepicker-master/jquery.datetimepicker.js')}}"></script>
  <script src="{{asset('datetimepicker-master/build/jquery.datetimepicker.full.js')}}"></script>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    $(document).ready( function () {
        $('#myTable').DataTable({




        "language": {
          "sProcessing": "Traitement en cours ...",
          "sLengthMenu": "Afficher _MENU_ lignes",
          "sZeroRecords": "Aucun résultat trouvé",
          "sEmptyTable": "Aucune donnée disponible",
          "sInfo": "Lignes _START_ à _END_ sur _TOTAL_",
          "sInfoEmpty": "Aucune ligne affichée",
          "sInfoFiltered": "(Filtrer un maximum de_MAX_)",
          "sInfoPostFix": "",
          "sSearch": "Chercher:",
          "sUrl": "",
          "sInfoThousands": ",",
          "sLoadingRecords": "Chargement...",
          "oPaginate": {
            "sFirst": "Premier", "sLast": "Dernier", "sNext": "Suivant", "sPrevious": "Précédent"
          },
          "oAria": {
            "sSortAscending": ": Trier par ordre croissant", "sSortDescending": ": Trier par ordre décroissant"
          }
        }

        });
    } );

    jQuery('.datetimepicker').datetimepicker(
      {
        format:'d/m/Y H:i',
    });   
    $.datetimepicker.setLocale('fr');

  </script>
  
</body>

</html>
