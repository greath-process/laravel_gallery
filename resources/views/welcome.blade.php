<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>{{ $main->seo_title }}</title>
        <meta name="description" value="{{ $main->seo_description }}">
        <meta name="title" value="{{ $main->seo_title }}">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="{{ URL::asset('js/html5shiv.js') }}"></script><![endif]-->
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
        <!--[if lte IE 8]><link rel="stylesheet" href="{{ URL::asset('css/ie8.css') }}" /><![endif]-->
        <!--[if lte IE 9]><link rel="stylesheet" href="{{ URL::asset('css/ie9.css') }}" /><![endif]-->
        <noscript><link rel="stylesheet" href="{{ URL::asset('css/noscript.css') }}" /></noscript>
    </head>
	<body class="is-loading-0 is-loading-1 is-loading-2">
		<!-- Main -->
			<div id="main">

				<!-- Header -->
					<header id="header">
					<div class="logohead">
						<img src="{{ $main->image }}" alt="" width="150">
					</div>
						<h1 class="text-center">{{ $main->title }}</h1>
						<p class="text-center">{!! $main->description !!}</p>
						<ul class="icons text-center">
                            @foreach($icons as $icon)
							<li><a href="{{$icon->link}}" class="icon {{$icon->image}}"><span class="label">{{$icon->title}}</span></a></li>
                            @endforeach
						</ul>
					</header>

				<!-- Thumbnail -->
					<section id="thumbnails">
                        @foreach($pictures as $picture)
						<article>
							<a class="thumbnail" href="{{ $picture->image }}" data-position="left center">
                                <img src="{{ $picture->image }}" alt="" />
                            </a>
							<h2>{{$picture->name}}</h2>
							<p>{{$picture->anons}}</p>
						</article>
                        @endforeach
					</section>

				<!-- Footer -->
					<footer id="footer">
                        {!! $main->footer !!}
					</footer>
			</div>
		<!-- Scripts -->
			<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
			<script src="{{ URL::asset('js/skel.min.js') }}"></script>
			<!--[if lte IE 8]><script src="{{ URL::asset('js/respond.min.js') }}"></script><![endif]-->
			<script src="{{ URL::asset('js/main.js') }}"></script>
			<script type="text/javascript">
			 $('.toggle').click(function(){
			 	$('.caption').toggle();
			 })
			</script>
	</body>
</html>
