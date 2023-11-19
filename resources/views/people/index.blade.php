@extends('layouts.layout')
@section('content')
{{-- Tittle --}}
<div class="row my-4 justify-content-center">
  <h3 class="text-center fw-bold">CRUD Data Keluarga</h3>
</div>
{{-- End Tittle --}}

{{-- Alert  --}}
@if (session('success'))
<div class="alert alert-success text-center">
  <p class="fw-bold">{{ session('success') }}</p>
</div>
@endif
@if (session('danger'))
<div class="alert alert-danger text-center">
  <p class="fw-bold">{{ session('danger') }}</p>
</div>
@endif
{{-- End Alert --}}



{{-- Data Family --}}
<div class="row justify-content-center">
  <div class="col-8">
    <div class="card shadow-sm mb-5 p-3">
      {{-- Button Add --}}
      <div class="row justify-content-center mb-2">
        <div class="col-12">
          <a href="/people/create" role="button" class="btn btn-primary">Tambah data</a>
        </div>
      </div>
      {{-- End Button Add --}}
      <div class="table-responsive">
        <table class="table table-dark table-sm">
          <thead>
            <th class="text-center" style="width: 10%">Id</th>
            <th class="text-center" style="width: 30%">Nama</th>
            <th class="text-center" style="width: 30%">Jenis Kelamin</th>
            {{-- <th class="text-center" style="width: 20%">Id Orang Tua</th> --}}
            <th class="text-center" style="width: 30%">Aksi</th>
          </thead>
          <tbody>
            @foreach ($peoples as $people)
            <tr>
              <td class="text-center">{{ $people->id }}</td>
              <td class="text-center">{{ $people->name }}</td>
              <td class="text-center">
                @if ($people->gender == 'female')
                    Perempuan
                @else
                    Laki-Laki
                @endif
              </td>
              {{-- <td class="text-center">{{ $people->parent_id }}</td> --}}
              <td class="text-center">
                <div class="row justify-content-center mx-2">
                  <div class="col-4">
                    <a href="/people/{{ $people->id }}" role="button" class="btn btn-primary">Lihat</a>
                  </div>
                  <div class="col-4">
                    <a href="/people/{{ $people->id }}/edit" role="button" class="btn btn-success">Edit</a>
                  </div>
                  <div class="col-4">
                    {{-- <a href="/people/{{ $people->id }}" role="button" class="btn btn-danger">Hapus</a> --}}
                    <form action="/people/{{ $people->id }}" method="POST" class="d-inline" >
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn btn-danger">hapus</button>
                    </form>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
{{-- End Data Family --}}

{{-- Tittle --}}
<div class="row my-4 justify-content-center">
  <h3 class="text-center fw-bold">Tes Query</h3>
</div>
{{-- End Tittle --}}

{{-- Query --}}
<div class="row mb-2 justify-content-center">
  <div class="col-8">
    <div class="card shadow-sm p-3">
      <form action="/people/query" class="d-flex" role="search" method="POST">
        @csrf
        <select name="query" id="" class="form-select">
          <option value="">Pilih Query</option>
          <option value="1">Buat query untuk mendapatkan semua anak Budi</option>
          <option value="2">Buat query untuk mendapatkan cucu dari budi</option>
          <option value="3">Buat query untuk mendapatkan cucu perempuan dari budi</option>
          <option value="4">Buat query untuk mendapatkan bibi dari Farah</option>
          <option value="5">Buat query untuk mendapatkan sepupu laki-laki dari Hani</option>
        </select>
          <button class="btn btn-warning mx-2" type="submit">Query</button>
      </form>
      @if ($question)
        <div class="row justify-content-center mt-3 ms-1">
          <div class="col-12">
            <h5>{{ $question }}</h5>
          </div>
        </div>
      @endif
      @if ($query)
        <div class="row justify-content-center">
          <div class="col-12">
            <ul>
            @foreach ($query as $data)
               <li>{{ $data->name }} </li> 
            @endforeach
            </ul>
          </div>
        </div>
      @endif

    </div>
  </div>
</div>
{{-- End Query --}}



@endsection