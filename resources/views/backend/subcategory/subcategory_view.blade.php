@extends('admin.admin_master')
@section('admin')


<div class="page-wrapper">
			<div class="page-content">



<div class="card radius-10">
						<div class="card-body">
							<div class="d-flex align-items-center">
	<div>
		<h5 class="mb-0">All SubCategory </h5>
	</div>
	<div class="font-22 ms-auto"><a href="{{ route('add.subcategory') }}"><i title="add" class="fa fa-plus-square-o" style="font-size:22px;color:green;"> add</i> </a>
	</div>
</div>
<hr>
<div class="table-responsive">
	<table class="table align-middle mb-0">
		<thead class="table-light">
			<tr>
				<th>SL</th>
				<th>Category Name </th>
				<th>SubCategory Name </th>				 
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@php($i = 1)
			@foreach($subcategory as $item)
			<tr>
				<td>{{ $i++ }}</td>
		 <td>{{ $item->category_name }}</td> 
		 <td>{{ $item->subcategory_name }}</td>		 

				

				<td><a href="{{ route('subcategory.edit',$item->id) }}"><i title="edit" class="fa fa-edit" style="font-size:22px;color:rgb(47, 26, 165);"></i> </a>	
					<a href="{{route('subcategory.delete',$item->id) }}" id="delete" > <i title="remove" class="fa fa-trash" style="font-size:22px;color:rgb(241, 8, 39);"></i></a>
				 </td>


			</tr>
			@endforeach

		</tbody>
	</table>
</div>
						</div>
					</div>




			</div>
		</div>

@endsection