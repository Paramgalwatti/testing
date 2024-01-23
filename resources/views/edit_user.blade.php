
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
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    var editUserUrl;

    $("#submit").on("click", function(e) {
      e.preventDefault();
      var userId = {{ $user->id }};
      editUserUrl = 'edit_info/' + userId;
      //console.log(editUserUrl);

      var name = $('#name').val();
      var email = $('#email').val();
      var password = $('#password').val();
      if (name === "" || email === "" || password === "") {
        $("#error-message").html("All fields are required").slideDown();
        $("#success-message").slideUp();
        setTimeout(function() {
          $('#error-message').slideUp();
        }, 3000);
      } else {
        $.ajax({
          url: editUserUrl,
          type: 'POST',
          data: {
            name: name,
            email: email,
            password: password,
            _token: '{{ csrf_token() }}'
          },
          success: function(data) {
            //window.location.href = "{{ route('users') }}";
            $("#success-message").html("Data inserted successfully").slideDown();
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
</script> --}}
@endpush