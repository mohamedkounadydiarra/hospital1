@extends('admin/LayoutAdmin/base')
@section('content')
<div class="row">
    <div class="col-sm-12">
    
    <div class="card">
    <div class="card-header">
    <h5 class="card-title">Ajout specialite</h5>
    </div>
    <div class="card-body">
    <div class="row">
    <div class="col-sm">
        
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


        <form class="needs-validation" action="{{ route('docteur_update',['id' => $docteur->id]) }}" method="post">
        @csrf 
        @method('put')
        <div class="row">
        <div class="col-md-4 mb-3">
        <label class="mb-2" for="validationCustom01">Identifiant</label>
        <input type="text" class="form-control" id="validationCustom01" name="pseudo" value="{{$docteur->pseudo}}"  required>
        <div class="valid-feedback">
        regarder bien
        </div>
        </div>
        <div class="col-md-4 mb-3">
            <label class="mb-2" for="validationCustom01">Telephone</label>
            <input type="text" class="form-control" id="validationCustom01" name="telephone" value="{{$docteur->telephone}}" required>
            <div class="valid-feedback">
            regarder bien
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label class="mb-2" for="validationCustom01">Email</label>
            <input type="email" class="form-control" id="validationCustom01" name="email" value="{{$docteur->email}}"  required>
            <div class="valid-feedback">
            regarder bien
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label class="mb-2" for="validationCustom01">Photo</label>
            <input type="text" class="form-control" id="validationCustom01" name="photo" value="{{$docteur->photo}}"  required>
            <div class="valid-feedback">
            regarder bien
            </div>
        </div>
        <div class="col-md-4 mb-3">
        <label class="mb-2" for="validationCustom02">Specialité</label>
        <select name="idspecialite" class="form-control">
            <option value="0" selected disabled>--Selectionner la specialite--</option>
            @foreach ($specialite as $specialites)
                 <option value="{{$specialites->id}}">{{$specialites->nomspecialite}}</option>
            @endforeach
           
        </select>
        <div class="valid-feedback">
        regarder bien
        </div>
        </div>
      
        </div>
        </div>
        <button class="btn btn-primary" type="submit">Mise a jour</button>
        </form>
    </div>
    </div>
    </div>
    </div>
    
    
    </div>
    </div>
@endsection