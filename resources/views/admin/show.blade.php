@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            Progetto
        </h2>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a class="text-decoration-none text-dark" href="{{ $projects->link }}">{{ $projects->link }}</a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $projects->title }}</h5>
                        <p class="card-text">{{ $projects->description }}</p>
                        <a href="{{ route('admin.admin.index') }}" class="btn btn-primary">Torna indietro</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
