@extends('admin.admin_master')
@section('admin')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Edit Notification</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Notification</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="container">
                <div class="main-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <form method="post" action="{{ route('notification.update') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $notification->id }}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Title </h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="title" class="form-control" value="{{ $notification->title }} ">
                                                @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                             <div class="col-sm-3">
                                                 <h6 class="mb-0">Message </h6>
                                             </div>
                                             <div class="col-sm-9 text-secondary">
                                                  <textarea class="form-control" name="message"  id="message">{{ $notification->message }}</textarea>

                                                  @error('message')
                                                  <span class="text-danger">{{ $message }}</span>
                                                  @enderror
                                             </div>
                                         </div>
                                         <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Date </h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="datetime-local" name="date" class="form-control" value="{{ $notification->date }}">
                                                @error('date')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-8 text-secondary ">
                                                <input type="submit" class="btn btn-primary px-3" value="Update Nofitication">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
