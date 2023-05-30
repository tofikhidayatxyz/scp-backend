<x-public-layout>
    <section class="padding-large">
        <div class="container">

            <ul class="tabs">
				<a class="tab @if(!request()->input('category')) active @endif "  href="{{ route('book') }}" style="text-decoration: none;" >
					All Genre
				</a>
				@foreach ($categories as $category)
				<a class="tab @if(request()->input('category') == $category->slug) active @endif "  href="{{ route('book', ['category' => $category->slug]) }}" style="text-decoration: none;" >
					{{ $category->name }}
				</a>
				@endforeach
			</ul>

            <div class="row">

                @foreach ($books as $book)
                <div class="col-md-4">
                   <a href="{{ route('book.detail', $book->id) }}" style="text-decoration:none">
                    <figure class="product-style">
                        <img src="{{ $book->s3_cover_url }}" alt="Books" class="product-item">
                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart">View detail</button>
                        <figcaption>
                            <h3>{{ $book->title }}</h3>
                            <p>{{ $book->author }}</p>
                        </figcaption>
                    </figure>
                   </a>
                </div>
                @endforeach

            </div>
        </div>
    </section>
</x-public-layout>