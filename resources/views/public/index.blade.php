{{-- @extends('layouts.public')

@section('content') --}}

<x-public-layout>
<section id="billboard">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<button class="prev slick-arrow">
					<i class="icon icon-arrow-left"></i>
				</button>

				<div class="main-slider pattern-overlay">
					
					@foreach ($banners as $banner)
						<div class="slider-item">
							<div class="banner-content">
								<h2 class="banner-title">{{ $banner->title }}</h2>
								<p>{{ Str::limit($banner->description, 500) }}</p>
								<div class="btn-wrap">
									<a href="{{ route('book.detail', $banner->id) }}" class="btn btn-outline-accent btn-accent-arrow">Detail<i class="icon icon-ns-arrow-right"></i></a>
								</div>
							</div><!--banner-content--> 
							<img src="{{ $banner->s3_cover_url }}" alt="banner" class="banner-image" style="object-fit: cover !important">
						</div>
					@endforeach

					@foreach ($banners as $banner)
						<div class="slider-item">
							<div class="banner-content">
								<h2 class="banner-title">{{ $banner->title }}</h2>
								<p>{{ Str::limit($banner->description, 500) }}</p>
								<div class="btn-wrap">
									<a href="{{ route('book.detail', $banner->id) }}" class="btn btn-outline-accent btn-accent-arrow">Detail<i class="icon icon-ns-arrow-right"></i></a>
								</div>
							</div><!--banner-content--> 
							<img src="{{ $banner->s3_cover_url }}" alt="banner" class="banner-image" style="object-fit: cover !important">
						</div>
					@endforeach

					@foreach ($banners as $banner)
						<div class="slider-item">
							<div class="banner-content">
								<h2 class="banner-title">{{ $banner->title }}</h2>
								<p>{{ Str::limit($banner->description, 500) }}</p>
								<div class="btn-wrap">
									<a href="{{ route('book.detail', $banner->id) }}" class="btn btn-outline-accent btn-accent-arrow">Detail<i class="icon icon-ns-arrow-right"></i></a>
								</div>
							</div><!--banner-content--> 
							<img src="{{ $banner->s3_cover_url }}" alt="banner" class="banner-image" style="object-fit: cover !important">
						</div>
					@endforeach

				</div><!--slider-->
					
				<button class="next slick-arrow">
					<i class="icon icon-arrow-right"></i>
				</button>
				
			</div>
		</div>
	</div>
	
</section>

<section id="featured-books">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

			<div class="section-header align-center">
				<h2 class="section-title">Featured Books</h2>
			</div>

			<div class="product-list" data-aos="fade-up">
				<div class="row">

					@foreach ($featuredBook as $book)
					<div class="col-md-3">
						<figure class="product-style">
							<img src="{{ $book->s3_cover_url }}" alt="Books" class="product-item">
								<button type="button" class="add-to-cart" data-product-tile="add-to-cart">View detail</button>
							<figcaption>
								<h3>{{ $book->title }}</h3>
								<p>{{ $book->author }}</p>
								{{-- <div class="item-price">$ 40.00</div> --}}
							</figcaption>
						</figure>
					</div>
					@endforeach
			
				</div><!--ft-books-slider-->				
			</div><!--grid-->


			</div><!--inner-content-->
		</div>
		
		<div class="row">
			<div class="col-md-12">

				<div class="btn-wrap align-right">
					<a href="{{ route('book') }}" class="btn-accent-arrow">View all books <i class="icon icon-ns-arrow-right"></i></a>
				</div>
				
			</div>		
		</div>
	</div>
</section>

<section id="best-selling" class="leaf-pattern-overlay">
	<div class="corner-pattern-overlay"></div>
	<div class="container">
		<div class="row">

			<div class="col-md-8 col-md-offset-2">

				<div class="row">

					<div class="col-md-6">
						<figure class="products-thumb">
							<img src="{{ $bestBook->s3_cover_url }}" alt="book" class="single-image">
						</figure>	
					</div>

					<div class="col-md-6">
						<div class="product-entry">
							<h2 class="section-title divider">Best book</h2>

							<div class="products-content">
								<div class="author-name">By {{ $bestBook->author }}</div>
								<h3 class="item-title">{{ $bestBook->title }}</h3>
								<p>
									{{ Str::limit($bestBook->description, 300) }}
								</p>
								{{-- <div class="item-price">$ 45.00</div> --}}
								<div class="btn-wrap">
									<a href="{{ route('book.detail', $bestBook->id) }}" class="btn-accent-arrow">View detail <i class="icon icon-ns-arrow-right"></i></a>
								</div>
							</div>

						</div>
					</div>

				</div>
				<!-- / row -->

			</div>

		</div>
	</div>
</section>

<section id="popular-books" class="bookshelf">
	<div class="container">
	<div class="row">
		<div class="col-md-12">

			<div class="section-header align-center">
				{{-- <div class="title">
					<span>Some quality items</span>
				</div> --}}
				<h2 class="section-title">Popular Books</h2>
			</div>

			<ul class="tabs">
				<a class="tab @if(!request()->input('category')) active @endif "  href="{{ route('home') }}" style="text-decoration: none;" >
					All Genre
				</a>
				@foreach ($categories as $category)
				<a class="tab @if(request()->input('category') == $category->slug) active @endif "  href="{{ route('home', ['category' => $category->slug]) }}" style="text-decoration: none;" >
					{{ $category->name }}
				</a>
				@endforeach
			</ul>

			<div class="tab-content">
			<div id="all-genre" data-tab-content class="active">
				<div class="row">

					@foreach ($popularBook as $book)
					<div class="col-md-3">
						<a href="{{ route('book.detail', $book->id) }}" style="text-decoration: none;">
							<figure class="product-style">
								<img src="{{ $book->s3_cover_url }}" alt="Books" class="product-item">
								<button type="button" class="add-to-cart" data-product-tile="add-to-cart">View Detail</button>
								<figcaption>
									<h3>Portrait photography</h3>
									<p>{{ $book->author }}</p>
									{{-- <div class="item-price">$ 40.00</div> --}}
								</figcaption>
							</figure>
						</a>
					</div>
					@endforeach

			</div>

			</div>

		</div><!--inner-tabs-->
			
		</div>
	</div>
</section>

<section id="quotation" class="align-center">
	<div class="inner-content">
		<h2 class="section-title divider">Quote of the day</h2>
		<blockquote data-aos="fade-up">
			<q>Book not make you rich quickly but book can save your life</q>
			<div class="author-name">Hidayat T</div>			
		</blockquote>
	</div>		
</section>

{{-- 
<section id="subscribe">
	<div class="container">
		<div class="row">

			<div class="col-md-8 col-md-offset-2">
				<div class="row">

					<div class="col-md-6">

						<div class="title-element">
							<h2 class="section-title divider">Subscribe to our newsletter</h2>
						</div>

					</div>
					<div class="col-md-6">

						<div class="subscribe-content" data-aos="fade-up">
							<p>Sed eu feugiat amet, libero ipsum enim pharetra hac dolor sit amet, consectetur. Elit adipiscing enim pharetra hac.</p>
							<form id="form">
								<input type="text" name="email" placeholder="Enter your email addresss here">
								<button class="btn-subscribe">
									<span>send</span> 
									<i class="icon icon-send"></i>
								</button>
							</form>
						</div>

					</div>
					
				</div>
			</div>
			
		</div>
	</div>
</section> --}}

{{-- <section id="latest-blog">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div class="section-header align-center">
					<div class="title">
						<span>Read our articles</span>
					</div>
					<h2 class="section-title">Latest Articles</h2>
				</div>

				<div class="row">

					<div class="col-md-4">

						<article class="column" data-aos="fade-up">

							<figure>
								<a href="#" class="image-hvr-effect">
									<img src="images/post-img1.jpg" alt="post" class="post-image">			
								</a>
							</figure>

							<div class="post-item">	
								<div class="meta-date">Mar 30, 2021</div>			
								<h3><a href="#">Reading books always makes the moments happy</a></h3>

								<div class="links-element">
									<div class="categories">inspiration</div>
									<div class="social-links">
										<ul>
											<li>
												<a href="#"><i class="icon icon-facebook"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon icon-twitter"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon icon-behance-square"></i></a>
											</li>
										</ul>
									</div>
								</div><!--links-element-->

							</div>
						</article>
						
					</div>
					<div class="col-md-4">

						<article class="column" data-aos="fade-down">
							<figure>
								<a href="#" class="image-hvr-effect">
									<img src="images/post-img2.jpg" alt="post" class="post-image">
								</a>
							</figure>
							<div class="post-item">	
								<div class="meta-date">Mar 29, 2021</div>			
								<h3><a href="#">Reading books always makes the moments happy</a></h3>

								<div class="links-element">
									<div class="categories">inspiration</div>
									<div class="social-links">
										<ul>
											<li>
												<a href="#"><i class="icon icon-facebook"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon icon-twitter"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon icon-behance-square"></i></a>
											</li>
										</ul>
									</div>
								</div><!--links-element-->

							</div>
						</article>
						
					</div>
					<div class="col-md-4">

						<article class="column" data-aos="fade-up">
							<figure>
								<a href="#" class="image-hvr-effect">
									<img src="images/post-img3.jpg" alt="post" class="post-image">
								</a>
							</figure>
							<div class="post-item">		
								<div class="meta-date">Feb 27, 2021</div>			
								<h3><a href="#">Reading books always makes the moments happy</a></h3>

								<div class="links-element">
									<div class="categories">inspiration</div>
									<div class="social-links">
										<ul>
											<li>
												<a href="#"><i class="icon icon-facebook"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon icon-twitter"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon icon-behance-square"></i></a>
											</li>
										</ul>
									</div>
								</div><!--links-element-->

							</div>
						</article>
						
					</div>

				</div>

				<div class="row">

					<div class="btn-wrap align-center">
						<a href="#" class="btn btn-outline-accent btn-accent-arrow" tabindex="0">Read All Articles<i class="icon icon-ns-arrow-right"></i></a>
					</div>
				</div>

			</div>	
		</div>
	</div>
</section> --}}

{{-- <section id="download-app" class="leaf-pattern-overlay">
	<div class="corner-pattern-overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="row">

						<div class="col-md-5">
							<figure>
								<img src="images/device.png" alt="phone" class="single-image">
							</figure>
						</div>

						<div class="col-md-7">
							<div class="app-info">
								<h2 class="section-title divider">Download our app now !</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sagittis sed ptibus liberolectus nonet psryroin. Amet sed lorem posuere sit iaculis amet, ac urna. Adipiscing fames semper erat ac in suspendisse iaculis.</p>
								<div class="google-app">
									<img src="images/google-play.jpg" alt="google play">
									<img src="images/app-store.jpg" alt="app store">
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
</section> --}}
</x-public-layout>