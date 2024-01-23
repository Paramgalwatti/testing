@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Testing</h1>
    <div><a href="{{ route('add_user') }}" class="add btn btn-primary btn-sm" id="addBtn">Add User</a></div>
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
        @php
            Session::forget('success');
        @endphp
    </div>
    @endif
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(function () {
        
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('users') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
        
    });
  </script>
  <script>
    $(document).ready(function() {
  
        $('.data-table').on('click', '.edit', function() {
            var userId = $(this).data('id');
            console.log(userId);
            var editUserUrl = 'edit_user/' + userId;
            window.location.href = editUserUrl;
            
        });
    });

</script>
<script>
    $(document).ready(function() {
  
        $('.data-table').on('click', '.delete', function() {
            var userId = $(this).data('del');
            console.log(userId);
            var deleteUserUrl = 'delete_user/' + userId;
            window.location.href = deleteUserUrl;
            
        });
    });

</script>
@endpush