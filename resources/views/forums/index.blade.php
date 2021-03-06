@extends('layouts.base')
@section('title', __('Most upvoted questions'))
@section('content')

<!-- Page Content -->

<section>

    <div class="content-box-md">

        <div id="frm-container">

            <div class="row">

                <!-- Blog Entries Column -->
                <div class="col-xl-8">
					
					<form class="forum-search small-scr-search" method="GET" action="/search/results">
						<input type="search" class="searchbox" name="search_query" placeholder="{{__('Search').'...'}}" required>
						<input title="Search" value="" type="submit" class="search-button">
					</form>

					<div class="forum-index-header">
						<h2 class="forum-index-title">{{ __('Most upvoted questions') }}</h2>
						{!! Form::open(['method'=>'GET', 'action'=>'ForumController@create']) !!}
							<button class="btn btn-yellow btn-general pull-right">{{__('Ask a')." question"}}</button>
						{!! Form::close() !!}
					</div>

                    <!-- Blog Post -->
					<div class="forums-holder">
                    @foreach($forums as $forum)
                        <div class="forum-box">
                            <div class="forum-box-body">
                                <h3 class="forum-box-title">
								{!! Form::open(['method'=>'GET', 'action'=> ['ForumController@show', $forum->id]]) !!}
                                    <button>{{$forum->title}}</button>
                                {!! Form::close() !!}
								</h3>
                                <p class="forum-box-body">
								@if(strlen($forum->body) < 200)
									{{$forum->body}}
								@else()
									{{substr($forum->body, 0, 200).'...'}}
								@endif
								</p>
                            </div>
                            <div class="forum-box-footer">
								<div>
									<span class="box question-score @if($forum->votes > 0) good-result @elseif($forum->votes < 0) bad-result @endif">
										@if($forum->votes > 0) {{ "+".$forum->votes }} @else {{ $forum->votes }} @endif
									</span>
								</div>
								<div>
									{{ __('Posted on')." ".$forum->created_at." ".__('by')}}
									&nbsp;<span class="username">@if($forum->user) {{ $forum->user->name }} @else {{ "[".__('removed')."]" }} @endif</span>
								</div>
								<div>
									<span class="box answer-count">{{ $forum->answers->count()." ".__('answer')."(s)" }}</span>
								</div>
                            </div>
                        </div>
                    @endforeach
					</div>
                </div>

                <!-- Sidebar Widgets Column -->
                <div class="col-xl-4 justify-content-center">

                    <!-- Search Widget -->
                    <div id="fix-div" class="position-fixed">
                        @include('forums.sideBar')
                    </div>

                </div>

            </div>
            <!-- /.row -->
            <div class="row">
                <div class="text-center" style="margin-left : 15px;">
                    {{$forums->render()}}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
</section>

@include('forums.tags')

@endsection
