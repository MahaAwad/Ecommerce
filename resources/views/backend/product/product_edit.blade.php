@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">eCommerce</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">edit Product</li>
			</ol>
		</nav>
	</div>

</div>

<h5 class="card-title">Add New Product</h5>
	  <hr>
       <div class="form-body mt-4">

          <form method="post" action="{{ route('product.update') }}" enctype="multipart/form-data">
               @csrf

               <input type="hidden" name="id" class="form-control" id="inputProductTitle" value="{{ $product->id }}">
                  <div class="row">
                      <div class="col-lg-8">
                    <div class="border border-3 p-4 rounded">
                        <div class="mb-3">
                             <label for="inputProductTitle" class="form-label">Product Title</label>
                             <input type="text" name="title" class="form-control" id="inputProductTitle" value="{{ $product->title }}">
                          </div>
                          <div class="mb-3">
                             <label for="inputProductTitle" class="form-label">Product Code</label>
                             <input type="text" name="product_code" class="form-control" id="inputProductTitle" value="{{ $product->product_code }}">
                          </div>
         <div class="mb-3">
          <label for="formFile" class="form-label">Product Thumbnail </label>
               <input class="form-control" name="image" type="file" id="image">
               </div>

               <div class="mb-3">
                    <img id="showImage" src="{{ asset($product->image )   }}" style="width:100px; height: 100px;" >
               </div>
               @foreach($details as $item)
               <div class="mb-3">
          <label for="formFile" class="form-label">Image One</label>
               <input class="form-control" name="image_one" type="file" value="{{  $item->image_one}}" >
               </div>
                     <div class="mb-3">
          <label for="formFile" class="form-label">Image Two</label>
               <input class="form-control" name="image_two" type="file" value="{{  $item->image_two }}" >
               </div>
                     <div class="mb-3">
          <label for="formFile" class="form-label">Image Three</label>
               <input class="form-control" name="image_three" type="file" value="{{ $item->image_three }}" >
               </div>
                     <div class="mb-3">
          <label for="formFile" class="form-label">Image Four</label>
               <input class="form-control" name="image_four" type="file"  value="{{$item->image_four }}"  >
               </div>

@endforeach


               @foreach($details as $item)
  <div class="mb-3">
	<label for="inputProductDescription" class="form-label">Short Description</label>
     <textarea name="short_description" class="form-control" id="inputProductDescription" rows="3">
		{{ $item->short_description }}
	</textarea>
  </div>

  <div class="mb-3">
	<label for="inputProductDescription" class="form-label">Long Description</label>
     <textarea name="long_description" class="form-control" id="inputProductDescription" rows="3">
          {{ $item->long_description }}
	</textarea>
  </div>

  @endforeach


            </div>
		   </div>

             <div class="col-lg-4">
               <div class="border border-3 p-4 rounded">
                 <div class="row g-3">
                    <div class="col-md-6">
                         <label for="inputPrice" class="form-label">Price</label>
                         <input type="text" name="price" class="form-control" id="inputPrice" value="{{ $product->price }}">
                      </div>
                      <div class="col-md-6">
                         <label for="inputCompareatprice" class="form-label">Special Price</label>
                         <input type="text" name="special_price" class="form-control" id="inputCompareatprice" value="{{ $product->special_price }}">
                      </div>

                      <div class="col-12">
                         <label for="inputCollection" class="form-label">Brand </label>
                         <select name="brand" class="form-select" id="inputProductType">

                              <option selected="" disabled="" >Select Category</option>
                                @foreach($brand as $item)
                                <option value="{{ $item->brand_name }}"
                                      @if($product->brand ==  $item->brand_name)
                                          selected
                                      @endif
                                    > {{ $item->brand_name }}</option>
                                 @endforeach
                                  </select>
                      </div>

                      <div class="col-12">
                         <label for="inputProductType" class="form-label">Product Category</label>
                         <select name="category" class="form-select" id="inputProductType">

                       <option selected="" disabled="" >Select Category</option>
                         @foreach($category as $item)
                         <option value="{{ $item->category_name }}"
                            @if($product->category ==  $item->category_name)
                                          selected
                                      @endif
                            > {{ $item->category_name }}</option>
                          @endforeach
                           </select>
                      </div>

                       <div class="col-12">
                         <label for="inputProductType" class="form-label">Product SubCategory</label>
                         <select name="subcategory" class="form-select" id="inputProductType">

                       <option disabled="" selected="">Select SubCategory</option>
                         @foreach ($subcategory as $item )
                            @if($item->category_name == $product->category)
                            <option value="{{ $item->id }}"
                                @if($item->id == $product->subcategory )
                                              selected
                                          @endif
                                > {{ $item->subcategory_name }}</option>
                            @endif
                         @endforeach
                           </select>
                      </div>





            @foreach($details as $item)
            <div class="mb-3">
            <label class="form-label">Product Size</label>

             <input type="text" name="size" class="form-control visually-hidden" data-role="tagsinput" value="{{ $item->size }}">

            </div>


            <div class="mb-3">
            <label class="form-label">Product Color</label>

             <input type="text" name="color" class="form-control visually-hidden" data-role="tagsinput" value="{{ $item->color }}">

            </div>

       @endforeach


       <div class="form-check">
          <input class="form-check-input" name="remark" type="radio" value="FEATURED" id="flexCheckDefault1" {{ $product->remark == 'FEATURED' ? 'checked' : '' }} >
          <label class="form-check-label" for="flexCheckDefault1">FEATURED</label>
          </div>
          <div class="form-check">
          <input class="form-check-input" name="remark" type="radio" value="NEW" id="flexCheckDefault2" {{ $product->remark == 'NEW' ? 'checked' : '' }}>
          <label class="form-check-label" for="flexCheckDefault2">NEW</label>
          </div>
          <div class="form-check">
          <input class="form-check-input" name="remark" type="radio" value="COLLECTION" id="flexCheckDefault3" {{ $product->remark == 'COLLECTION' ? 'checked' : '' }}>
          <label class="form-check-label" for="flexCheckDefault3">COLLECTION</label>
          </div>

           <div class="col-12">
                <div class="d-grid">

                 <button type="submit" class="btn btn-primary">Update Product</button>
                </div>
           </div>
      </div>
                </div>
                </div>
                                </div><!--end row-->


                              </form>


                              </div>
                           </div>
                      </div>






                      <script type="text/javascript">
                         $(document).ready(function() {
                         $('select[name="category"]').on('change', function(){

                              var category_id = $(this).val();

                              if(category_id) {
                                   $.ajax({
                                        url: "{{ url('/subcategory/ajax') }}/"+category_id,
                                        type:"GET",
                                        dataType:"json",
                                        success:function(data) {
                                             var d =$('select[name="subcategory"]').empty();
                                                  $.each(data, function(key, value){
                                                       $('select[name="subcategory"]').
                                                       append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');
                                                  });
                                        },
                                   });
                              } else {
                                   alert('danger');
                              }
                         });
                         });
                              </script>





@endsection
