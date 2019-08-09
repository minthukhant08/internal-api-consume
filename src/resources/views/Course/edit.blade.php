@extends('layouts.login_view')
@section('space')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Course</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" placeholder="Enter name" value="{{ $response->name }}">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
              </div>
            </form>
          </div>
          <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Course Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                @foreach($response->details as $detail)
                  <form role="form">
                    <div class="box-body">
                      <div class="form-group">
                        <label>Topic</label>
                        <input class="form-control" placeholder="Enter name" value="{{$detail->topic}}">
                      </div>
                    </div>
                    <div class="box-body">
                      <div class="form-group">
                        <label>Descriptions</label>
                        <input class="form-control" placeholder="Enter name" value="{{$detail->descriptions}}">
                      </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                  </form>
                @endforeach
          </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
@endsection
