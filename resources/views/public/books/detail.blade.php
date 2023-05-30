<x-public-layout>
    
    <section class="bg-sand padding-large">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <a href="#" class="product-image"><img src="{{ $book->s3_cover_url }}"></a>
                </div>

                <div class="col-md-6 pl-5">
                    <div class="product-detail">
                        <h1>{{ $book->title }}</h1>
                        <p>{{ $book->category->name }}</p>
                        {{-- <span class="price colored">$45.00</span> --}}

                        <p>
                           {{ $book->description }}
                        </p>
                      
                        <div class="d-flex">
                            <a type="submit" href={{ $book->s3_pdf_url }} target="_blank" name="add-to-cart"  class="btn button">Download full PDF</a>
                        </div>
                    </div>
                </div>
                

            </div>
            <div class="w-100">
                <ul class="tabs">
                    <a class="tab @if(!request()->input('tab')) active @endif "  href="{{ route('book.detail', $book->id) }}" style="text-decoration: none;" >
                        Summary
                    </a>
                    <a class="tab @if(request()->input('tab') == 'audio') active @endif "  href="{{ route('book.detail', ['slug' => $book->id, 'tab' => 'audio']) }}" style="text-decoration: none;" >
                        Audio
                    </a>
                </ul>
                <div class="w-100 mt-5">
                   @if(!request()->input('tab')) 
                   <div class="player d-flex " style="display: flex; padding-top: 20; padding-bottom:20px; align-items:center;">
                        <button class="btn btn-outline-primary play" style="height:70px; width:70px; padding:0; border-radius:100%; display:flex; align-items:center; justify-content:center;">
                            <i class='bx bx-play' style="font-size: 40px"></i>
                        </button>
                        <div style="width: 100%; padding-left: 20px">
                            <div class="suffer" id="audio-summary">
                            
                            </div>
                        </div>
                    </div>
                    <p>{!! $book->summary !!}</p>
                   @endif
                   @if(request()->input('tab') == 'audio')
                        <div class="w-100">
                            @foreach ($audios as $audio)
                           <div>
                                <h4>Page {{ $audio->audio_id }}</h4>
                                <div class="player d-flex " style="display: flex; padding-top: 20; padding-bottom:20px; align-items:center;">
                                    <button class="btn btn-outline-primary play" style="height:70px; width:70px; padding:0; border-radius:100%; display:flex; align-items:center; justify-content:center;">
                                        <i class='bx bx-play' style="font-size: 40px"></i>
                                    </button>
                                    <div style="width: 100%; padding-left: 20px">
                                        <div class="suffer" id="audio-{{ $audio->id }}">
                                        
                                        </div>
                                    </div>
                                </div>
                           </div>
                            @endforeach
                        </div>
                        <div class="w-100 d-flex justify-content-center">
                            {{ $audios->links('vendor.pagination.bootstrap')  }}
                        </div>
                   @endif 
                </div>
            </div>
            <div class="w-100 mt-5 d-block">
                <div class="section-header align-center">
                    <h2 class="section-title">Similar Books</h2>
                </div>
    
                
                <div class="row">
                    @foreach ($relatedBooks as $bookI)
                    <div class="col-md-4">
                       <a href="{{ route('book.detail', $bookI->id) }}" style="text-decoration:none">
                        <figure class="product-style">
                            <img src="{{ $bookI->s3_cover_url }}" alt="Books" class="product-item">
                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart">View detail</button>
                            <figcaption>
                                <h3>{{ $bookI->title }}</h3>
                                <p>{{ $bookI->author }}</p>
                            </figcaption>
                        </figure>
                       </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.4/wavesurfer.min.js"></script>

    
    @if(request()->input('tab') == 'audio')
    <script>

        let curentPlay = null

       @foreach ($audios as $audio)
            let container{{ $audio->id }} = document.querySelector('#audio-{{ $audio->id }}')
            let wavesurfer{{ $audio->id }} = WaveSurfer.create({
                container: container{{ $audio->id }},
                waveColor: '#C5A992',
                progressColor: 'rgba(0,0,0,.8)',
            });

            let playButton{{ $audio->id }} = container{{ $audio->id }}.closest('.player').querySelector('.play')

           try {
            playButton{{ $audio->id }}.onclick = () => {
                    curentPlay = '{{ $audio->id }}'
                    document.dispatchEvent(new Event('audioPlay'))
                    wavesurfer{{ $audio->id }}.playPause()
            }
           } catch(e) {}
            wavesurfer{{ $audio->id }}.load('{{ $audio->s3_url }}')

            document.addEventListener('audioPlay', (e) => {
                setTimeout(() => {
                    if(curentPlay != '{{ $audio->id }}') {
                        wavesurfer{{ $audio->id }}.pause()
                    }
                }, 10);
            })

            // Space
            // document.addEventListener('keydown', (e) => {
            //     if (e.code == 'Space') {
            //         e.preventDefault()
            //         wavesurfer{{ $audio->id }}.playPause()
            //     }
            // })


            // wavesurfer{{ $audio->id }}.once('interaction', () => {
            //     wavesurfer{{ $audio->id }}.playPause()
            // })


       @endforeach
    </script>
    @endif

    @if(!request()->input('tab'))
        <script>
            let container = document.querySelector('#audio-summary')
            let wavesurfer = WaveSurfer.create({
                container: container,
                waveColor: '#C5A992',
                progressColor: 'rgba(0,0,0,.8)',
            });

            let playButton = container.closest('.player').querySelector('.play')

            playButton.onclick = () => {
                    document.dispatchEvent(new Event('audioPlay'))
                    wavesurfer.playPause()
            }
            wavesurfer.load("{{ env('S3_CDN_URL').'/'.$book->id.'/audios/summary.mp3' }}")
        </script>
    @endif
</x-public-layout>