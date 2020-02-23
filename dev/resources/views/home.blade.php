@extends('layouts.app')

@section('content')
<div class="wrapper">

    <nav id="sidebar">
        <div class="sidebar-header">
            <h4>Bienvenido al aula ludomática</h4>
        </div>

        <ul class="list-unstyled components">
            <p>Inicio</p>
            <li class="active">
                <a href="#matematicas" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Matemáticas</a>
                <ul class="collapse list-unstyled" id="matematicas">
                    <li>
                        <a href="#">Sessión 1</a>
                    </li>
                    <li>
                        <a href="#">Sesión 2</a>
                    </li>
                    <li>
                        <a href="#">Sesión 3</a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a href="#espanol" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Español</a>
                <ul class="collapse list-unstyled" id="espanol">
                    <li>
                        <a href="#">Sesión 1</a>
                    </li>
                    <li>
                        <a href="#">Sesión 2</a>
                    </li>
                    <li>
                        <a href="#">Sesión 3</a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a href="#quimica" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Química</a>
                <ul class="collapse list-unstyled" id="quimica">
                    <li>
                        <a href="#">Sesión 1</a>
                    </li>
                    <li>
                        <a href="#">Sesión 2</a>
                    </li>
                    <li>
                        <a href="#">Sesión 3</a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a href="#geografia" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Geografía</a>
                <ul class="collapse list-unstyled" id="geografia">
                    <li>
                        <a href="#">Sesión 1</a>
                    </li>
                    <li>
                        <a href="#">Sesión 2</a>
                    </li>
                    <li>
                        <a href="#">Sesión 3</a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a href="#historia-u" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Historia Universal</a>
                <ul class="collapse list-unstyled" id="historia-u">
                    <li>
                        <a href="#">Sesión 1</a>
                    </li>
                    <li>
                        <a href="#">Sesión 2</a>
                    </li>
                    <li>
                        <a href="#">Sesión 3</a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a href="#historia-m" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Historia de México</a>
                <ul class="collapse list-unstyled" id="historia-m">
                    <li>
                        <a href="#">Sesión 1</a>
                    </li>
                    <li>
                        <a href="#">Sesión 2</a>
                    </li>
                    <li>
                        <a href="#">Sesión 3</a>
                    </li>
                </ul>
            </li>
            {{--<li>
                <a href="#">Portfolio</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>--}}
        </ul>

        <ul class="list-unstyled CTAs">

        </ul>
    </nav>

    <div class="content p-4">
            <div class="jumbotron">
                <div class="container">
                    <h1 class="display-5">Curso en línea para ingreso al media superior</h1>
                    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                </div>
            </div>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Mátematicas</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Button</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Español</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <div class="row">
                            <div class="col-md-2">
                                <h6>Sesión 1</h6>
                            </div>
                            <div class="col-md-8">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width:{{90}}%;"
                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        5 /
                                        10
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary">Button</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Button</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Button</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
