@include('layout.app')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div class="col-lg-6">
    <a href="{{url('/')}}">
        <button class="btn btn-success">Back</button>
    </a>
    <a href="{{url('zones/createPage')}}">
        <button class="btn btn-primary">Create</button>
    </a>
</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Tag</th>
        <th scope="col">Website</th>
        <th scope="col">View</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    <!--Start foreach loop-->
    <!--Retrive all the data and show data in table-->
    @foreach($zones as $zone)
        <tr>
            <th scope="row">{{$zone->id}}</th>
            <td>{{$zone->div_tag}}</td>
            <td>{{str_limit($zone->website->url, 40)}}</td>
            <td>
                <a href="{{url('zones/'.$zone->id.'/view')}}">
                    <button value="{{$zone->id}}" class="btn btn-info">View</button>
                </a>
            </td>
            <td>
                <a href="{{url('zones/'.$zone->id.'/updatePage')}}">
                    <button value="{{$zone->id}}" class="btn btn-warning">Update</button>
                </a>
            </td>
            <td>
                <a href="{{url('zones/'.$zone->id.'/delete')}}">
                    <button value="{{$zone->id}}" id="delete" name="{{$zone->div_tag}}" onclick="ConfirmDelete()" class="btn btn-danger">Delete</button>
                </a>
            </td>
        </tr>
    @endforeach
    <!--End foreach loop-->
    </tbody>
</table>

<script type="text/javascript">
    function ConfirmDelete()
    {
        if(!confirm("Are you sure you want to delete the website!"))
            event.preventDefault();
    }
</script>