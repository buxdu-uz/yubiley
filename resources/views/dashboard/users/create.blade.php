@extends('dashboard.layout.master')
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Xodim qo`shish</h5>
            </div>
            <form class="theme-form" method="post" action="{{ route('admin.users.store') }}">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="name">FIO</label>
                        <input class="form-control" id="name" name="name" type="text"
                               placeholder="Falonchayev faloncha">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="phone">Telefon raqam</label>
                        <input class="form-control" name="phone" id="phone" type="number" placeholder="998901234567">
                        @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="login">Login</label>
                        <input class="form-control" name="login" id="login" type="text" placeholder="Login">
                        @error('login')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="password">Parol</label>
                        <input class="form-control" id="password" name="password" type="password" placeholder="********">
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">Saqlash</button>
                </div>
            </form>
        </div>
    </div>
@endsection
