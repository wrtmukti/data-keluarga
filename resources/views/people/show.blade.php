@extends('layouts.layout')
@section('content')
<div class="row my-5 justify-content-center">
  <div class="col-8">
    <div class="card shadow-sm p-5">
      <div class="row justify-content-center">
        <h5 class="text-center">Data {{ $people->name }}</h5>
      </div>
      <div class="row">
          <div class="mb-3">
              <label for="name" class="form-label" >Nama</label>
              <input type="text" class="form-control" name="name" value="{{ $people->name }}" disabled>
          </div>
          <div class="mb-3">
              <label for="name" class="form-label" >Jenis Kelamin</label>
              @if ($people->gender == 'male')
              <input type="text" class="form-control" name="name" value="Laki-Laki" disabled>
              @else
              <input type="text" class="form-control" name="name" value="Perempuan" disabled>                  
              @endif
          </div>
            <div class="mb-3">
              <label for="name" class="form-label" >Orang Tua</label>
              @if ($parent)
              <input type="text" class="form-control" name="name" value=" {{ $parent->name }}" disabled>
              @else
              <input type="text" class="form-control" name="name" value="Tidak ada orang tua" disabled>

              @endif
          </div>        
        </form>
      </div>
      
    </div>
  </div>
</div>
@endsection