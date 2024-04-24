<x-app-layout>

    <div class="container" style="margin-top:50px;">
        <div class="text">
            <h1 class="text-start" style="font-weight: bolder">Gallery</h1>
            <p>The internet's source for visuals. <br>
                Powered by creators everywhere.</p>
            <div class="container text-center" style="margin-left: -10px">
                <div class="row row-cols-auto">
                    <p>Foto yang anda upload :</p>
                </div>
            </div>
        </div>
    </div>


    <div class="container" style="margin-top: 50px;">
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
                            <a href="{{ route('app.show', $photo->id) }}"> <img src="/image/{{ $photo->image }}"
                                    style="height: 300px; width:100%;" class="card-img-top"></a>
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
                                <a href="#" style="text-decoration: underline">
                                    #{{ $photo->tagline }}</a>
                                @if ($photo->user_id == Auth::user()->id)
                                    <div class="dropdown" style="position: absolute; margin-top:-40px; margin-left:190px;">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Settings
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="{{ route('app.edit', $photo->id) }}">Edit</a></li>
                                            <li>
                                                <form action="{{ route('photouser.destroy', $photo->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item">hapus</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                                
                       
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
