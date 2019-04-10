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
    <a href="{{url('vasttags/createPage')}}">
        <button class="btn btn-primary">Create</button>
    </a>
</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">provider name</th>
        <th scope="col">url</th>
        <th scope="col">zone</th>
        <th scope="col">View</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    <!--Start foreach loop-->
    <!--Retrive all the data and show data in table-->
    @foreach($vasttags as $vasttag)
        <tr>
            <th scope="row">{{$vasttag->id}}</th>
            <td>{{$vasttag->provider_name}}</td>
            <td>{{str_limit($vasttag->url, 50)}}</td>
            <td>{{$vasttag->zone->div_tag}}</td>
            <td>
                <a href="{{url('vasttags/'.$vasttag->id.'/view')}}">
                    <button value="{{$vasttag->id}}" class="btn btn-info">View</button>
                </a>
            </td>
            <td>
                <a href="{{url('vasttags/'.$vasttag->id.'/updatePage')}}">
                    <button value="{{$vasttag->id}}" class="btn btn-warning">Update</button>
                </a>
            </td>
            <td>
                <a href="{{url('vasttags/'.$vasttag->id.'/delete')}}">
                    <button value="{{$vasttag->id}}" id="delete" name="{{$vasttag->name}}" onclick="ConfirmDelete()" class="btn btn-danger">Delete</button>
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