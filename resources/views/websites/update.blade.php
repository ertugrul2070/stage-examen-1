@include('layout.app')
<!-- Form create -->
<form class="text-center border border-light p-5" name="create" method="post" action="{{url('/websites/store')}}" >
    {{ csrf_field() }}

    <p class="h4 mb-4">Update website</p>

    <!-- Name -->
    <input type="text" id="websiteName" name="name" class="form-control mb-4" value="{{$website->name}}">

    <!-- Url -->
    <input type="url" id="websiteUrl" name="url" class="form-control mb-4" value="{{$website->url}}">

    <!-- User -->
    <select id="websiteUser" class="form-control mb-4" name="user_id">
        @foreach($users as $user)
            @if($website->user_id === $user->id)
                <option selected value="{{$user->id}}">{{$user->name}}</option>
            @else
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endif
        @endforeach
    </select>

    <!-- Active -->
    <select id="websiteActive" class="form-control mb-4" name="active">
        @if($website->active === 1)
            <option selected value="{{$website->active}}">{{"Yes"}}</option>
            <option value="1">{{(__('No'))}}</option>
        @else
            <option selected value="{{$website->active}}">{{"No"}}</option>
            <option value="0">{{__('Yes')}}</option>
        @endif
    </select>

    <!-- Create button -->
    <a href="{{url('/websites/update')}}">
        <button class="btn btn-info btn-block my-4" type="submit" name="create">Create</button>
    </a>

</form>
<!-- End form create->