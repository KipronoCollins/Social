@extends('layouts.master')

@section('content')
@include('includes.message-block')

    <section class="row new-post">
        <div class="col-md-6 offset-md-3">
            <header>
                <h3>
                    What do you have to say?
                </h3>
            </header>

            <form action=" {{ route('post.create') }} " method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
            </form>
        </div>
    </section>


    <section class="row posts">
        <div class="col-md-6 offset-md-3">
            <header>
                <h3>
                    What other people say
                </h3>
            </header>

            @foreach ($posts as $post)
            <article class="post">
                    <p> {{ $post->body }} </p>
                    
                    <div class="info">
                        Posted by  {{ $post->user->first_name }}  on {{ $post->created_at }}
                    </div>
    
                    <div class="interaction">
                        <a href="">Like</a>
                        <a href="">Dislike</a>
                        
                        @if (Auth::user() == $post->user)
                        <a href="">Edit</a>
                        <a href=" {{ route('post.delete', ['post_id' => $post->id]) }} ">Delete</a>
                        @endif

                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Post</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary">Save changes</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

@endsection