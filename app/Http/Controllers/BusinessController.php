<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;

class BusinessController extends Controller
{
    public function index()
    {
        return view('business.business-page');
    }

    public function search(Request $request)
    {
        if((isset($request->location) || $request->location == null || empty($request->location)) && (isset($request->latitude) || $request->latitude == null || empty($request->latitude)) && (isset($request->longitude) || $request->longitude == null || empty($request->longitude))){
            $data =  [
                'status' => 'failed',
                'data' => null,
                'message' => 'Please Insert Your Location or Latitude Longitude',
                'error' => true
            ];
            return $data;
        }

        $dataLocation = [];

        if(isset($request->location) || $request->location !== null){
            $dataLocation = Business::where(function($q) {
                $q->where('address1', 'like', '%' . $request->location . '%')
                  ->orWhere('address2', 'like', '%' . $request->location . '%')
                  ->orWhere('address3', 'like', '%' . $request->location . '%')
                  ->orWhere('city', 'like', '%' . $request->location . '%')
                  ->orWhere('zip_code', 'like', '%' . $request->location . '%')
                  ->orWhere('country', 'like', '%' . $request->location . '%')
                  ->orWhere('state', 'like', '%' . $request->location . '%');
            })->with('location')->with('categories')->with('coordinates')->with('transaction')->first();
        }else{
            $dataLocation = Coordinates::where('latitude', $request->latitude)
            ->where('longitude', $request->longitude)->with('location')
            ->with('categories')->with('coordinates')->with('transaction')->get();
        }
        
        if(isset($request->term) || $request->term !== null){
            $filtered = $dataLocation->where(function($q) {
                $q->where('name', 'like', '%' . $request->term . '%')
                  ->orWhere('alias', 'like', '%' . $request->term . '%')
                  ->orWhere('title', 'like', '%' . $request->term . '%');
            });
            $filtered->all();
        }

        if(isset($request->categories) || $request->categories !== null){
            $filtered = $dataLocation->where(function($q) {
                $q->where('alias', 'like', '%' . $request->term . '%')
                  ->orWhere('title', 'like', '%' . $request->term . '%');
            });
            $filtered->all();
        }

        if(isset($request->price) || $request->price !== null){
            $filtered = $dataLocation->where('price', $request->price);
            $filtered->all();
        }

        if(isset($request->radius) || $request->radius !== null){
            $filtered = $dataLocation->where('distance', '<=', $request->radius);
            $filtered->all();
        }

        if(isset($request->sort_by) || $request->sort_by !== null){
            if(in_array($request->sort_by, ['rating', 'review_count', 'distance'])){
                $dataLocation->sortBy($request->sort_by);
            }
        }
        
        $data = [
            'status' => 'success',
            'data' => $dataLocation,
            'message' => '',
            'error' => false
        ];
        
		return $data;
    }

    public function store(Request $request)
    {
        try{
            $business = new Business();
            $business->business_id = random_bytes(22);
            $business->name = $request->name;
            $business->image_url = $request->image_url;
            $business->is_closed = $request->is_closed;
            $business->url = $request->url;
            $business->price = $request->price;
            $business->url = $request->url;
            $business->phone = $request->phone;
            $business->distance = $request->distance;
            $business->alias = strtolower(str_replace(' ', '-', preg_replace("/[^A-Za-z0-9 ]/", '', $request->name))) . '-' . strtolower(str_replace(' ', '-', $request->city));
            $business->save();

            $location = new Location();
            $location->business_id = $business->business_id;
            $location->address1 = $request->address1;
            $location->address2 = $request->address2;
            $location->address3 = $request->address3;
            $location->city = $request->city;
            $location->zip_code = $request->zip_code;
            $location->country = $request->country;
            $location->state = $request->state;
            $location->save();

            $coordinates = new Coordinates();
            $coordinates->business_id = $business->business_id;
            $coordinates->latitute = $request->latitute;
            $coordinates->longitude = $request->longitude;
            $location->save();

            if(isset($request->transaction) && !empty($request->transaction)){
                foreach($request->transaction as $value){
                    $transaction = TransactionType::where('transaction_name', $value)->first();
                    if(count($transaction) > 0){
                        $newBTrans = new BusinessTransactionType();
                        $newBTrans->business_id = $business->business_id;
                        $newBTrans->transaction_type_id = $transaction->id;
                        $newBTrans->save();
                    }else{
                        $newTrans = new TransactionType();
                        $newTrans->transaction_name = $value;
                        $newTrans->save();

                        $newBTrans = new BusinessTransactionType();
                        $newBTrans->business_id = $business->business_id;
                        $newBTrans->transaction_type_id = $newTrans->id;
                        $newBTrans->save();
                    }
                }
            }

            if(isset($request->categories) && !empty($request->categories)){
                foreach($request->categories as $value){
                    $categories = Categories::where('alias', $value->alias)->first();
                    if(count($categories) > 0){
                        $newBCat = new BusinessCategories();
                        $newBCat->business_id = $business->business_id;
                        $newBCat->categories_id = $categories->id;
                        $newBCat->save();
                    }else{
                        $newCat = new Categories();
                        $newCat->alias = $value->alias;
                        $newCat->title = $value->title;
                        $newCat->save();

                        $newBCat = new BusinessCategories();
                        $newBCat->business_id = $business->business_id;
                        $newBCat->categories_id = $newCat->id;
                        $newBCat->save();
                    }
                }
            }

            $data = [
                'status' => 'success',
                'data' => null,
                'message' => 'Insert Data Success',
                'error' => false
            ];
            return $data;
        } catch (\Throwable $th) {
            $data = [
                'status' => 'failed',
                'data' => null,
                'message' => $th->getMessage(),
                'error' => true
            ];
            return $data;
        }
    }

    public function update($id)
    {
        try{
            $business = Business::findOrFail($id);

            if($business->count() > 0)
            {
                $business->name = $request->name;
                $business->image_url = $request->image_url;
                $business->is_closed = $request->is_closed;
                $business->url = $request->url;
                $business->price = $request->price;
                $business->url = $request->url;
                $business->phone = $request->phone;
                $business->distance = $request->distance;
                $business->alias = strtolower(str_replace(' ', '-', preg_replace("/[^A-Za-z0-9 ]/", '', $request->name))) . '-' . strtolower(str_replace(' ', '-', $request->city));
                $business->save();

                $location = Location::where('business_id', $id)->first();
                $location->address1 = $request->address1;
                $location->address2 = $request->address2;
                $location->address3 = $request->address3;
                $location->city = $request->city;
                $location->zip_code = $request->zip_code;
                $location->country = $request->country;
                $location->state = $request->state;
                $location->save();

                $coordinates = Coordinates::where('business_id', $id)->first();
                $coordinates->latitute = $request->latitute;
                $coordinates->longitude = $request->longitude;
                $location->save();

                if(isset($request->transaction) && !empty($request->transaction)){
                    foreach($request->transaction as $value){
                        $transaction = TransactionType::where('transaction_name', $value)->first();
                        if(count($transaction) > 0){
                            $newBTrans = BusinessTransactionType::where('business_id', $id)->first();
                            $newBTrans->transaction_type_id = $transaction->id;
                            $newBTrans->save();
                        }else{
                            $newTrans = new TransactionType();
                            $newTrans->transaction_name = $value;
                            $newTrans->save();

                            $newBTrans = BusinessTransactionType::where('business_id', $id)->first();
                            $newBTrans->transaction_type_id = $newTrans->id;
                            $newBTrans->save();
                        }
                    }
                }

                if(isset($request->categories) && !empty($request->categories)){
                    foreach($request->categories as $value){
                        $categories = Categories::where('alias', $value->alias)->first();
                        if(count($categories) > 0){
                            $newBCat = BusinessCategories::where('business_id', $id)->first();
                            $newBCat->categories_id = $categories->id;
                            $newBCat->save();
                        }else{
                            $newCat = new Categories();
                            $newCat->alias = $value->alias;
                            $newCat->title = $value->title;
                            $newCat->save();

                            $newBCat = BusinessCategories::where('business_id', $id)->first();
                            $newBCat->categories_id = $newCat->id;
                            $newBCat->save();
                        }
                    }
                }
                $data = [
                    'status' => 'success',
                    'data' => $business,
                    'message' => 'Update Data Success',
                    'error' => false
                ];
            }else{
                $data = [
                    'status' => 'failed',
                    'data' => null,
                    'message' => 'Data Not Found',
                    'error' => true
                ];
            }
            return $data;
        } catch (\Throwable $th) {
            $data = [
                'status' => 'failed',
                'data' => null,
                'message' => $th->getMessage(),
                'error' => true
            ];
            return $data;
        }
    }

    public function destroy($id)
    {
        try{
            $business = Business::findOrFail($id);
            if($business->count() > 0)
            {
                $business->delete();
                Location::where('business_id', $id)->delete();
                Coordinates::where('business_id', $id)->delete();
                BusinessCategories::where('business_id', $id)->delete();
                BusinessTransactionType::where('business_id', $id)->delete();
                $data = [
                    'status' => 'success',
                    'data' => $business,
                    'message' => 'Delete Succesfully',
                    'error' => false
                ];
            }else{
                $data = [
                    'status' => 'failed',
                    'data' => null,
                    'message' => 'Data Not Found',
                    'error' => true
                ];
            }
            return $data;
        } catch (\Throwable $th) {
            $data = [
                'status' => 'failed',
                'data' => null,
                'message' => $th->getMessage(),
                'error' => true
            ];
            return $data;
        }
    }
}
