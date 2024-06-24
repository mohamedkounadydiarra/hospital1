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


        <form class="needs-validation" action="{{ route('specialitestore') }}" method="post">
        @csrf 
        @method('post')
        <div class="row">
        <div class="col-md-4 mb-3">
        <label class="mb-2" for="validationCustom01">Non specialite</label>
        <input type="text" class="form-control" id="validationCustom01" name="nomspecialite" placeholder="nom" required>
        <div class="valid-feedback">
        regarder bien
        </div>
        </div>
        <div class="col-md-4 mb-3">
        <label class="mb-2" for="validationCustom02">lien image</label>
        <input type="text" class="form-control" id="validationCustom02" name="photo" placeholder="img" >
        <div class="valid-feedback">
        regarder bien
        </div>
        </div>
    
        
        </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit form</button>
        </form>
    </div>
    </div>
    </div>
    </div>
    
    
    </div>
    </div>
@endsection