@include('layout.app')
@include('validationAlert')
<!-- Form create -->
<form class="text-center border border-light p-5" name="create" method="post" action="{{url('/vasttags/store')}}" >
    {{ csrf_field() }}

    <p class="h4 mb-4">Create website</p>

    <!-- Provider name -->
    <input type="text" id="vasttagName" name="provider_name" class="form-control mb-4" placeholder="Provider name">

    <!-- Url -->
    <input type="url" id="vasttagUrl" name="url" class="form-control mb-4" placeholder="Url">

    <!-- Zone -->
    <select id="VasttagsZones" class="form-control mb-4" name="zone_id">
        <option value="">Select...</option>
        @foreach($zones as $zone)
            <option value="{{$zone->id}}">{{$zone->div_tag}}</option>
        @endforeach
    </select>

    <!-- Create button -->
    <a href="{{url('/vasttags/store')}}">
    <button class="btn btn-info btn-block my-4" type="submit" name="create">Create</button>
    </a>

</form>
<!-- End form create->