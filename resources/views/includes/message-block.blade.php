@if (count($errors) > 0)
<div class="row">
        <div class="col-md-6 error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if (Session::has('message'))

<div class="row">
        <div class="col-md-6 offset-md-3 success"> 
           <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        </div>
    </div>
    
@endif