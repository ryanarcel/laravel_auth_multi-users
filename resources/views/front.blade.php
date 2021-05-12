@extends("layouts.master")
    @section('title')
        App
    @stop
    @section('content')

    <div class="col-md-4 offset-md-4 mt-5">

    <form action="{{route('login')}}" method="post" id="admin-form">
        <h4>Login as Admin</h4>
        <div class="form-group">
        Username <input type="text" name="username" id="" class="form-control">
        </div>
        <div class="form-group">
        Password <input type="password" name="password" id="" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="Login" class="btn btn-primary mt-2 form-control">
        </div>
        @csrf
    </form>

    <form action="{{route('loginStaff')}}" method="post" id="staff-form" style="display:none">
        <h4>Login as Staff</h4>
        <div class="form-group">
        Username <input type="text" name="username" id="" class="form-control">
        </div>
        <div class="form-group">
        Password <input type="password" name="password" id="" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="Login" class="btn btn-success mt-2 form-control">
        </div>
        @csrf
    </form>

    <div class="alert alert-danger mt-3" style="display:none" role="alert">
        {{$errors->first()}}
    </div>

    <a href="#" id="toggleLink" style="margin-top:20px">Login as Staff</a>
       
    
    </div>

@stop

@section('scripts')
<script>
    $('document').ready(function(){
        @if ($errors->any())
            $(".alert").fadeIn(500).delay(3000).fadeOut(500);
        @endif

        $("#toggleLink").click(function(){
            let label = $(this).html();

            if(label == "Login as Staff"){
                $(this).html("Login as Admin")
                $('#staff-form').delay(500).fadeIn(300);
                $('#admin-form').fadeOut(300);
            }
            else{
                $(this).html("Login as Staff")
                $('#staff-form').fadeOut(300);      
                $('#admin-form').delay(500).fadeIn(300);          
            }
        });
    })
</script>
@stop
