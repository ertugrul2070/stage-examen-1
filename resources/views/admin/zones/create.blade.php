@include('layout.app')
@include('validationAlert')
<!-- Form create -->
<form class="text-center border border-light p-5" name="create" method="post" action="{{url('/zones/store')}}" >
    {{ csrf_field() }}

    <p class="h4 mb-4">Create zones</p>

    <!-- Div tag -->
    <input type="text" id="zonesUrl" name="div_tag" class="form-control mb-4" placeholder="div tag">

    <!-- Websites -->
    <select id="zonesUser" class="form-control mb-4" name="website_id">
        <option value="">Select...</option>
        @foreach($websites as $website)
            <option value="{{$website->id}}">{{$website->name}}" | "{{str_limit($website->url,50)}}</option>
        @endforeach
    </select>

    <!-- Create button -->
    <a href="{{url('/zones/store')}}">
    <button class="btn btn-info btn-block my-4" type="submit" name="create">Create</button>
    </a>

</form>
<!-- End form create->