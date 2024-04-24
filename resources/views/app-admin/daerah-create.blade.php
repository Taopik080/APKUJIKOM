<x-app-layout>
    <div class="container" style="margin-top:50px; margin-left:-10px;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card" style="width: 700px;">
                    <div class="card-body">
                        <form class="w-px-500 p-3 p-md-3" action="{{ route('app-admin.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Nama Daerah</label>
                                <div class="col-sm-9">
                                    <input type="text" style="width: 80%;" class="form-control" name="nama_daerah"
                                        placeholder="nama daerah" @error('nama_daerah') is-invalid @enderror>
                                    @error('nama_daerah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button style="margin-top:-95px; margin-left:400px;" type="submit"
                                        class="btn btn-outline-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Daerah</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            @foreach ($daerah as $item)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->nama_daerah }}</td>
                                        <td>
                                            <form action="{{ route('app-admin.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    onclick="return confirm('Are you sure you want to delete this post?')"><ion-icon
                                                        name="trash" style="font-size:25px;"></ion-icon></button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                    {{ $daerah->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
