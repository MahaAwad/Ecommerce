<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Date;


	

class BrandController extends Controller
{
    public function BrandView(){

    	$brands = Brand::latest()->paginate(6);
  	return view('backend.brand.brand_view',compact('brands'));

    }


    public function BrandStore(Request $request){

    	$request->validate([
    		'brand_name' => 'required|unique:brands',
		   
    	
    	]);

    
	    
	Brand::insert([
		'brand_name' => $request->brand_name,
		'created_at' => Date::now(),
	
    	]);
		
	    $notification = array(
			'message' => ' Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 



public function BrandEdit($id){
	$brand = Brand::findOrFail($id);
	return view('backend.brand.brand_edit',compact('brand'));

}

 
    public function BrandUpdate(Request $request){
    	
    	$brand_id = $request->id;
    

    

	Brand::findOrFail($brand_id)->update([
		'brand_name' => $request->brand_name,
		

    	]);

	    $notification = array(
			'message' => 'Brand Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('all.brand')->with($notification);

    	} //end id
	    
	  




    public function BrandDelete($id){

   
  

    	Brand::findOrFail($id)->delete(); //

    	 $notification = array(
			'message' => 'Brand Deleted Successfully',
			'alert-type' => 'danger'
		);

		return redirect()->back()->with($notification);

    } // end method 



}
 