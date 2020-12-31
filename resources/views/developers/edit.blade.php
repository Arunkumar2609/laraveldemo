@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4>{{ __('Update developer info!') }}</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<div class="container py-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
          <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
            <form method="post" action="{{ route('developers.update', $developer->id) }}" enctype="multipart/form-data">
              @method('PATCH')
              @csrf
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="first_name">First name</label>
                        <input type="text" class="form-control" name="first_name" value={{ $developer->first_name }} />
                    </div>
                    <div class="col-sm-6">
                        <label for="last_name">Last name</label>
                        <input type="text" class="form-control" name="last_name" value={{ $developer->last_name }} />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" value={{ $developer->email }} />
                    </div>
                    <div class="col-sm-6">
                        <label for="phonenumber">Phone Number</label>
                        <input type="number" class="form-control" name="phonenumber" value={{ $developer->phonenumber }} />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" value={{ $developer->address }} />
                    </div>
                    <div class="col-sm-6">
                        <label for="avatar">Avatar</label>
                        <input type="file" class="form-control" name="avatar" value={{ $developer->avatar }} />
                        <span>{{ $developer->avatar }}</span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary px-4 float-right">Update</button>
            </form>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
