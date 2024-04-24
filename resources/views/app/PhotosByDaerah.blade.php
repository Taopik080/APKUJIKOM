<x-app-layout>

    <div class="container" style="margin-top:50px;">
        <div class="text">
            <h1 class="text-start" style="font-weight: bolder">Gallery</h1>
            <p>The internet's source for visuals. <br>
                Powered by creators everywhere.</p>
            <div class="container text-center" style="margin-left: -10px">
                <div class="row row-cols-auto">
                    <p>Trending Tagline:</p>
                    @foreach ($photos as $item)
                    <div class="col"><p>#{{$item->tagline}}</p></div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="container text-center" style="margin-left: -10px">
            <div class="row row-cols-auto">
            @foreach ($daerah as $item)
                <div class="col">
                    <a href="{{ route('photos.by.daerah', ['daerah_id' => $item->id]) }}" class="btn btn-outline-secondary">{{ $item->nama_daerah }}</a>
                </div>   
                @endforeach
            </div>
        </div>
    </div>


    <div class="container" style="margin-top: 100px;">
    <div class="container text-start" style="margin-left: -10px">
        <div class="row row-cols-auto">
            @foreach ($photos as $photo)
            @if ($photo->image)
            <img src=>
            @else
            <span>No image found!</span>
            @endif

            <div class="col">
                <div class="card" style="width: 20rem; margin-top:10px">
                    <a href="{{ route('app.show', $photo->id)}}"> <img src="/image/{{ $photo->image }}" style="height: 300px; width:100%;" class="card-img-top"></a>
                    <div class="card-body">
                        <h5 class="card-title"> {{ $photo->nama }}</h5>
                        <h5 class="card-text"> {{ $photo->daerah->nama_daerah }}</h5>
                        <div class="deskripsi" style="overflow-y: auto; max-height: 50px;">
                            <p class="card-text"> {{ $photo->deskripsi }}</p>
                        </div>
                        <p class="card-text"> {{ $photo->created_at }}</p>
                        <a href="#" style="text-decoration: underline">
                            #{{ $photo->tagline }}</a>
                        @if($photo->user_id == Auth::user()->id)
                        <div class="row" style="padding: 10px;">
                            <div class="col">
                                <a href="{{ route('app.edit', $photo->id) }}" class="btn btn-outline-primary">Edit</a>
                            </div>
                            <div class="col">
                                <form action="{{ route('photouser.destroy', $photo->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">hapus</button>
                                </form>
                            </div>
                        </div>
                        @endif
                    </div>
                    @if(auth()->check())
                    @if(!$photo->isLikedBy(auth()->user()))
                    <p style="margin-left:220px">{{$photo->likes_count}} Likes</p>
                    <form action="{{ route('like', $photo->id) }}" method="POST">
                        @csrf
                        <button type="submit"><ion-icon style="font-size: 40px; margin-left:230px; margin-top:-100px;" name="heart-outline"></ion-icon></button>
                    </form>

                    @else
                    <p style="margin-left:220px">{{$photo->likes_count}} Likes</p>
                    <form action="{{ route('unlike', $photo->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><ion-icon style="font-size: 40px; margin-left:230px; margin-top:-100px;" name="heart"></ion-icon></button>
                    </form>
                    @endif
                    @endif

                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script>
</x-app-layout>