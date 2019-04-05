@include('layout.app')
@include('validationAlert')
<!-- Form create -->
<form class="text-center border border-light p-5" name="update" method="post" action="{{url('/vasttags/'.$vasttag->id.'/update')}}" >
    {{ method_field('PUT') }}
    {{ csrf_field() }}

    <p class="h4 mb-4">Update vasttags</p>

    <!-- Name -->
    <input type="text" id="providerName" name="provider_name" class="form-control mb-4" value="{{$vasttag->provider_name}}">

    <!-- Url -->
    <input type="url" id="providerUrl" name="url" class="form-control mb-4" value="{{$vasttag->url}}">

    <!-- Zone -->
    <select id="websiteUser" class="form-control mb-4" name="zone_id">
        @foreach($zones as $zone)
            @if($vasttag->zone_id === $zone->id)
                <option selected value="{{$zone->id}}">{{$zone->div_tag}}</option>
            @else
                <option value="{{$zone->id}}">{{$zone->div_tag}}</option>
            @endif
        @endforeach
    </select>

    <!-- Update button -->
    <a href="{{url('/vasttags/'.$vasttag->id.'/update')}}">
        <button class="btn btn-info btn-block my-4" type="submit" name="update">Update</button>
    </a>

</form>
<!-- End form update->