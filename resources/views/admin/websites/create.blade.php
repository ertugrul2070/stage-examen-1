@include('layout.app')
@include('validationAlert')
<!-- Form create -->
<form class="text-center border border-light p-5" name="create" method="post" action="{{url('/websites/store')}}" >
    {{ csrf_field() }}

    <p class="h4 mb-4">Create website</p>

    <!-- Name -->
    <input type="text" id="websiteName" name="name" class="form-control mb-4" placeholder="Name">

    <!-- Url -->
    <input type="url" id="websiteUrl" name="url" class="form-control mb-4" placeholder="Url">

    <!-- User -->
    <select id="websiteUser" class="form-control mb-4" name="user_id">
        <option>Select...</option>
        @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>

    <!-- Active -->
    <select id="websiteActive" class="form-control mb-4" name="active">
        <option>Select...</option>
        <option value="1">{{(__('Yes'))}}</option>
        <option value="0">{{__('No')}}</option>
    </select>

    <!-- Create button -->
    <a href="{{url('/websites/store')}}">
    <button class="btn btn-info btn-block my-4" type="submit" name="create">Create</button>
    </a>

</form>
<!-- End form create->