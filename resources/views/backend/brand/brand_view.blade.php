@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">E_Commerce</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add New Brand</li>
                        </ol>
                    </nav>
                </div>

            </div>

            <h5 class="card-title">Add New Brand</h5>
            <hr>
            <div class="form-body mt-4">

             


                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">

                                <div class="table-responsive">
                                    <table class="table align-middle mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>SL</th>
                                               
                                                <th>Brand Name </th>
                                                
                                                <th>Creation Date </th>
									   <th>Updated Date </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($i = 1)
                                            @foreach ($brands as $item)
                                                <tr>
                                                    <td>{{ $i++ }}</td>


                                                    <td>{{ $item->brand_name }}</td>
                                                    <td>{{ $item->created_at }}</td>
										  <td>{{ $item->updated_at }}</td>
                                                 


										
                                                    <td><a ><i title="edit"
                                                                class="fa fa-edit editbtn"  
                                                                style="font-size:22px;color:rgb(47, 26, 165);"></i> </a>
                                                        <a href="{{ route('brand.delete', $item->id) }}" id="delete"> <i
                                                                title="remove" class="fa fa-trash"
                                                                style="font-size:22px;color:rgb(241, 8, 39);"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                               
						<br>
						  {{ $brands->links() }}
                                </div>
						



                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="border border-3 p-4 rounded">
					
                                <div class="row g-3">

                                   
							<form method="post" action="{{ route('brand.store') }}">
								@csrf
                                        <div class="col-md-12">
                                            <label>Brand Name</label>
								   
                                            <input type="text" name="brand_name" class="form-control">
                                        </div>

								@error('brand_name')
								<span class="text-danger">{{ $message }}</span>
								@enderror


<br>
                                        <div class="col-6">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
							</form>
                                   
                                </div>
						
                            </div>
                        </div>
                    </div>
                    <!--end row-->


             


            </div>
        </div>
    </div>



    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content" dir="rtl">
	    <div class="modal-header">
		 <h5 class="modal-title" id="exampleModalLabel">اسم الصنف</h5>
	   
	    </div>
	    <div class="modal-body">
		 <form action="{{ route('brand.update') }}" method="POST"> 
		   @csrf
 
		   <input type="hidden" class="form-control" id="id" name="id">
 
		   <div class="mb-3">
			<label for="recipient-name" class="col-form-label">اسم الصنف</label>
			<input type="text" class="form-control" id="brand_name" name="brand_name">
		   </div>
		   
	    
	    </div>
	    <div class="modal-footer">
		 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
		 <button type="submit" class="btn btn-primary">تعديل</button>
	    </div>
	</form>
	  </div>
	</div>
   </div>
  
 
   <script>
	$(document).ready(function(){
	    $('.editbtn').on('click',function(){
		   $('#exampleModal').modal('show');
 
		   $tr=$(this).closest('tr');
 
	    var data=$tr.children("td").map(function(){
		   return $(this).text();
	    }).get();
 
	   
	    $('#id').val(data[0]);
	    $('#brand_name').val(data[1]);
 
 
			  });
		   });
 
 </script>








@endsection
