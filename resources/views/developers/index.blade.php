@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4>{{ __('List of Developers!') }}</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
<div>
  <a style="margin: 19px;" href="{{ route('developers.create')}}" class="btn btn-success">New Developer</a>
  <a style="margin: 19px;" href="" id="deleteall" class="btn btn-danger">Delete All</a>
  

</div>  
<div class="col-sm-12">
  <table class="table table-striped">
    <thead>
        <tr>
          <th class="text-center"> <input type="checkbox" id="checkAll"> Select All</th>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone Number</td>
          <th>Address</th>
          <th>Avatar</th>
          <th colspan = 2>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($developers as $key => $value)

        <tr>
            <td class="text-center"><input name='ids' type="checkbox" id="checkItem{{$developers[$key]->id}}" 
                         value="{{$developers[$key]->id}}">
            <td>{{$developers[$key]->id}}</td>
            <td>{{$developers[$key]->first_name}} {{$developers[$key]->last_name}}</td>
            <td>{{$developers[$key]->email}}</td>
            <td>{{$developers[$key]->phonenumber}}</td>
            <td>{{$developers[$key]->address}}</td>
            <td>
              <div class="image-cropper">
                  <img src="{{ asset('storage/'.$developers[$key]->avatar)}}" style="width: 30px;height: 30px;" class="rounded" />
              </div>
            </td>
            <td>
                <a href="{{ route('developers.edit',$developers[$key]->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('developers.destroy', $developers[$key]->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
</div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

      $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
      });

      $("#deleteall").click(function(e){
       e.preventDefault();
       developers.deleteall();
      });
      var developers={
        deleteall:function(e){
            var ids=[];
             $("input:checkbox[name=ids]:checked").each(function(){
              ids.push($(this).val())
              });

             $.ajax({
              url:"{{ route('deleteselected')}}",
              type:'DELETE',
              data:{
                ids:ids,
                _token:$('input[name=_token').val()
              },
              success:function(response){
                // console.log(response)
                $.each(ids,function(i,e){
                  $("#checkItem"+e).remove();
                })
                location.reload();
              }
            });
        }
      }

  });
    </script>
@endsection