@extends('shared._layout')
@section('PageTitle', 'Dashboard')
@section('header')
<!-- Bagian Header -->

@endsection

@section('content')
<div class="container" style="margin-top:50px;margin-bottom:50px; box-shadow:0px !important; -webkit-box-shadow:0 !important">
        <div class="row">
            <div class="col-md-3">
                <div class="cards hovercard">
                    <div class="cardheader">
                    </div>
                    <div class="avatar">
                        <img alt="" src="{{ asset('assets/images/profile.png')}}">
                    </div>
                    <div class="info">
                        <div class="title">
                            <a href="#"> {{ Auth::user()->name }}</a>
                        </div>
                        <div class="desc">
                           
                                <b>	   {{ Auth::user()->email }}</b>
                          
                        </div>
						
                        <hr />
                        <div class="desc">
                        Rusunawa Kota Magelang
                        
                        </div>
                    </div>
                    <div class="bottom">
                        
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="cards" style="text-align: center; padding-top: 100px; padding-bottom: 100px;">
               
                <center>
                  <img alt="" src="{{ asset('assets/images/logo-icon.png')}}" width="100px"><br /><br /><br />
                </center>
                    <h1>Sistem Informasi Rusunawa</h1>
                    <h3>Kota Magelang</h3>
                   
                </div>
            </div>
        </div>

    </div>
	

@endsection


@section('footer')
<!-- Footer Script -->

@endsection