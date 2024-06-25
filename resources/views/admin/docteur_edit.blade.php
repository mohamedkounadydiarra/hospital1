@extends('admin/LayoutAdmin/base')
@section('content')
<div class="row">
    <div class="col-sm-12">
    
    <div class="card">
    <div class="card-header">
    <h5 class="card-title">Ajout Docteur</h5>
    </div>
    <div class="card-body">
    <div class="row">
    <div class="col-sm">
        
        @if (session('success'))
        <div class="alert alert-success" style="background-color: rgb(76, 228, 152);">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger" style="background-color: rgb(230, 105, 105);">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color:white;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
         @endif


        <form class="needs-validation" action="{{route('docteur_update',['id' => $docteur->id])}}" method="post">
        @csrf 
        @method('put')
        <div class="row">
        <div class="col-md-4 mb-3">
        <label class="mb-2" for="validationCustom01">nom</label>
        <input type="text" class="form-control" id="validationCustom01" value="{{$docteur->nom}}" name="nom"  required>
        <div class="valid-feedback">
        regarder bien
        </div>
        </div>
        <div class="col-md-4 mb-3">
            <label class="mb-2" for="validationCustom01">prenom</label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$docteur->prenom}}" name="prenom" required>
            <div class="valid-feedback">
            regarder bien
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label class="mb-2" for="validationCustom01">photo</label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$docteur->photo}}" name="photo" required>
            <div class="valid-feedback">
            regarder bien
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label class="mb-2" for="validationCustom01">Email</label>
            <input type="email" class="form-control" id="validationCustom01" value="{{$docteur->email}}" name="email"  required>
            <div class="valid-feedback">
            regarder bien
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label class="mb-2" for="validationCustom01">date de naissance</label>
            <input type="date" class="form-control" id="validationCustom01" value="{{$docteur->date}}" name="datenaiss"  required>
            <div class="valid-feedback">
            regarder bien
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label class="mb-2" for="validationCustom01">Telephone</label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$docteur->telephone}}" name="telephone"  required>
            <div class="valid-feedback">
            regarder bien
            </div>
        </div>
        
        <div class="col-md-4 mb-3">
            <label class="mb-2" for="validationCustom01">taille</label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$docteur->taille}}" name="taille"  required>
            <div class="valid-feedback">
            regarder bien
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label class="mb-2" for="validationCustom01">Poid</label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$docteur->poid}}" name="poid"  required>
            <div class="valid-feedback">
            regarder bien
            </div>
        </div>
        <div class="col-md-4 mb-3">
        <label class="mb-2" for="validationCustom02">Specialité</label>
        <select name="idspecialite" class="form-control">
            <option value="0" disabled selected>--Selectionner la specialité--</option>
            @foreach ($specialite as $specialites)
                 <option value="{{$specialites->id}}">{{$specialites->nomspecialite}}</option>
            @endforeach
           
        </select>
        <div class="valid-feedback">
        regarder bien
        </div>
        </div>
        <input type="hidden" class="form-control" id="validationCustom01" name="role" value="docteur"  required>
        </div>
        </div>
        <button class="btn btn-primary" type="submit">Mettre a jour</button>
        </form>
    </div>
    </div>
    </div>
    </div>
    
    
    </div>
    </div>
@endsection