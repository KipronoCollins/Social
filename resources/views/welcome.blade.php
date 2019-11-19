@extends('layouts.master')

@section('title')
   Welcome!
@endsection

@section('content')
@include('includes.message-block')
   <div class="row">
       <div class="col-md-6">
           {{-- col-md-6 is responsible for dividing the two forms into two columns its a bootsrap class --}}
           <h3>Sign Up</h3>
           <form action=" {{ route('signup') }} " method="post">
            @csrf
               <div class="form-group">
                   <label for="email">Your E-Mail</label>
                   <input type="text" name="email" id="email" class="form-control" {{ 'autofocus' ==  $errors->has('email') ? '= autofocus' : null }} value=" {{ Request::old('email') }} ">
               </div>
               
                <div class="form-group">
                    <label for="first_name">Your Firstname</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" {{ 'autofocus' ==  $errors->has('first_name') ? '= autofocus' : null }}  {{ Request::old('first_name') }} >
                </div>

                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                 </div>

                 <button type="submit" class="btn btn-primary">Submit</button>
           </form>
       </div>

       <div class="col-md-6">
           <h3>Sign In</h3>
            <form action=" {{ route('signin') }} " method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Your E-Mail</label>
                    <input type="text" name="email" id="email" class="form-control"  {{ Request::old('email') }} >
                </div>
 
                 <div class="form-group">
                     <label for="password">Your Password</label>
                     <input type="password" name="password" id="password" class="form-control">
                  </div>
 
                  <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
   </div>
@endsection