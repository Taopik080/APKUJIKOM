<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gallery Photo</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
    .background-blur {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        background-image: url('image/bg1.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        filter: blur(5px);
    }

   

    .overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        opacity: 0;
        background-color: rgba(0, 0, 0, 0.5);
        /* Warna latar belakang overlay */
        transition: opacity 0.5s;
    }

    #image-container:hover .overlay {
        opacity: 1;
    }

    .text {
        color: white;
        /* Warna teks */
        font-size: 20px;
        /* Ukuran teks */
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }
</style>

<body class="antialiased">
    <nav class="navbar navbar-expand-lg bg-body-tertiary"
        style="position: absolute; margin-top:-100px; margin-left:550px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ Route('app.index') }}">Homepage</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ Route('app.index') }}">Homepage</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ Route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endauth
                    @endif
                @endif
            </ul>
        </div>
    </nav>
    <div class="">
        <div class="container">
            <div class="text-center" style="margin-top: 150px;">
                <h3>Gallery Photo</h3>
                <p>Ayo upload foto mu di website ini bertemakan Rumah adat daerah mu</p>
            </div>
        </div>

        <div class="container" style="margin-top: 100px; background-color:#c7c8ccbb; border-radius:10px">
            <div class="container text-start" style="margin-left: -10px">
                <div class="row row-cols-auto">
                    @foreach ($photos as $photo)
                        @if ($photo->image)
                            <img src=>
                        @else
                            <span>No image found!</span>
                        @endif

                        <div class="col">
                            <div class="card" style="width: 20rem; margin-top:20px; opacity:100%;"
                                id="image-container">
                                <a href="{{ route('app.show', $photo->id) }}"> <img src="/image/{{ $photo->image }}"
                                        style="height: 300px; width:100%;" class="card-img-top"></a>
                                <div class="overlay">
                                    <div class="text">Login untuk detail foto</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <div class="background-blur">
    </div>
</body>

</html>
