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
    <a href="{{url('websites/createPage')}}">
        <button class="btn btn-primary">Create</button>
    </a>
    <a href="{{url('websites')}}">
        <button class="btn btn-secondary">Websites</button>
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
        <th scope="col">View</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    <!--Start foreach loop-->
    <!--Retrive all the data and show data in table-->
    @foreach($websites as $website)
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
                <a href="{{url('websites/'.$website->id.'/view')}}">
                    <button value="{{$website->id}}" class="btn btn-info">View</button>
                </a>
            </td>
            <td>
                <a href="{{url('websites/'.$website->id.'/updatePage')}}">
                    <button value="{{$website->id}}" class="btn btn-warning">Update</button>
                </a>
            </td>
            <td>
                <a href="{{url('websites/'.$website->id.'/undo')}}">
                    <button value="{{$website->id}}" id="delete" name="{{$website->name}}" onclick="ConfirmDelete()" class="btn btn-success">Un Do</button>
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
        var webName = document.getElementById('delete').name;
        var x = confirm("Are you sure you want to un do " + webName+"?");
        if (x)
            return true;
        else
            return false;
    }
</script>