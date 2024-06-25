@extends('LayoutWelcome/base')
@section('content')
<div class="content top-space">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
            
            <div class="account-content">
            <div class="row align-items-center justify-content-center">
            <div class="col-md-7 col-lg-6 login-left">
            <img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Login">
            </div>
            <div class="col-md-12 col-lg-6 login-right">
            <div class="login-header">
            <h3>Login <span>Doccure</span></h3>
            </div>
            @if ($errors->any())
            <div style="background-color: rgb(230, 105, 105);">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color:white;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
             @endif

             @if (session('success'))
             <div class="" style="background-color: rgb(76, 228, 152);">{{ session('success') }}</div>
             @endif
             
            <form action="{{route('login_store')}}" method="post">
            @csrf 
            @method('post')
            <label class="focus-label">Email</label>
            <div class="mb-3 form-focus">
                <input type="text" name="email" class="form-control floating">             
            </div>
            <label class="focus-label">Password</label>
            <div class="mb-3 form-focus">
                <input type="password" name="password" class="form-control floating">
            </div>
            <label class="focus-label">Role</label>
            <div class="mb-3 form-focus">
                <select name="role" class="form-control">
                    <option value="patient">Patient</option>
                    <option value="docteur">Docteur</option>
                    <option value="admin">Admin</option>
                </select>
                
            </div>
           
            <button class="btn btn-primary w-100 btn-lg login-btn" type="submit">Connexion</button>
            
            <div class="text-center dont-have">Pas de compte? <a href="{{route('register')}}">Creer un compte</a></div>
            </form>
            </div>
            </div>
            </div>
        
        </div>
        </div>
    </div>
    </div>
@endsection