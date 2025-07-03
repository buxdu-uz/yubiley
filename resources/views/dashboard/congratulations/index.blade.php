@extends('dashboard.layout.master')
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5>Yangiliklar ruyxati</h5>
                @if(\Illuminate\Support\Facades\Auth::guard('person')->check())
                    <a href="{{ route('person.congratulations.create') }}" class="btn btn-primary">Tabrik yuborish</a>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table table-border-horizontal">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        @if(\Illuminate\Support\Facades\Auth::guard('web')->check())
                            <th scope="col">Kim tomonidan</th>
                        @endif
                        <th scope="col">Sarlavha</th>
                        <th scope="col">Matn</th>
                        <th scope="col">Holati</th>
                        <th scope="col">Yuborilgan sana</th>
                        @if(\Illuminate\Support\Facades\Auth::guard('web')->check())
                            <th scope="col">Harakat</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($congratulations as $congratulation)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            @if(\Illuminate\Support\Facades\Auth::guard('web')->check())
                                <th scope="col">{{ $congratulation->person->full_name }}</th>
                            @endif
                            <th scope="row">{{ $congratulation->title }}</th>
                            <th scope="row">{{ $congratulation->text }}</th>
                            <td>
                                @if($congratulation->status == 'pending')
                                    <span class="badge bg-warning">Jarayonda</span>
                                @elseif($congratulation->status == 'published')
                                    <span class="badge bg-success">Nashr etilgan</span>
                                @else
                                    <span class="badge bg-danger">Rad etilgan</span>
                                @endif
                            </td>
                            <td>
                                {{ $congratulation->created_at->format('d.m.Y H:i') }}
                            </td>
                            @if(\Illuminate\Support\Facades\Auth::guard('web')->check())
                                <td>
                                    <a class="btn btn-sm btn-success" href="{{ route('congratulations.show',$congratulation) }}"><i data-feather="eye"></i></a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $congratulations->links() }}
            </div>
        </div>
    </div>
@endsection
