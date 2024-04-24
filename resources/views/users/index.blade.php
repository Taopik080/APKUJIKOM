<x-app-layout>
    <style>
        .container {
            margin-top: 100px;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data user registrasi') }}
        </h2>
    </x-slot>

    <div class="container shadow-lg p-3 mb-5 bg-body rounded">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @if (isset($users))
                    @foreach ($users as $index => $usr)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $usr->name }}</td>
                            <td>{{ $usr->email }}</td>
                            <td>
                                <a href="" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>
