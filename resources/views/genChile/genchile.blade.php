<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <title>Nikken Chile - Pre Registro</title>
        <link rel="shortcut icon" type="image/x-icon" href="https://www.nikken.com/themes_wordpress_/images/icons/nikken_logo.ico">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
        <link href="http://chile.nikkenlatam.com/regchileasset/css/fontawesome.css" rel="stylesheet">
        <link href="http://chile.nikkenlatam.com/regchileasset/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="http://chile.nikkenlatam.com/regchileasset/css/plugins.css" rel="stylesheet">
        <link href="http://chile.nikkenlatam.com/regchileasset/css/register.css" rel="stylesheet" type="text/css" />


        <link rel="stylesheet" type="text/css" href="http://chile.nikkenlatam.com/regchileasset/plugins/table/datatable/datatables.css">
        <link rel="stylesheet" type="text/css" href="http://chile.nikkenlatam.com/regchileasset/plugins/table/datatable/custom_dt_zero_config.css">

        <style>
            .row [class*="col-"] .widget .widget-header h4 { color: green; }
            input[type=number]::-webkit-inner-spin-button, 
            input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none; 
            margin: 0; 
            }

            input[type=number] { -moz-appearance:textfield; }

            div.dt-buttons {
                position: relative;
                float: left;
            }

            #zero-config_info{
                display: block;
            }

            th{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="form-register" id="divprofile">
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <img alt="logo" src="https://nikkenlatam.com/oficina-virtual/assets/images/general/logo-header-black.png" class="theme-logo">
                </div>
                <br>
                <div class="col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header widget-heading">
                            <br>
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h4>Genealogia </h4>
                                </div>
                                <hr>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    @foreach ($sponsor as $nombre)
                        <div class="input-group mb-4">
                            <input type="text" id="sponsorName" class="form-control-rounded form-control text-center" placeholder="Spinners" aria-label="spinners" aria-describedby="basic-addon1" value="{{ $nombre->nombre }}" readonly>
                        </div>
                        <div class="input-group mb-4">
                            <input type="hidden" id="fecha" class="form-control-rounded form-control text-center" placeholder="Spinners" aria-label="spinners" aria-describedby="basic-addon1" value="{{ date('Y-m-d') }}" readonly>
                        </div>
                        <div class="input-group mb-4">
                            <a href="export/{{ $associateid }}" class="btn btn-info mb-4 mr-2 btn-rounded" target="_new">
                                <img src="http://keizentaishi.test/retos/img/excel.png" width="15px">
                                Descargar a excel
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-12 tooltip-section down">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="table-responsive mb-4">
                                    <br>
                                    <table id="zero-config-down" class="table table-striped table-hover table-bordered" style="width:100%">
                                        <thead>
                                            @php
                                                $numero = 1;
                                            @endphp
                                            <tr>
                                                <th># De registro</th>
                                                <th>Nivel de profundidad</th>
                                                <th>Id</th>
                                                <th>Nombre Asesor B.</th>
                                                <th>Tipo de asesor</th>
                                                <th>País</th>
                                                <th>Correo</th>
                                                <th>Teléfono</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($response as $row)
                                                <tr>
                                                    <td>{{ $numero }}</td>
                                                    <td>{{ $row->Nivel }}</td>
                                                    <td>{{ $row->associateid }}</td>
                                                    <td>{{ $row->ApFirstName}}</td>
                                                    <td>Asesor</td>
                                                    <td>{{ $row->Pais}}</td>
                                                    <td>{{ $row->E_Mail }}</td>
                                                    <td>{{ $row->Phone1 }}</td>
                                                </tr>
                                                @php
                                                    $numero++;
                                                @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    </body>
    <script src="http://chile.nikkenlatam.com/regchileasset/bootstrap/js/popper.min.js"></script>
    <script src="http://chile.nikkenlatam.com/regchileasset/js/jquery.validate.min.js"></script>
    <script src="http://chile.nikkenlatam.com/regchileasset/bootstrap/js/bootstrap.min.js"></script>
    <script src="http://chile.nikkenlatam.com/regchileasset/js/custom.js"></script>

    <script src="http://chile.nikkenlatam.com/regchileasset/plugins/table/datatable/datatables.js"></script>


    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>


    <script>
        $(function() {
            var language = $('#language').val();
            var sponsorName = $('#sponsorName').val();
            var date = $("#fecha").val();
            $('#zero-config-down').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
                },
                "bPaginate": false,
            });
        });
        function salir(){
            window.history.back();
        }
    </script>
</html>