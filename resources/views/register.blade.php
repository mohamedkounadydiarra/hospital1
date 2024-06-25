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
            <h3>creer un compte <span>Doccure</span></h3>
            </div>

            @if (session('success'))
            <div class="" style="background-color: rgb(76, 228, 152);">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
            <div style="background-color: rgb(230, 105, 105);">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color:white;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
             @endif
           
            <form action="{{route('register_store')}}" method="post">
            @csrf 
            @method('post')
            <div class="mb-3 form-focus">
                <input type="text" name="nom" value="{{old('nom')}}" class="form-control floating">
                <label class="focus-label">Nom</label>
            </div>
            <div class="mb-3 form-focus">
                <input type="text" name="prenom" value="{{old('prenom')}}" class="form-control floating">
                <label class="focus-label">Prenom</label>
            </div>
            <div class="mb-3 form-focus">
                <input type="text" name="photo" value="{{old('photo')}}" class="form-control floating">
                <label class="focus-label">Photo</label>
            </div>
        
            <div class="mb-3 form-focus">
                <input type="text" name="email" value="{{old('email')}}" class="form-control floating">
                <label class="focus-label">email</label>
            </div>
                       
            <div class="mb-3 form-focus">
                <input type="date" name="datenaiss" value="{{old('datenaiss')}}" class="form-control floating">
                <label class="focus-label">date naissance</label>
            </div>
            <div class="mb-3 form-focus">
                <input type="text" name="telephone" value="{{old('telephone')}}" class="form-control floating">
                <label class="focus-label">telephone</label>
            </div>
            <div class="mb-3 form-focus">
                <input type="password" name="password" class="form-control floating">
                <label class="focus-label">Password</label>
            </div>
            <div class="mb-3 form-focus">
                <input type="text" name="taille" value="{{old('taille')}}" class="form-control floating">
                <label class="focus-label">taille</label>
            </div>
            <div class="mb-3 form-focus">
                <input type="number" name="poid" value="{{old('poid')}}" class="form-control floating">
                <label class="focus-label">Poid</label>
            </div>
   


            <div class="mb-3 form-focus">
                <input type="hidden" name="role" value="patient" class="form-control floating">
               
            </div>
           
            <button class="btn btn-primary w-100 btn-lg login-btn" type="submit">Creer</button>
            
            <div class="text-center dont-have">deja un compte? <a href="{{route('login_form')}}">connexion</a></div>
            </form>
            </div>
            </div>
            </div>
        
        </div>
        </div>
    </div>
    </div>
@endsection