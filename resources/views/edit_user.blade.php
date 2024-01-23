
  @extends('layouts.app')
@section('content')

<div class="container edit">
    <div class="container">
    <h1>Edit User</h1>
    </div>
    @php
    // echo "<pre>";
    //   print_r($user->toarray());

    @endphp
<form action="{{ route('edit_info', ['id' => $user->id]) }}" method="POST">
  @csrf
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name"  value="@if(isset($user))
          {{ $user->name }}
      @endif
      " aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="text" name="email" class="form-control" id="email" value="@if(isset($user))
          {{ $user->email }}
      @endif">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="password" value="@if(isset($user))
          {{ $user->password }}
      @endif">
        </div>
      
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

@endsection
@push('scripts')

@endpush