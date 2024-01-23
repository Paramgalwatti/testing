
@extends('layouts.app')
<style>
  #error-message{
    background: #EFDCDD;
    color: red;
    padding: 10px;
    margin:10px;
    display: none;
    position: absolute;
    right: 15px;
    top: 15px;
  }
  </style>
@section('content')

<div class="container edit">
    <div class="container">
    <h1>Add User</h1>
    </div>
    @php
    // echo "<pre>";
    //   print_r($user->toarray());

    @endphp
{{-- <div id="success-message" class="alert alert-success"></div> --}}
<div id="error-message" class="text-danger" ></div>
<form  method="POST">
  @csrf
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name"  value="{{ old('name')}}" >
          {{-- @error('name')
          <span class="text-danger">{{ $message }}</span>
      @enderror --}}
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="text" name="email" class="form-control" id="email" value="{{ old('email')}}">
          {{-- @error('email')
          <span class="text-danger">{{ $message }}</span>
      @enderror --}}
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" value="{{ old('password')}}">
            {{-- @error('password')
            <span class="text-danger">{{ $message }}</span>
        @enderror --}}
          </div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $("#submit").on("click", function(e) {
      e.preventDefault();

      var name = $('#name').val();
      var email = $('#email').val();
      var password = $('#password').val();
     if(name == "" || email == "" || password == ""){
      $("#error-message").html("All feilds are Required").slideDown();
      $("#success-message").slideUp();
      setTimeout(function() {
          $('#error-message').slideUp();
        }, 3000);
     }
     else{
      $.ajax({
        url: "{{ route('user_info') }}",
        type: 'POST',
        data: { name: name, email: email, password: password , _token: '{{ csrf_token() }}'},
        
        success: function(data) {
           window.location.href = "{{ route('users') }}";
          $("#success-message").html("Data inserted Successfully").slideDown();
          $("#error-message").slideUp();
          
        },
        error: function(error) {
          console.log(error);
          $("#error-message").html("Can't save record").slideDown();
          $("#success-message").slideUp();
          setTimeout(function() {
          $('#error-message').slideUp();
        }, 3000);
         
        }
      });
     }
    
    });
  });
</script>


@endpush