 @if($errors->count() > 0)
    <div class='alert alert-danger alert-dismissable fade in' id="errorDiv">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <p><strong>Oops!</strong> please fix the following errors</p>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
    @endif