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

        <form class="needs-validation" action="{{ route('updatespecialite',['id' => $specialite->id]) }}" method="post">
        @csrf 
        @method('put')
        <div class="row">
        <div class="col-md-4 mb-3">
        <label class="mb-2" for="validationCustom01">Non specialite</label>
        <input type="text" class="form-control"  name="nomspecialite" value="{{$specialite->nomspecialite}}" required>
        <div class="valid-feedback">
        regarder bien
        </div>
        </div>
        <div class="col-md-4 mb-3">
        <label class="mb-2" for="validationCustom02">lien image</label>
        <input type="text" class="form-control"  name="photo" value="{{$specialite->photo}}" >
        <div class="valid-feedback">
        regarder bien
        </div>
        </div>
    
        
        </div>
        </div>
        <button class="btn btn-primary" type="submit">Mise à jour</button>
        </form>
    </div>
    </div>
    </div>
    </div>
    
    
    </div>
    </div>
@endsection