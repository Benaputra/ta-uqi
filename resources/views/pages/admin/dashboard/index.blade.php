@extends('layouts.master')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
<link rel="stylesgeet" href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">
<link rel="stylesheet" href="{{asset('css/custom.css')}}">
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image:url('http://wallpapere.org/wp-content/uploads/2012/02/black-and-white-city-night.png');"></div>
<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                   <div class="profile">
                        <div class="avatar">
                            <img src="{{asset('frontend\img\polnep.png')}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <div class="description text-center">
                <p>An artist of considerable range, Chet Faker — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. </p>
            </div>
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="profile-tabs">
                      <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                        @role('admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/dashboard')}}" >
                                <i class="material-icons">home</i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('dosen.index')}}" >
                                <i class="material-icons">people</i>
                                    Dosen
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{{url('/admin/filter-absen')}}}" >
                                <i class="material-icons">task</i>
                                    Rekapan Presensi
                                </a>
                            </li>
                            @endrole

                            @role('AdminInformatika')
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/dashboard')}}" >
                                <i class="material-icons">home</i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('dosen.index')}}" >
                                <i class="material-icons">people</i>
                                    Dosen
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{{url('/admin/filter-absen')}}}" >
                                <i class="material-icons">task</i>
                                    Rekapan Presensi
                                </a>
                            </li>
                        @endrole
                            @role('AdminElektronika')
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/dashboard')}}" >
                                <i class="material-icons">home</i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('dosen.index')}}" >
                                <i class="material-icons">people</i>
                                    Dosen
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{{url('/admin/filter-absen')}}}" >
                                <i class="material-icons">task</i>
                                    Rekapan Presensi
                                </a>
                            </li>
                        @endrole
                            @role('AdminListrik')
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/dashboard')}}" >
                                <i class="material-icons">home</i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('dosen.index')}}" >
                                <i class="material-icons">people</i>
                                    Dosen
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{{url('/admin/filter-absen')}}}" >
                                <i class="material-icons">task</i>
                                    Rekapan Presensi
                                </a>
                            </li>
                        @endrole

                        @role('dosen')
                        <li class="nav-item">
                            <a class="nav-link" href="{{{url('/dashboard/rekap-absen')}}}" >
                            <i class="material-icons">task</i>
                                Rekapan Presensi
                            </a>
                        </li>
                        @endrole
                        @role('mahasiswa')
                        <li class="nav-item">
                            <a class="nav-link" href="{{{url('/dashboard/rekap-absen')}}}" >
                            <i class="material-icons">task</i>
                                Rekapan Presensi
                            </a>
                        </li>
                        @endrole
                      </ul>
                    </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>




</body>
