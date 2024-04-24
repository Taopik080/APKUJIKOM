<x-app-layout>
    <style>
        .container {
            margin-top: 100px;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Photo') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="card-body shadow p-3 mb-5 bg-body-tertiary rounded">
            <table class="table-responsive" style="width: 80%">
                <thead>
                    <th>No</th>
                    <th>Image</th>
                    <th>Nama</th>
                    <th>tagline</th>
                    <th>status</th>
                </thead>
                <tbody>
                    @foreach ($photos as $photo)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                @if ($photo->image)
                                    <img src="/image/{{ $photo->image }}" style="height: 50px;width:100px;">
                                @else
                                    <span>No image found!</span>
                                @endif
                            </td>
                            <td>{{ $photo->nama }}</td>
                            <td>{{ $photo->tagline }}</td>
                            <td>
                                @if ($photo->status == 'verifed')
                                    <p>{{ $photo->status }}</p>
                                @else
                                    <form action="{{ route('confirm.update', $photo->id) }}" method="POST">
                                        @method('put')
                                        @csrf
                                        <label class="text-center"></label>
                                        <select name="status"
                                            class="form-control @error('status') is-invalid @enderror text-center">
                                            <option value="">status : {{$photo->status}}</option>
                                            <option @selected(old('status') == 'verifed') value="verifed">verifed</option>
                                            <option @selected(old('status') == 'unverifed') value="unverifed">unverifed</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="button"  style="position: absolute; margin-left:400px; margin-top:-45px">
                                            <button class="btn btn-dark mt-2">Submit</button>
                                        </div>
                                      
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <center class="mt-5">
                {{ $photos->links() }}
            </center>
        </div>
    </div>

</x-app-layout>
