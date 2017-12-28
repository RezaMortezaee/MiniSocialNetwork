@extends('layouts.master') @section('content')
<section class="row new-post">
	<br>
	<br>
	<div class="col-md-6 col-md-offset-3">
		<header>
			<h3>What do you have to say?</h3>
		</header>
		<form action="{{ route('post.create') }}">
			<div class="form-group">
				<textarea class='form-control' name="body" id="new-post" cols="30" rows="5" placeholser='Your Post'>
                </textarea>
			</div>
			<button type='submit' class='btn btn-primary'>Create Post</button>
			<input type='hidden' value='{{ Session::token() }}' name='_token'>
		</form>
	</div>
</section>
<br>
<br>
<section class="row posts">
	<div class="col-md-6 col-md-offset-3">
		<header>
			<h3>What other people say...</h3>
        </header>
            @foreach($posts as $post)
                <article class="post">
                    <p>
                        {{$post->body}}
                    </p>
                    <div class="info">
                        Posted by {{ $post->user->first_name }} on {{ $post->created_at }}
                    </div>
                    <div class="intraction">
                        <a href="#">Like</a> |
                        <a href="#">Dislike</a> |
                        <a href="#">Edit</a> |
                        <a href="{{ route('post.delete',['post_id' => $post->id]) }}">Delete</a>
                    </div>
                </article>
            @endforeach
		</article>
	</div>
</section>
@endsection