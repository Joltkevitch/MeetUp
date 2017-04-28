 @if(Session::has("message-error"))
    <div class='alert alert-danger' id="errorDiv">
    <p><strong>Oops!</strong> please fix the following errors</p>
    <ul>
        <li>{{ Session::get("message-error") }}</li>
    </ul>
    </div>
    @endif