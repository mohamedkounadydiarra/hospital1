@extends('admin/LayoutAdmin/base')
@section('content')
<div class="row">
    <div class="col-sm-12">
    <div class="card">
    <div class="card-body">
    <div class="table-responsive">
    <div class="table-responsive">
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
    <a href="{{route('specialite_create')}}" class="btn btn-primary">Add</a>
    <table class="datatable table table-hover table-center mb-0">
    <thead>
    <tr>
        <th>Specialite ID</th> 
        <th>image</th>
        <th>Nom</th>
       
    </tr>
    </thead>
    <tbody>
        @foreach($specialite as $specialites)
    <tr>
        <td>{{$specialites->id}}</td>
        <td>
        <h2 class="table-avatar">
        <a href="profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{$specialites->photo}}" alt="User Image"></a>
        </h2>
        </td>
        <td>{{$specialites->nomspecialite}}</td>
        <td><a href="{{route('specialite_delete',['id' => $specialites->id])}}" class="btn btn-danger">Delete</a></td>
        <td><a href="{{route('specialite_edit',['id' => $specialites->id])}}"  class="btn btn-primary">editer</a></td>
    
    </tr>
        @endforeach
    </tbody>
    </table>
    {{$specialite->links()}}
    </div>
    </div>
    </div>
    </div>
</div>
</div>
@endsection