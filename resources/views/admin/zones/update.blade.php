@include('layout.app')
@include('validationAlert')
<!-- Form create -->
<form class="text-center border border-light p-5" name="update" method="post" action="{{url('/zones/'.$zone->id.'/update')}}" >
    {{ method_field('PUT') }}
    {{ csrf_field() }}

    <p class="h4 mb-4">Update zone</p>

    <!-- div_tag -->
    <input type="text" id="zoneDivTag" name="div_tag" class="form-control mb-4" value="{{$zone->div_tag}}">

    <!-- websites -->
    <select id="zoneWebsites" class="form-control mb-4" name="website_id">
        @foreach($websites as $website)
            @if($zone->website_id === $website->id)
                <option selected value="{{$website->id}}">{{$website->name}}</option>
            @else
                <option value="{{$website->id}}">{{$website->name}}</option>
            @endif
        @endforeach
    </select>

    <!-- Update button -->
    <a href="{{url('/zones/'.$zone->id.'/update')}}">
        <button class="btn btn-info btn-block my-4" type="submit" name="update">Update</button>
    </a>

</form>
<!-- End form update->