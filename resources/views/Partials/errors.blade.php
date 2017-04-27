 @if($errors->count() > 0)
    <div class='alert alert-danger' id="errorDiv">
    <p><strong>Oops!</strong> please fix the following errors</p>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
    @endif