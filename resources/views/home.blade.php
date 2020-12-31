@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                        <a style="margin: 19px;" href="{{ route('developers.index')}}" class="btn btn-primary">Developer Mangement</a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
