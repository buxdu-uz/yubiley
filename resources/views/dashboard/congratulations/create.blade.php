@extends('dashboard.layout.master')
@section('content')
    @error('error')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
    <div class="col-sm-12">
        <form class="theme-form" method="post" action="{{ route('person.congratulations.store') }}">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h5>Tabrik yo'llash</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="title">Tabrik sarlavhasi</label>
                        <textarea class="form-control" id="title" name="title" rows="4"
                                  placeholder="Sarlavha kiriting">{{ old('title') }}</textarea>
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="text">Tabrik matni</label>
                        <textarea class="form-control" id="text" name="text" rows="10"
                                  placeholder="Matnni kiriting">{{ old('text') }}</textarea>
                        @error('text')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary w-100" type="submit">Yuborish</button>
                </div>
            </div>
        </form>
    </div>
@endsection
