@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Site Info Update</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href=""><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Site Info Update</li>
                        </ol>
                    </nav>
                </div>






            </div>



            <!--end breadcrumb-->
            <div class="container">
                <div class="main-body">
                    <div class="row">

                        <div class="col-lg-12">



                         <form method="post" action="{{ route('update.siteinfo') }}" > 
                                @csrf

                                <input type="hidden" name="id" value="{{ $siteinfo->id }}">


                                <div class="card">
                                    <div class="card-body">

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">About </h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <textarea id="mytextarea" name="about"> {{ $siteinfo->about }} </textarea>
                                            </div>
                                        </div>



                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Address </h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <textarea id="mytextarea4"
                                                    name="address"> {{ $siteinfo->address }} </textarea>
                                            </div>
                                        </div>





                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">facbook_link </h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="facebook_link" class="form-control"
                                                    value="{{ $siteinfo->facebook_link }}">
                                            </div>
                                        </div>



                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0"> twitter_link </h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="twitter_link" class="form-control"
                                                    value="{{ $siteinfo->twitter_link }}">
                                            </div>
                                        </div>



                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">instagram_link </h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="instegram_link" class="form-control"
                                                    value="{{ $siteinfo->instegram_link }}">
                                            </div>
                                        </div>



                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">copyright_text </h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="copyright" class="form-control"
                                                    value="{{ $siteinfo->copyright }}">
                                            </div>
                                        </div>







                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="submit" class="btn btn-primary px-4" value="Update SiteInfo">
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


    <script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js'
        referrerpolicy="origin">
    </script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>

    <script>
        tinymce.init({
            selector: '#mytextarea1'
        });
    </script>

    <script>
        tinymce.init({
            selector: '#mytextarea2'
        });
    </script>

    <script>
        tinymce.init({
            selector: '#mytextarea3'
        });
    </script>

    <script>
        tinymce.init({
            selector: '#mytextarea4'
        });
    </script>
@endsection
