@extends('dashboard.layout.master')
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5>Xodimlar ruyxati</h5>
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Xodim qo`shish</a>
            </div>
            <div class="table-responsive">
                <table class="table table-border-horizontal">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">FIO</th>
                        <th scope="col">Login</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Rollari</th>
                        <th scope="col">Yaratilgan vaqt</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->login }}</td>
                            <td>{{ $user->phone ?? 'Mavjud emas' }}</td>
                            <td>
                                @foreach($user->getRoleNames() as $role)
                                    <span class="badge badge-primary" style="font-size: 12px">{{ $role }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $user->created_at->format('d.m.Y H:i') }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
