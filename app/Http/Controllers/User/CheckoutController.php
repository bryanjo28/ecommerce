<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;

class CheckoutController extends Controller
{
    //
    public function DistrictGetAjax($division_id){

    	$ship = ShipDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
    	return json_encode($ship);

    } // end method

    public function CheckoutStore(Request $request){
        
        $data = array();
    	$data['shipping_name'] = $request->shipping_name;
    	$data['shipping_email'] = $request->shipping_email;
    	$data['shipping_phone'] = $request->shipping_phone;
    	$data['post_code'] = $request->post_code;
    	$data['division_id'] = $request->division_id;
    	$data['district_id'] = $request->district_id;
    	$data['notes'] = $request->notes;


    	if ($request->payment_method == 'stripe') {
    		return view('frontend.payment.stripe',compact('data'));
    	}elseif ($request->payment_method == 'card') {
    		return 'card';
    	}else{
            return 'cash';
    	}
    }// end method
}