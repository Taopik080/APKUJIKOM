<x-app-layout>
    <div class="container" style="margin-top:50px;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form class="w-px-500 p-3 p-md-3" action="{{ route('app.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Image :</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="image"
                                        value="{{ old('image') }}" accept="image/*"
                                        onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"
                                        @error('image') is-invalid @enderror>
                                </div>
                                <div class="mt-3"><img src="{{ old('image') ? asset(old('image')) : '' }}"
                                        id="output" style="width: 400px; margin-bottom:10px; margin-left:50px;"></div>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-9">
                                    <input hidden type="text" class="form-control" value="{{ Auth::user()->id }}"
                                        name="user_id" placeholder="user_id" @error('user_id') is-invalid @enderror>
                                    @error('user_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Daerah :</label>
                                <div class="col-sm-9">
                                    <select name="daerah_id" id="daerah_id" class="form-control">
                                        <option value="">-- Select --</option>
                                        @foreach ($daerah as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_daerah }}</option>
                                        @endforeach
                                    </select>
                                    @error('daerah_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama"
                                        value="{{ Auth::user()->name }}" hidden placeholder="nama"
                                        @error('nama') is-invalid @enderror>
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Deskripsi :</label>
                                <div class="col-sm-9">
                                    <textarea name="deskripsi" id="deskripsi" cols="39" rows="8"></textarea>
                                    @error('deskripsi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Tagline :</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tagline" placeholder="tagline"
                                        @error('tagline') is-invalid @enderror>
                                    @error('tagline')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-outline-secondary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
