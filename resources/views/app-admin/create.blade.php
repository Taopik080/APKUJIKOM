<x-app-layout>
    <div class="container" style="margin-top:50px;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form class="w-px-500 p-3 p-md-3" action="{{ route('app-admin.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="img" value="{{ old('img') }}" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" @error('img') is-invalid @enderror style="width: 70%;">
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-9" style="position: absolute; margin-top:-55px; margin-left:400px;">
                                        <button type="submit" class="btn btn-outline-secondary">Submit</button>
                                    </div>
                                </div>
                                <div class="mt-3"><img src="{{ old('img') ? asset(old('img')) : '' }}" id="output" style="width: 400px; margin-bottom:10px;"></div>
                                @error('img')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                        </form>
                    </div>
                    <div class="card-body">
                        <div class="row row-cols-auto">
                            @foreach ($img as $image)
                            @if ($image->img)
                            <img src=>
                            @else
                            <span>No image found!</span>
                            @endif
                            <div class="text-center mb-3">
                                {{$img->links()}}
                            </div>
                            <div class="text-center" style="width:100%">
                                <img src="/img/{{ $image->img }}" style="height: 100%; width:100%;" class="rounded">
                                <form action="{{route('upload.destroy', $image->id)}}" style="position:absolute; margin-top:-325px; margin-left:420px" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </div>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>