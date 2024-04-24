<x-app-layout>

    <style>
        .enlarged {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            cursor: zoom-out;
            transition: all 0.3s ease;
        }
    </style>

   
    <div class="container" style="margin-top: 100px;">
        <div class="container text-start" style="margin-left: -10px">
            <div class="container">
                @foreach ($photos as $photo)
                @if ($photo->image)
                <img src=>
                @else
                <span>No image found!</span>
                @endif
                <div class="row" style="margin-left:50px;">
                    <div class="col">
                        <div class="card mb-3">
                            <div class="card" style="width: 100%;">
                                <img src="/image/{{ $photo->image }}" style="height: 100%; width:100%;" class="card-img-top" onclick="toggleImageSize(this)">
                            </div>
                            <div class="card-body" style="background-color: rgba(240, 220, 220, 0.267); position:absolute; bottom:0px; width:100%; font-weight:bolder; color:white ">
                                <h5 class="card-title">{{ $photo->nama }}</h5>
                                <p class="card-text">{{ $photo->deskripsi }}</p>
                                <p class="card-text"><small>{{ $photo->created_at }}</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 500px; height:325px">
                            <div class="card-body">
                                <h5 class="card-title text-center">komentar</h5>
                                <div class="isikomentar" style="position: absolute;">
                                    @foreach ($comment as $item)
                                    <div class="container overflow-auto" style="margin-bottom: 10px;">
                                        <div class="row">
                                            <div class="col">
                                                {{ $item->user->name }}:
                                            </div>
                                            <div class="col-6" style="width: 300px;">
                                                {{ $item->comment }}
                                            </div>
                                            <div class="col-4" style="position: absolute; margin-top:-1px; margin-left:350px;">
                                            {{ $item->created_at->format('H:i') }}
                                            </div>
                                            @if ($item->user_id == Auth::user()->id)
                                            <div class="col">
                                                <form action="{{ route('comment.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Are you sure you want to delete this post?')">
                                                        <ion-icon name="trash" style="font-size:30px; position:absolute; margin-left:50px; margin-top:-20px;"></ion-icon>
                                                    </button>
                                                </form>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="komentar" style="width: 460px; margin-top:300px; position:absolute;">
                                    <form action="{{ route('comment.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="photo_id" value="{{ $photo->id }}">
                                        <input type="text" name="comment" class="form-control" placeholder="isi komentar">
                                        <button type="submit" class="btn btn-primary" style="width: 100%; margin-top:3px;">Submit</button>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
    @endforeach
    <script>
        function toggleImageSize(img) {
            if (img.classList.contains('enlarged')) {
                img.classList.remove('enlarged');
            } else {
                img.classList.add('enlarged');
            }
        }
    </script>
</x-app-layout>