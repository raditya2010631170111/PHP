@extends('layouts.main')

@section('content')
    {{-- Banner --}}
    <section class="banner">
        <section id="Banner" class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                    </div>
                </div>
            </div>
        </section>
    </section>
    {{-- Banner End --}}
    <div class="container mt-5">
        {{-- Populer Game --}}
        <div class="popular">
            <h4 class="uppercase tracking-wider text-lg font-semibold" id="popular" style="color: #ffc300;">Popular Games
            </h4>
            <div class="row mt-3">
                @forelse ($populers as $now)
                    <div class="col-6 col-sm-6 col-md-3 col-lg-2 mb-5 p-2 ms-0">
                        <a href="{{ route('admin.show', ['game' => $now->name]) }}">
                            <div class="card me-5" style="width: fit-content; border:0; background-color:transparent;">
                                <a href="{{ route('admin.show', ['game' => $now->name]) }}">
                                    <img src="{{ asset('/assets/img/posterfilm/' . $now->poster) }}" alt="poster"
                                        class="hover:opacity-75 transition ease-in-out duration-150" id="box-shadow"
                                        style="width: 180px">
                                </a>
                                <div class="card-body p-0">
                                    <a href="#" style="text-decoration: none"
                                        class="mt-3 hover:text-gray-300 text-white"><strong>{{ $now->name }}</strong></a>
                                    <div class="flex items-center text-white mt-1" style="font-size: 14px">
                                        <span class="ml-1"><i class="bi bi-star-fill" style="color: yellow"></i>
                                            {{ $now->rating }}</span>
                                        <span class="mx-1">|</span>
                                        <span>{{ $now->release_date }}</span>
                                        <span class="mx-1">|</span>
                                        <span class="certification">{{ $now->rating_usia }}</span>
                                    </div>
                                    <div class="text-white" style="font-size: 14px">

                                        {{ $now->genre }}

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <h3>Game Tidak Ada</h3>
                @endforelse
            </div>
        </div>
        <!-- end pouplar-games -->
        {{-- Now Playing Game --}}
        <div class="popular">
            <h4 class="uppercase tracking-wider text-lg font-semibold" id="nowplaying" style="color: #ffc300;">Now Playing
            </h4>
            <div class="row mt-3">
                @forelse ($nows as $now)
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-5">
                        <a href="{{ route('film.show', ['game' => $now->name]) }}">
                            <div class="card me-5" style="width: fit-content; border:0; background-color:transparent;">
                                <a href="{{ route('film.show', ['game' => $now->name]) }}">
                                    <img src="{{ asset('/assets/img/posterfilm/' . $now->poster) }}" alt="poster"
                                        class="hover:opacity-75 transition ease-in-out duration-150" id="box-shadow"
                                        style="width: 180px">
                                </a>
                                <div class="card-body p-0">
                                    <a href="#" style="text-decoration: none"
                                        class="mt-3 hover:text-gray-300 text-white"><strong>{{ $now->name }}</strong></a>
                                    <div class="flex items-center text-white mt-1" style="font-size: 14px">
                                        <span class="ml-1"><i class="bi bi-star-fill" style="color: yellow"></i>
                                            {{ $now->rating }}</span>
                                        <span class="mx-1">|</span>
                                        <span>{{ $now->release_date }}</span>
                                        <span class="mx-1">|</span>
                                        <span class="certification">{{ $now->rating_usia }}</span>
                                    </div>
                                    <div class="text-white" style="font-size: 14px">

                                        {{ $now->genre }}

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <h3>Game Tidak Ada</h3>
                @endforelse
            </div>
        </div>
        <!-- end Now Playing games -->
        {{-- Comingsoon Game --}}
        <div class="popular">
            <h4 class="uppercase tracking-wider text-lg font-semibold" id="comingsoon" style="color: #ffc300;">Coming Soon
            </h4>
            <div class="row mt-3">
                @forelse ($comings as $game)
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-5">
                        <a href="{{ route('admin.show', ['game' => $game]) }}">
                            <div class="card me-5" style="width: fit-content; border:0; background-color:transparent;">
                                <a href="{{ route('admine.show', ['game' => $game->name]) }}">
                                    <img src="{{ asset('/assets/img/posterfilm/' . $game->poster) }}" alt="poster"
                                        class="hover:opacity-75 transition ease-in-out duration-150" id="box-shadow"
                                        style="width: 180px">
                                </a>
                                <div class="card-body p-0">
                                    <a href="#" style="text-decoration: none"
                                        class="mt-3 hover:text-gray-300 text-white"><strong>{{ $game->name }}</strong></a>
                                    <div class="flex items-center text-white mt-1" style="font-size: 14px">
                                        <span class="ml-1"><i class="bi bi-star-fill" style="color: yellow"></i>
                                            {{ $game->rating }}</span>
                                        <span class="mx-1">|</span>
                                        <span>{{ $game->release_date }}</span>
                                        <span class="mx-1">|</span>
                                        <span class="certification">{{ $game->rating_usia }}</span>
                                    </div>
                                    <div class="text-white" style="font-size: 14px">

                                        {{ $game->genre }}

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <h3>Game Tidak Ada</h3>
                @endforelse
            </div>
        </div>
        <!-- end Comingsoon-games -->
    </div>
@endsection
