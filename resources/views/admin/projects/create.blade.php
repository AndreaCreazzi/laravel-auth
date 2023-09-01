@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fs-4 text-secondary my-4">
                Progetti
            </h2>
            <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">Torna indietro</a>
        </div>
        <div class="row justify-content-center">
            <div class="card m-4 px-0">
                <div class="row">
                    <div class="col-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.projects.store') }}" method="POST" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title">Titolo</label>
                                    <input type="text"
                                        class="form-control @error('title') is-invalid @elseif(old('title')) is-valid @enderror"
                                        id="title" name="title" placeholder="Inserisci titolo"
                                        value="{{ old('title') }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="link">Git Hub</label>
                                    <input type="url"
                                        class="form-control @error('link') is-invalid @elseif(old('link')) is-valid @enderror"
                                        id="link" name="link" placeholder="Inserisci link"
                                        value="{{ old('link') }}" required>
                                    @error('link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="description">Descrizione</label>
                                    <textarea class="form-control @error('description') is-invalid @elseif(old('description')) is-valid @enderror"
                                        placeholder="Inserisci descrizione" id="description" name="description" style="height: 100px"
                                        value="{{ old('description') }}" required></textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-success" type="submit">Invia</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
