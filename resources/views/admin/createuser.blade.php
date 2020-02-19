@extends('layouts.master')

@section('title')
  Create User | Kaan
@endsection


@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yeni Kullanıcı</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/save-newuser", method="POST">
        {{ csrf_field() }}
      <div class="modal-body">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Ad:</label>
            <input type="text" name="name" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Soyad:</label>
            <input type="text" name="surname" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="text" name="email" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Telefon:</label>
            <input type="text" name="phone" class="form-control" id="recipient-name">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">TC No:</label>
            <input type="text" name="identity_Number" class="form-control" id="recipient-name">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Doğum Yılı:</label>
            <input type="text" name="birthdate" class="form-control" id="recipient-name">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Parola:</label>
            <input type="password" name="password" class="form-control" id="recipient-name">
          </div>

          <div class="form-group">
            <label>Give Role</label>
            <select name="user_type">
              <option value="admin">Admin</option>
              <option value="vendor">Vendor</option>
              <option value="">None</option>
            </select>
        
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Kaydet</button>
      </div>
        </form>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Create User
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Create</button>
      </h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>Name</th>
              <th>Surname</th>
              <th>Email</th>
              <th>Phone</th>
              <th>TC No</th>
              <th>user_type</th>

            </thead>
            <tbody>

              @foreach ($users as $row)
              <tr>
                <td> {{ $row->name }}</td>
                <td> {{ $row->surname }}</td>
                <td>{{ $row->email}}</td>
                <td>{{ $row->phone}}</td>
                <td>{{ $row->identity_Number}}</td>
                <td>{{ $row->user_type}}</td>
                @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


@section('scripts')

@endsection
