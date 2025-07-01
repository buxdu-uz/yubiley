@extends('dashboard.layout.master')
@section('content')
    @error('error')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
    <form class="theme-form col-md-12" method="post" action="{{ route('manager.news.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h5>UZ</h5>
                    </div>
                    <form class="theme-form" method="post" action="{{ route('manager.news.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="uz[title]">Sarlavha</label>
                                <textarea class="form-control" id="uz[title]" name="uz[title]" rows="4" placeholder="Sarlavha kiriting">{{ old('uz.title') }}</textarea>
                                @error('uz.title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="uz[text]">Matn</label>
                                <textarea class="form-control" id="uz[text]" name="uz[text]" rows="10" placeholder="Matnni kiriting">{{ old('uz.text') }}</textarea>
                                @error('uz.text')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h5>RU</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="ru[title]">Заголовок</label>
                            <textarea class="form-control" id="ru[title]" name="ru[title]" rows="4" placeholder="Введите название">{{ old('ru.title') }}</textarea>
                            @error('ru.title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="ru[text]">Текст</label>
                            <textarea class="form-control" id="ru[text]" name="ru[text]" rows="10" placeholder="Введите текст">{{ old('ru.text') }}</textarea>
                            @error('ru.text')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h5>EN</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="en[title]">Title</label>
                            <textarea class="form-control" id="en[title]" name="en[title]" rows="4" placeholder="Enter title">{{ old('en.title') }}</textarea>
                            @error('en.title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="en[text]">Text</label>
                            <textarea class="form-control" id="en[text]" name="en[text]" rows="10" placeholder="Enter text">{{ old('en.text') }}</textarea>
                            @error('en.text')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center w-100">
                        <div class="mb-3" style="margin-right: 30px;">
                            <label class="col-form-label pt-0" for="file">Rasm</label>
                            <input class="form-control" id="file" name="file" type="file">
                            @error('file')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3" style="margin-right: 30px;">
                            <label class="col-form-label pt-0" for="date">Sana</label>
                            <input class="form-control" id="date" name="date" type="date" value="{{ old('date') }}" placeholder="DD.MM.YYYY">
                            @error('date')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="m-t-15 m-checkbox-inline custom-radio-ml">
                            <div class="form-check form-check-inline radio radio-primary">
                                <input class="form-check-input" id="type1" checked type="radio" name="type" value="news">
                                <label class="form-check-label mb-0" for="type1"><span class="digits"> Yangilik</span></label>
                            </div>
                            <div class="form-check form-check-inline radio radio-primary">
                                <input class="form-check-input" id="type2" type="radio" name="type" value="announcement">
                                <label class="form-check-label mb-0" for="type2"><span class="digits"> E`lon</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary w-100" type="submit">Saqlash</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
