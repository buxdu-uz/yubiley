@extends('dashboard.layout.master')
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5>Yangiliklar ruyxati</h5>
                <a href="{{ route('manager.news.create') }}" class="btn btn-primary">Yangilik qo`shish</a>
            </div>
            <div class="table-responsive">
                <table class="table table-border-horizontal">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Turi</th>
                        <th scope="col">Sana</th>
                        <th scope="col">Yaratilgan vaqt</th>
                        <th scope="col">Harakatlar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($announcements as $announcement)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $announcement->type == 'news' ? 'Yangilik' : 'E`lon' }}</td>
                            <td>{{ $announcement->date }}</td>
                            <td>
                                {{ $announcement->created_at->format('d.m.Y H:i') }}
                            </td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ route('manager.news.show',$announcement) }}"><i data-feather="eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $announcements->links() }}
            </div>
        </div>
    </div>
@endsection
