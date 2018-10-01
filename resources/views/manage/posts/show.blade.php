@extends('layouts.manage')

@section('content')

	<div class="flex-container">

		<div class="columns m-t-10">

			<div class="column is-8">
				<h1 class="title"> {{$post->title}} <small class="m-l-25"></small></h1>
				<img src="{{asset('images/blog/'.$post->bk_image)}}" alt="">
          <p>{{$post->content}}</p>
			</div>

			<div class="column is-4 side-card">
        <div class="card">

          <div class="card-content">

						<dl class="level">
              <dt class="level-left">Created at:</dt>
              <dd class="level-right"><time datetime="2016-1-1">{{ date('M j, Y H:i', strtotime($post->created_at))}}</time></dd>
            </dl>

            <dl class="level">
              <dt class="level-left">Last Update :</dt>
              <dd class="level-right"><time datetime="2016-1-1">{{ date('M j, Y H:i', strtotime($post->update_at))}}</time></dd>
            </dl>

          </div>

          <footer class="card-footer">
            <p class="card-footer-item">
              <a href="{{route('posts.edit', $post->id)}}" class="">
								<span class="icon m-r-10">
									<img src="{{ asset('images/backend/edit.png') }}" alt="link to edit">
								</span>
      				</a>
            </p>

						<form class="card-footer-item" action="{{ route('posts.destroy', $post->id) }}" method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}
							{{method_field('DELETE')}}
							<button class="button" style="border:none;">
								<span class="icon m-r-10" style="width:50%">
									<img src="{{ asset('images/backend/delete.png') }}" alt="link to delete">
								</span>
							</button>
            </form>

						<!-- <form class="card-footer-item"  action="{{ route('posts.destroy', $post->id) }}" method="POST" enctype="multipart/form-data">
							{{method_field('DELETE')}}
				        {{csrf_field()}}
              <a type="submit" class="form-submit">
								<span class="icon m-r-10">
									<img src="{{ asset('images/backend/delete.png') }}" alt="link to delete">
								</span>
							</a>
              <input type="hidden" name="_token" value="{{Session::token()}}">
            </form> -->

          </footer>
        </div>


			</div>

		</div>
		<hr class="m-t-0">
	</div> {{-- end of flex container --}}


@endsection

@section('scripts')

@endsection
