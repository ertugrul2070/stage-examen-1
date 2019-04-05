@include('layout.app')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div class="col-lg-6">
    <a href="{{url('/websites')}}">
        <button class="btn btn-success">Back</button>
    </a>
</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">url</th>
        <th scope="col">User</th>
        <th scope="col">active</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    <!--Retrive all the data and show data in table-->
        <tr>
            <th scope="row">{{$website->id}}</th>
            <td>{{$website->name}}</td>
            <td>{{$website->url}}</td>
            <td>{{$website->user->name}}</td>
            <!-- If the active value is 1 display "Yes". If its not display No-->
            @if($website->active == 1)
                <td>{{__('Yes')}}</td>
                @else
                <td>{{__('No')}}</td>
                @endif
            <td>
                <a href="{{url('websites/'.$website->id.'/updatePage')}}">
                    <button value="{{$website->id}}" class="btn btn-warning">Update</button>
                </a>
            </td>
            <td>
                <a href="{{url('websites/'.$website->id.'/delete')}}">
                    <button value="{{$website->id}}" class="btn btn-danger">Delete</button>
                </a>
            </td>
        </tr>
    </tbody>
</table>