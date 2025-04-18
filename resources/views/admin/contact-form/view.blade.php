<!-- Extends template page-->
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <span>{{$feedback->name}}</span>
                </div>
            </div>
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <span>{{$feedback->email}}</span>
                </div>
            </div>
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Subject</label>
                <div class="col-sm-10">
                    <span>{{isset($feedback->subject) ? $feedback->subject : ''}}</span>
                </div>
            </div>
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Message</label>
                <div class="col-sm-10">
                    <span>{{isset($feedback->message) ? $feedback->message : ''}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection