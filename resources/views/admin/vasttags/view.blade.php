@include('layout.app')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div class="col-lg-6">
    <a href="{{url('/vasttags')}}">
        <button class="btn btn-success">Back</button>
    </a>
</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Provider name</th>
        <th scope="col">url</th>
        <th scope="col">Zone</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    <!--Retrive all the data and show data in table-->
        <tr>
            <th scope="row">{{$vasttag->id}}</th>
            <td>{{$vasttag->provider_name}}</td>
            <td>{{$vasttag->url}}</td>
            <td>{{$vasttag->zone->div_tag}}</td>
            <td>
                <a href="{{url('vasttags/'.$vasttag->id.'/updatePage')}}">
                    <button value="{{$vasttag->id}}" class="btn btn-warning">Update</button>
                </a>
            </td>
            <td>
                <a href="{{url('vasttags/'.$vasttag->id.'/delete')}}">
                    <button value="{{$vasttag->id}}" class="btn btn-danger">Delete</button>
                </a>
            </td>
        </tr>
    </tbody>
</table>