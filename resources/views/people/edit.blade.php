@extends('layouts.layout')
@section('content')

<div class="row my-5 justify-content-center">
  <div class="col-8">
    <div class="card shadow-sm p-5">
      <div class="row justify-content-center">
        <h5 class="text-center">Edit Data {{ $people->name }}</h5>
      </div>
      <div class="row">
        <form action="/people/{{ $people->id }}" method="POST">
          @method('patch')
          @csrf
            <div class="mb-3">
              <label for="name" class="form-label" >Nama</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value=" {{ $people->name }}">
            @error('name')<div class="invalid-feedback"> {{ $message }}</div>@enderror
          </div>
            <div class="mb-3">
              <label for="disabledSelect" class="form-label">Jenis Kelamin</label>
              <select id="disabledSelect" name="gender" class="form-select">
                <option value="male">Laki-Laki</option>
                <option value="female">Perempuan</option>
                <option value="others">Lain-lain</option>
              </select>
              @error('gender')<div class="invalid-feedback"> {{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label for="parent_id" class="form-label">Orang Tua</label>
              <select name="parent_id" id="" class="form-select">
                @foreach ($peoples as $people)
                <option value="{{ $people->id }}">{{ $people->name }}</option>
                @endforeach
              </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
      
    </div>
  </div>
</div>
@endsection