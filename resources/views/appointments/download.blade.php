<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Vista de la recetas medica</title>
    {{-- <link rel="stylesheet" href="{{asset('vendor/css/recetaStyle.css')}}"> --}}
    {{-- <link rel="stylesheet" href="vendor/css/recetaStyle.css"> --}}
    <link rel="stylesheet" href="{{public_path('vendor/css/recetaStyle.css')}}">
</head>
<body>
    <div style="display: none;">{{date_default_timezone_set('America/Mexico_City')}}</div>
    @foreach ($data as $item)
	<div class="wrapper">

        <div class="one">
            <div class="img">
                <div class="lo"><img src="{{public_path('vendor/img/fondo1.png')}}" class="logo"></div>
                <div class="lo2"><img src="{{public_path('storage/LogoMedic/'.$item->logo)}}" class="logoescuela"></div>
            </div>
            <div class="titulo">
                <h3>Medico: {{Auth::user()->name}}</h3>
            <h4>Especialidad: {{$item->specialty}}</h4>
                <h4>Celula: 1234556UDC</h4>
                <!-- Ubicacion de su clinica o consultorio -->
                <p class="ubi">Ubicacion: Avenida los patos Manzanillo Colima Mexico</p>
                <p>Numero de Contacto: {{$item->numbre_phone}}</p>
            </div>
            <div class="indicaciones">
                <h2 class="indi">Indicaciones: </h2>
            </div>
            <div class="date">
                <p class="fecha"><b>Fecha de expedicion: {{ date("y-m-d") }}</b></p>
                <p class="hora"><b>Hora de expedicion: {{date("H:i")}}</b></p>
            </div>
            <div class="firma">
                <div class="line"></div>
                <div class="sing">Firma</div>
            </div>
	</div>
	</div>
    @endforeach
</body>
</html>