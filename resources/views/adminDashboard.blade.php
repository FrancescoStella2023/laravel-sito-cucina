@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="fs-4 text-primary my-4">
            <p class="fw-bold">
                Dashboard
            </p>
        </h2>
        <hr>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-dark">
                        <p class="fw-bold text-white">
                            User
                        </p>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>You are logged in!</p>

                        <a class="btn btn-outline-primary btn-lg" href="{{ route('profile.edit') }}">Profile</a>
                        <a class="btn btn-outline-primary btn-lg" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="card my-4">
                    <div class="card-header bg-dark">
                        <p class="fw-bold text-white">Visualizza Dati</p>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-outline-primary btn-lg" href="{{ route('recipes.index') }}">Ricette</a>
                        <a class="btn btn-outline-primary btn-lg" href="{{  route('authors.index') }}">Autori</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection