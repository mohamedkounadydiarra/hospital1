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
    <table class="datatable table table-hover table-center mb-0">
    <thead>
    <tr>
        <th>Docteur ID</th>
        <th>pseudo</th>
        <th>email</th>
        <th>telephone</th>
        <th>photo</th>
        <th>specialite</th>
    </tr>
    </thead>
    <tbody>
        @foreach($docteur as $docteurs)
    <tr>
        <td>{{$docteurs->id}}</td>
        <td>{{$docteurs->pseudo}}</td>
        <td>{{$docteurs->email}}</td>
        <td>{{$docteurs->telephone}}</td>
        <td>{{$docteurs->photo}}</td>
        <td>{{$docteurs->specialite->nomspecialite}}</td>
        <td>
        <h2 class="table-avatar">
        <a href="profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{$docteurs->photo}}" alt="User Image"></a>
        </h2>
        </td>
        <td>{{$docteurs->specialite->nomspecialite}}</td>
        <td><a href="{{route('docteur_delete',['id' => $docteurs->id])}}" class="btn btn-danger">Delete</a></td>
        <td><a href="{{route('docteur_edit',['id' => $docteurs->id])}}"  class="btn btn-primary">editer</a></td>
    
    </tr>
        @endforeach
    </tbody>
    </table>
    {{$docteur->links()}}
    </div>
    </div>
    </div>
    </div>
</div>
</div>
@endsection