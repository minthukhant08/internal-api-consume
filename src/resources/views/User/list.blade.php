@extends('layouts.login_view')
@section('space')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Table With Full Features</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Profile</th>
              <th>Name</th>
              <th>Gender</th>
              <th>User Type</th>
              <th>Details</th>
              <th>Update</th>
              <th>Delete</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($response as $user)
                <tr>
                  <td><img width="50" src={{$user->image}} alt=""></th>
                  <td>{{$user->name}}</td>
                  <td>{{$user->gender}}</td>
                  <td>{{$user->user_type}}</td>

                  <td>
                      <a href="{{url('/users/show/'. $user->id)}}" class="btn primary">Details</a>
                  </td>
                  <td>
                    <a href="{{url('/users/edit/'. $user->id)}}" class="btn primary">Edit</a>
                  </td>
                  <td><form action="{{'/users/delete/'. $user->id}}" method="post">
                    {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit"  class="btn btn-danger" value="Delete">Delete</button>
                      </form>
                  </td>
                </tr>
              @endforeach

            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
@endsection
