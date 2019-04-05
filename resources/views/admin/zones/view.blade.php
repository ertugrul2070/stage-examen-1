@include('layout.app')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div class="col-lg-6">
    <a href="{{url('/zones')}}">
        <button class="btn btn-success">Back</button>
    </a>
</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">div_tag</th>
        <th scope="col">website</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    <!--Retrive all the data and show data in table-->
        <tr>
            <th scope="row">{{$zone->id}}</th>
            <td>{{$zone->div_tag}}</td>
            <td>{{$zone->website->url}}</td>
            <td>
                <a href="{{url('zones/'.$zone->id.'/updatePage')}}">
                    <button value="{{$zone->id}}" class="btn btn-warning">Update</button>
                </a>
            </td>
            <td>
                <a href="{{url('zones/'.$zone->id.'/delete')}}">
                    <button value="{{$zone->id}}" class="btn btn-danger">Delete</button>
                </a>
            </td>
        </tr>
    </tbody>
</table>