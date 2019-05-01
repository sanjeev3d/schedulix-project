<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\reg_step;
use DB;
use Auth;
use App\BusinessCategory;
use App\Business;
use App\UserBusiness;
use App\Service;
use App\BusinessService;
use App\ServiceMenu;
use App\User;
use Crypt;
use App\BusinessTiming;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use Illuminate\Support\Facades\Hash;
use DataTables;
use App\Http\Requests\CustomerForm;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check()){
            $business_category  = \App\BusinessCategory::all();
            $regStep  = \App\reg_step::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first(); 
            if($regStep){
                return view('home', compact('regStep','business_category'));
            }else{
                return view('home', compact('business_category'));
            }
        }
        
    }

    public function step_one(Request $request){
      
        if($request->all()){
            $business = new Business;
            $business->business_cat_id = $request->business_type;
            $business->save();
            $business_id = $business->id;
            if($business){
                $user_business = new UserBusiness; 
                $user_business->user_id = Auth::user()->id;
                $user_business->business_id = $business->id;
                $user_business->save();
                if($user_business){
                    \App\reg_step::updateOrCreate(
                        ['user_id' => Auth::user()->id],
                        ['step' => 1, 'status' => 1]
                    );

                    $service = \App\Service::all();
                    $returnHTML = view('reg_step.step_2',compact("business_id","service"))
                    // ->with("business_id", "1")
                    ->render();
                    return response()->json(array('success' => true, 'html'=>$returnHTML));
                }
            }
            $Response = array(
                'code'=> "200",
                'status'=>"error",
            );
            return json_encode($Response);
        }
    }
    public function step_two(Request $request){
        
        if($request->all()){

            $business_service = new  BusinessService;
            $business_service->business_id = $request['business_id'];
            $business_service->service_id = $request['service_id'];
            $business_service->save();
            $business_id = $request['business_id'];
            if($business_service){
                \App\reg_step::updateOrCreate(
                    ['user_id' => Auth::user()->id],
                    ['step' => 2, 'status' => 1]
                );
                $selectedService = \App\BusinessService::where('business_id',$request['business_id'])->get();
                $returnHTML = view('reg_step.step_3',compact('selectedService','business_id' ))->render();
                return response()->json(array('success' => true, 'html'=>$returnHTML));
            }

            $Response = array(
                'code'=> "200",
                'status'=>"error",
            );
            return json_encode($Response);
        }
        
    }
    public function step_three(Request $request){
        //print_r($request->all());exit;
         if($request->all()){

            foreach ($request['service'] as $key => $value) {
                # code...
                $service_menu = new ServiceMenu;
                $service_menu->business_id = $request['business_id'];
                $service_menu->name = $value['name'];
                $service_menu->duration = $value['duration'];
                $service_menu->price = $value['price'];
                $service_menu->save();

                
            }
            $business_id = $request['business_id'];
            if($service_menu){
                \App\reg_step::updateOrCreate(
                    ['user_id' => Auth::user()->id],
                    ['step' => 3, 'status' => 1]
                );
                $user = \App\User::where('id',Auth::user()->id)->get();
                $returnHTML = view('reg_step.step_4',compact('user','business_id' ))->render();
                return response()->json(array('success' => true, 'html'=>$returnHTML));
            }

            $Response = array(
                'code'=> "200",
                'status'=>"error",
            );
            return json_encode($Response);
        }
        
    }
    public function step_four(Request $request){
        //print_r($request->all());exit;
         if($request->all()){

            foreach ($request['staff'] as $key => $value) {
                # code...
                $staff = new User;
                $staff->name = $value['name'];
                $staff->email = $value['email'];
                $staff->mobile = $value['phone'];
                $staff->role_id = $value['role'];
                $staff->password = Crypt::encrypt('schedulix');
                
                $staff->save();
            }
            $business_id = $request['business_id'];
            if($staff){
                \App\reg_step::updateOrCreate(
                    ['user_id' => Auth::user()->id],
                    ['step' => 4, 'status' => 1]
                );
                $returnHTML = view('reg_step.step_5')->with("business_id", $business_id)->render();
                return response()->json(array('success' => true, 'html'=>$returnHTML));
            }

            $Response = array(
                'code'=> "200",
                'status'=>"error",
            );
            return json_encode($Response);
        }
    }

    public function step_five(Request $request){
        //print_r($request->all());exit;
        if($request->all()){

            foreach ($request['week'] as $key => $value) {
                if(@$value['check']){
                    $business_hour = new BusinessTiming;
                    $business_hour->day = $key;
                    $business_hour->start_time = $value['from'];
                    $business_hour->end_time = $value['to'];
                    $business_hour->business_id = $request['business_id'];
                    $business_hour->save();
                }
            }
            if($business_hour){
                $business_id = $request['business_id'];
                \App\reg_step::updateOrCreate(
                    ['user_id' => Auth::user()->id],
                    ['step' => 5, 'status' => 1]
                );
                $returnHTML = view('reg_step.step_6')->with("business_id", $business_id)->render();
                return response()->json(array('success' => true, 'html'=>$returnHTML));
            }

            $Response = array(
                'code'=> "200",
                'status'=>"error",
            );
            return json_encode($Response);
        }
    }
    public function step_six(Request $request){
        
        if($request->all()){

            $business = Business::find($request->business_id);
            $business->business_cat_id = $business->business_cat_id;
            $business->name = $request->business_name;
            $business->address = $request->business_address;
            $business->country = $request->business_country;
            $business->region = $request->business_region;
            $business->city = $request->business_city;
            $business->zip = $request->business_zip;
            $business->timezone = $request->business_timezone;
            $business->save();

            if($business){
                \App\reg_step::updateOrCreate(
                    ['user_id' => Auth::user()->id],
                    ['step' => 6, 'status' => 1]
                );
                return response()->json(array('codee' => 100));

                
            }

            $Response = array(
                'codee'=> "200",
                'status'=>"error",
            );
            return json_encode($Response);
        }
    }

    public function findstep(Request $request){
        if($request->all()){

            if($request->id == 1){
                $business_id = \App\UserBusiness::where('user_id',Auth::user()->id)->first();
                $business_id = $business_id->business_id;
                $service = \App\Service::all();
                $returnHTML = view('reg_step.step_2',compact("business_id","service"))
                // ->with("business_id", "1")
                ->render();
                return response()->json(array('success' => true, 'html'=>$returnHTML));
            }
            if($request->id == 2){
                $business_id = \App\UserBusiness::where('user_id',Auth::user()->id)->first();
                $business_id = $business_id->business_id;
                $selectedService = \App\BusinessService::where('business_id',$business_id)->get();
                $returnHTML = view('reg_step.step_3',compact('selectedService','business_id' ))->render();
                return response()->json(array('success' => true, 'html'=>$returnHTML));
            }elseif($request->id == 3){
                $business_id = \App\UserBusiness::where('user_id',Auth::user()->id)->first();
                $business_id = $business_id->business_id;
                $returnHTML = view('reg_step.step_4')->with('business_id', $business_id)->render();
                return response()->json(array('success' => true, 'html'=>$returnHTML));
            }elseif($request->id == 4){
                $business_id = \App\UserBusiness::where('user_id',Auth::user()->id)->first();
                $business_id = $business_id->business_id;
                $returnHTML = view('reg_step.step_5')->with('business_id', $business_id)->render();
                return response()->json(array('success' => true, 'html'=>$returnHTML));
            }elseif($request->id == 5){
                $business_id = \App\UserBusiness::where('user_id',Auth::user()->id)->first();
                $business_id = $business_id->business_id;
                $returnHTML = view('reg_step.step_6')->with('business_id', $business_id)->render();
                return response()->json(array('success' => true, 'html'=>$returnHTML));
            }else{
                $Response = array(
                    'codee'=> "100",
                    'status'=>"success"
                );
                return json_encode($Response);
            }
        }
    }

    public function customerList(Request $request)
    {

        $data['users'] = $users = User::all()->where('status','active');
        $data['allactiveUserCount'] = $users->count();
        $usersInactive = User::all()->where('status','inactive');
        $data['allinactiveUserCount'] = $usersInactive->count();

        return view('customers.index')->with($data);
    }

    public function addCustomer(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'first_name' =>'required|max:25',
            'last_name' =>'required|max:25',
            'email' =>'required|unique:users,email',
            'address' =>'required|max:100',
            'country' =>'required',
            'city' =>'required',
            'region' =>'required',
            'zip_code' =>'required|digits:6',
            'home_phone' =>'required|digits:10',
            'mobile_phone' =>'required|digits:10',
            'work_phone' =>'required|digits:10',
        ],[
            'first_name.required'=>'name field required.',
            'first_name.max'=>'name must be 25 characters field required.',
            'last_name.required'=>'last name field required.',
            'last_name.size'=>'last name must be 25 characters field required.',
            'email.required'=>'email field required.',
            'email.unique'=>'email field must be unique.',
            'address.required'=>'address field required.',
            'address.size'=>'address must be 100 characters field required.',
            'country.required'=>'city field required.',
            'city.required'=>'region field required.',
            'region.required'=>'address field required.',
            'zip_code.required'=>'zip code field required.',
            'zip_code.digits'=>'zip code must  be 6 digits required.',
            'home_phone.required'=>'home phone field required.',
            'home_phone.digits'=>'home phone must be 10 digits .',
            'mobile_phone.required'=>'mobile phone field required.',
            'mobile_phone.digits'=>'mobile phone must be 10 digits required.',
            'work_phone.required'=>'work phone field required.',
            'work_phone.digits'=>'work phone must be 10 digits required .',
        ]);

        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors(),'status'=>false]);
        }

        $user = new User;
        $user->name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->role_id = '3';
        $user->password = Hash::make('12345678');//for now
        $user->address = $request->input('address');
        $user->country = $request->input('country');
        $user->city = $request->input('city');
        $user->region = $request->input('region');
        $user->zip_code = $request->input('zip_code');
        $user->home_phone = $request->input('home_phone');
        $user->mobile_phone = $request->input('mobile_phone');
        $user->work_phone = $request->input('work_phone');
        $user->save();
        if($user->save())
        {
            $users = User::where('id',$user->id)->first();
            $request->session()->flash('success', 'Customer Details added successfully.');
            return response()->json($users);

        }
        else
        {
            return 0;
        }
        
    }
    
    public function editCustomer(Request $request, User $user)
    {
        
        $users = User::where('id',$user->id)->first();
        return response()->json($users);
        
    }
   
    public function updateCustomer(Request $request, User $user)
    {
        $validator = \Validator::make($request->all(),[
            'first_name' =>'required|max:25',
            'last_name' =>'required|max:25',
            'email' =>'required|unique:users,email,'.$user->id,
            'address' =>'required|max:100',
            'country' =>'required',
            'city' =>'required',
            'region' =>'required',
            'zip_code' =>'required|digits:6',
            'home_phone' =>'required|digits:10',
            'mobile_phone' =>'required|digits:10',
            'work_phone' =>'required|digits:10',
        ],[
            'first_name.required'=>'name field required.',
            'first_name.max'=>'name must be 25 characters field required.',
            'last_name.required'=>'last name field required.',
            'last_name.size'=>'last name must be 25 characters field required.',
            'email.required'=>'email field required.',
            'email.unique'=>'email field must be unique.',
            'address.required'=>'address field required.',
            'address.size'=>'address must be 100 characters field required.',
            'country.required'=>'city field required.',
            'city.required'=>'region field required.',
            'region.required'=>'address field required.',
            'zip_code.required'=>'zip code field required.',
            'zip_code.digits'=>'zip code must  be 6 digits required.',
            'home_phone.required'=>'home phone field required.',
            'home_phone.digits'=>'home phone must be 10 digits .',
            'mobile_phone.required'=>'mobile phone field required.',
            'mobile_phone.digits'=>'mobile phone must be 10 digits required.',
            'work_phone.required'=>'work phone field required.',
            'work_phone.digits'=>'work phone must be 10 digits required .',
        ]);

        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors(),'status'=>false]);
        }
        $customer = new User;
        $customer->exists = true;
        $customer->id = $user->id;
        $customer->name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->email = $request->input('email');
        $customer->role_id = '3';
        //$customer->password = Hash::make($data['password']);
        $customer->address = $request->input('address');
        $customer->country = $request->input('country');
        $customer->city = $request->input('city');
        $customer->region = $request->input('region');
        $customer->zip_code = $request->input('zip_code');
        $customer->home_phone = $request->input('home_phone');
        $customer->mobile_phone = $request->input('mobile_phone');
        $customer->work_phone = $request->input('work_phone');

        // if($request->hasFile('image')){    
        //    $file = $request->file('image');       
        //    $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString()); 
        //    $filename = $file->getClientOriginalName();   
        //    $newname = $timestamp . '-' . $filename;       
        //    if($file->move('public/uploads/images', $newname))
        //      {           
        //        $image = $newname;                    
        //      } else{
        //         $image = $newname;
        //      }       
        // }else{

        // }

        $customer->save();
        if($customer->save())
        {
            $users = User::where('id',$user->id)->first();
            $request->session()->flash('success', 'Customer Details updated successfully.');
            return response()->json($users);
        }
        else
        {
            return 0;
        }
        
    }

    /*Customers Details Exports*/
    public function export(Request $request)
    {  
       return Excel::download(new UsersExport(),'customers.csv');
    }

    /*Customers List  show*/
    public function customerData(Request $request) { 
        
        $filter = $request->filter;
        $arrange = $request->arrange;

        if($arrange=='alphabet'){
            $customerData = User::select('id','image','name','last_name','status')
            ->where('status',$filter)->orderBy('name', 'ASC')->get();
        }else if($arrange=='oldest'){
            $customerData = User::select('id','image','name','last_name','status')
            ->where('status',$filter)->orderBy('created_at', 'ASC')->get();
        } else {
            $customerData = User::select('id','image','name','last_name','status')
            ->where('status',$filter)->orderBy('created_at', 'DESC')->get();
        }
        return DataTables::of($customerData)
            ->addColumn('action', function($data) {
                if($data->status =='active') {
                    return sprintf('<a data-toggle="modal" id="%s" class="btn-sm %s edit-customer btn">%s</a>
                    <a href="javascript:delete_account(\''.$data['id'].'\',\'deletecategory\',\'proceed\')" data-toggle="tooltip" id="%s" class="btn-sm %s " >%s</a>',
                    $data['id'],'customer','<img class="img-fluid " src="assets/images/edit-imgs.png" >',
                    $data['id'],'customer-delete','<img src="assets/images/close-imgs.png" class="img-fluid">');
                }else if($data->status =='inactive') {
                    return sprintf('<a data-toggle="modal" id="%s" class="btn-sm %s edit-customer btn">%s</a>',
                    $data['id'],'customer','<img class="img-fluid " src="assets/images/edit-imgs.png" >');
                }

            })->addColumn('id',function($data) {
                static $i=1;
                return $i++;
            })->addColumn('fullname', function($data) {
                    return sprintf('%s  %s ',$data['name'],$data['last_name']);
            })
            ->addColumn('image', function ($data) { 
                if($data->image == '') {
                    $url= asset($data->image );
                    return '<img src="'.$url.'assets/images/user_images/user-img.png" border="0" width="40" class="img-rounded" align="center" />';
                }else{
                    return '<img src="'.asset("assets/images/user_images/$data->image").'" border="0" width="40" class="img-rounded" align="center" />';
                }
            })
            ->rawColumns(['image','fullname','action']) 
            ->make(true);
    }

    /*Customers filtered record  show*/
    public function searchRecord(Request $request) { 
        
        $filter = $request->filter;
        $arrange = $request->sort;
        $searchterm = $request->term;

        if($arrange=='alphabet'){
            $customerData = User::select('id','image','name','last_name')
            ->where('status',$filter);
            if(!empty($searchterm)){
                $customerData = $customerData->where('name','LIKE','%'.$searchterm.'%'); 
            }
            $data['customerData'] = $customerData->orderBy('name', 'ASC')->get();
        }else if($arrange=='oldest'){
            $customerData = User::select('id','image','name','last_name')
            ->where('status',$filter);
            if(!empty($searchterm)){
                $customerData = $customerData->where('name','LIKE','%'.$searchterm.'%'); 
            }
            $data['customerData'] = $customerData->orderBy('created_at', 'ASC')->get();
        } else {
            $customerData = User::select('id','image','name','last_name','status')
            ->where('status',$filter);
            if(!empty($searchterm)){
                $customerData = $customerData->where('name','LIKE','%'.$searchterm.'%'); 
            }
            $data['customerData'] = $customerData->orderBy('created_at', 'DESC')->get();
        }

        $returnHTML = view('customers.customer-filter')->with($data)->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML));

    }
    
}

