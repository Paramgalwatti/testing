
@extends('layouts.app')
@section('content')

<div class="container edit">
    <div class="container">
    <h1>Add User</h1>
    </div>
    @php
    // echo "<pre>";
    //   print_r($user->toarray());

    @endphp
<form action="{{ route('user_info') }}" method="POST">
  @csrf
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name"  value="{{ old('name')}}" >
          @error('name')
          <span class="text-danger">{{ $message }}</span>
      @enderror
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="text" name="email" class="form-control" id="email" value="{{ old('email')}}">
          @error('email')
          <span class="text-danger">{{ $message }}</span>
      @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" value="{{ old('password')}}">
            @error('password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

@endsection
@push('scripts')

@endpush