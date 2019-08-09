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
              <th>Name</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Details</th>
              <th>Update</th>
              <th>Delete</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($response as $batch)
                <tr>
                  <td>{{$batch->name}}</td>
                  <td>{{$batch->start_date}}</td>
                  <td>{{$batch->end_date}}</td>

                  <td>
                      <a href="{{url('/batches/show/'. $batch->id)}}" class="btn primary">Details</a>
                  </td>
                  <td>
                    <a href="{{url('/batches/edit/'. $batch->id)}}" class="btn primary">Edit</a>
                  </td>
                  <td><form action="{{'/batches/delete/'. $batch->id}}" method="post">
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
