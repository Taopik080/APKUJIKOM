<x-app-layout>
<div class="container" style="margin-top: 40px; width:100px; position:absolute; margin-left:900px; margin-top:-50px">
        <div class="container text-start" style="margin-left: 50px">
            <div class="row row-cols-auto">
                @foreach ($imgadmin as $image)
                <div class="col">
                    <div class="card" style="width: 20rem; margin-top:10px">
                        <img src="/img/{{ $image->img }}" style="height: 240px; width:100%; border-radius:8px;" class="card-img-top">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:50px;">
        <div class="text">
            <h1 class="text-start" style="font-weight: bolder">Gallery</h1>
        </div>
        <p>The internet's source for visuals. <br>
            Powered by creators everywhere.</p>
        <div class="container text-center" style="margin-left: -10px">
            <div class="row row-cols-auto">
                <p>Trending Tagline:</p>
                @foreach ($photos as $item)
                <div class="col">
                    <p>#{{$item->tagline}}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container text-center" style="margin-left: 100px;">
        <div class="row row-cols-auto">
            @foreach ($daerah as $item)
            <div class="col">
                <a href="{{ route('photos.by.daerah', ['daerah_id' => $item->id]) }}" class="btn btn-outline-secondary">{{ $item->nama_daerah }}</a>
            </div>
            @endforeach
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
                        <a href="{{ route('app.show', $photo->id) }}"> <img src="/image/{{ $photo->image }}" style="height: 300px; width:100%;" class="card-img-top"></a>
                            @if ($photo->status == 'verifed')
                                <button class="btn btn-success">verifed</button>
                            @else
                                <button class="btn btn-danger">unverifed</button>
                            @endif
                        <div class="card-body">
                            <p class="card-title">Nama Uploader : {{ $photo->nama }}</p>
                            <p class="card-text">Daerah : {{ $photo->daerah->nama_daerah }}</p>
                            <div class="deskripsi" style="overflow-y: auto; max-height: 50px;">
                                <p class="card-text">{{ $photo->deskripsi }}</p>
                            </div>
                            <p class="card-text">Tanggal di upload :{{ $photo->created_at }}</p>
                            <p style=" color:blue;text-decoration: underline">
                                #{{ $photo->tagline }}</p>
                            @if ($photo->user_id == Auth::user()->id)
                            <div class="dropdown" style="position: absolute; margin-top:-40px; margin-left:190px;">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Settings
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('app.edit', $photo->id) }}">Edit</a></li>
                                    <li>
                                        <form action="{{ route('photouser.destroy', $photo->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item">hapus</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            @endif
                            
                            <div class="countcomen" style="position: absolute;">
                            <p>{{$commentCount}} Komentar</p>
                            </div>
                            <div class="comment" style="position:absolute; margin-top:20px;">
                            
                            <a href="{{ route('app.show', $photo->id) }}" style="color:black; font-size:30px"><ion-icon name="chatbubble-outline"></ion-icon></a>
                            </div>
                            @if(auth()->check())
                            @if(!$photo->isLikedBy(auth()->user()))
                            <p style="margin-left:220px">{{$photo->likes_count}} Likes</p>
                            <form action="{{ route('like', $photo->id) }}" method="POST">
                                @csrf
                                <button type="submit"><ion-icon style="font-size: 30px; margin-left:230px; margin-top:-100px;" name="heart-outline"></ion-icon></button>
                            </form>

                            @else
                            <p style="margin-left:220px">{{$photo->likes_count}} Likes</p>
                            <form action="{{ route('unlike', $photo->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><ion-icon style="font-size: 30px; margin-left:230px; margin-top:-100px;" name="heart"></ion-icon></button>
                            </form>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>