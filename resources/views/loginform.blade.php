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
            <form action="{{route('loginstore')}}" method="post">
            @csrf 
            @method('post')
            <div class="mb-3 form-focus">
                <input type="text" name="pseudo" class="form-control floating">
                <label class="focus-label">identifiant</label>
            </div>
            <div class="mb-3 form-focus">
                <input type="password" name="password" class="form-control floating">
                <label class="focus-label">Password</label>
            </div>
           
            <div class="mb-3 form-focus">
                <select class="form-control" name="role">
                   <option value="patient">patient</option>
                   <option value="docteur">docteur</option>
                   <option value="admin">admin</option>
                </select>
               </div>
            <button class="btn btn-primary w-100 btn-lg login-btn" type="submit">Connexion</button>
            
            <div class="text-center dont-have">Pas de compte? <a href="{{route('patientcreate')}}">Creer un compte</a></div>
            </form>
            </div>
            </div>
            </div>
        
        </div>
        </div>
    </div>
    </div>
@endsection