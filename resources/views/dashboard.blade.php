<x-app-layout>
    <style>
        ion-icon {
            font-size: 100px;
        }
        .user {
            text-align: center;
            width: 150px;
            margin-top: 20px;
        }
        .user p {
            font-size: 30px;
            font-weight: bolder;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data user') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="user shadow-lg p-3 mb-5 bg-body rounded">
            <ion-icon name="person"></ion-icon>
            <p>{{ Auth::user()->count() }}</p>
            <h3>User Count</h3>
        </div>

    </div>
</x-app-layout>
