@extends("layouts.master")
    @section('title')
        Home
    @stop
    @section('content')
    @include("layouts.staff-navbar")
    <div class="container">
       
        <h1>Staff Home Page</h1>
        {{session('rank')}}
        <br>
    </div>
    @stop
   
