@extends('dashboard.layout.master')
@section('content')
    <div class="col-xxl-6 col-lg-6 box-col-6">
        <div class="card">
            <div class="card-header py-4">
                <h5>{{ $congratulation->person->full_name }}</h5>
            </div>
            <div class="card-body">
                <div>
                    <span class="badge bg-success w-100 mb-3" style="font-size: 12px">Sarlavha</span>
                    <h4>{{ $congratulation->title }}</h4>
                </div>
                <hr>
                <div>
                    <span class="badge bg-primary w-100 mb-3" style="font-size: 12px">Matn</span>
                    <p>{{ $congratulation->text }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xxl-6 col-lg-6 box-col-6">
        <div class="card">
            <div class="card-header py-4">
                <h5>Qo'shimcha malumotlari</h5>
            </div>
            <div class="card-body d-flex align-items-center justify-content-start">
                <div style="margin-right: 20px; border-right: 1px solid">
                    <span class="badge bg-success mb-3" style="font-size: 12px">Sana</span>
                    <h6 style="padding-right: 15px;">{{ $congratulation->created_at }}</h6>
                </div>
                <div style="margin-right: 20px; border-right: 1px solid">
                    <span class="badge bg-primary mb-3" style="font-size: 12px">Holati</span>
                    @if($congratulation->status == 'pending')
                        <h6 style="padding-right: 15px;" class="text-warning">Jarayonda</h6>
                    @elseif($congratulation->status == 'published')
                        <h6 style="padding-right: 15px;" class="text-success">Nashr etilgan</h6>
                    @else
                        <h6 style="padding-right: 15px;" class="text-danger">Rad etilgan</h6>
                    @endif
                </div>
{{--                <div>--}}
{{--                    <span class="badge bg-info mb-3" style="font-size: 12px; margin-right: 20px">Rasm</span>--}}
{{--                    <img style="border: 1px dotted" src="{{ asset('storage/files/announcements/'.$announcement->files()->first()->filename) }}" alt="rasm">--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
@endsection
