<?php

namespace App\Http\Controllers;

use App\Models\MainModel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class MainController extends Controller
{
    private $obj;

    function __construct()
    {
        $this->obj=new MainModel;
    }
    function index()
    {
        if(session()->has('user_id'))
        {
            return view('index');
        }
        else
        {
            return redirect('login');
        }
    }

    function login()
    {
        $company_dts=$this->obj->getData1('company_dts');
        return view('login')->with('company_dts',$company_dts);
    }
    function login_ck(Request $req)
    {
        $username=$req->input('username');
        $pass=$req->input('pass');
        $where=[
            'user_id'=>$username,
        ];

        $user = $this->obj->getDataWhere('reg', $where);
        if($user)
        {
            if($user->password==$pass)
            {
                session(['user_id' => $user->id]);
                // dd(session('user_id'));
                return redirect('/');
            }
            else
            {
                return back()->with('login_msg',"Incorrect Password");
            }
        }
        else
        {
            return back()->with('login_msg',"User Not Found");
        }
    }

    function logout()
    {
        session()->forget('user_id');
        return redirect('/');
    }

    function companyprofile()
    {
        $count=$this->obj->getDataCount('company_dts');
        $data=null;
        $ph=null;
        $phm=array();
        if($count>0)
        {
            $where=[
                'id'=>session('user_id')
            ];
            $data=$this->obj->getDataWhere('company_dts',$where);
            // dd($data);
            $ph=json_decode($data->company_mobile_number);
            // dd($ph);
            foreach($ph as $p)
            {
                $phm[]=$p;
            }
        }
        // dd($phm);
        // foreach($phm as $p)
        //     {
        //         dd($p);
        //     }

        // foreach($ph as $p)
        // {
        //     dd($p);
        // }
        // dd($ph);
        return view('companyprofile')->with('count',$count)->with('data',$data)->with('pho',$phm);
    }
    function company_details(Request $req)
    {
        $company_name=$req->input('company_name');
        $company_email=$req->input('company_email');
        $company_address=$req->input('company_address');
        $company_mobile_number[]=$req->input('company_mobile_number');
        $gst=$req->input('gst');
        $pan=$req->input('pan');
        $company_img=$req->file('company_img');
        $company_logo=$req->file('company_logo');
        //
        $b_name=$req->input('b_name');
        $ac_name=$req->input('ac_name');
        $ac_no=$req->input('ac_no');
        $branch=$req->input('branch');
        $ifsc=$req->input('ifsc');
        $micr=$req->input('micr');
        $branch_code=$req->input('branch_code');
        $swift_code=$req->input('swift_code');

        $rt=json_encode($company_mobile_number);
        // dd($rt);
        $array = json_decode($rt);

// Flatten the nested array
$flattenedArray = array_merge(...$array);

// Encode the flattened array back to JSON
$flattenedJson = json_encode($flattenedArray);

        // dd($req);
        $image_path = null;
        $image_path1 = null;
        if ($company_logo) {
            $image_name = $company_logo->getClientOriginalName();
            $image_path = '/uploads/company_details/'. $image_name;
            $company_logo->move(public_path('/uploads/company_details'), $image_name);
        }
        if ($company_img) {
            $image_name = $company_img->getClientOriginalName();
            $image_path1 = '/uploads/rooms/'. $image_name;
            $company_img->move(public_path('/uploads/rooms'), $image_name);
        }
        $data=[
            'company_name'=>$company_name,
            'company_email'=>$company_email,
            'company_address'=>$company_address,
            'company_mobile_number'=>$flattenedJson,
            'gst'=>$gst,
            'pan'=>$pan,
            'company_img'=>$image_path1,
            'company_logo'=>$image_path,
            //
            'bank_name'=>$b_name,
            'ac_name'=>$ac_name,
            'ac_no'=>$ac_no,
            'branch_name'=>$branch,
            'ifsc'=>$ifsc,
            'micr'=>$micr,
            'branch_code'=>$branch_code,
            'swift_code'=>$swift_code,
        ];
        $result=$this->obj->insert('company_dts',$data);
        // dd($result);
        if($result)
        {
            return back()->with('ins',"Stored Successfully");
        }
        else
        {
            return back()->with('ins',"Stored Not");
        }
    }
    function company_details_upd(Request $req,$id)
    {
        $company_name=$req->input('company_name');
        $company_email=$req->input('company_email');
        $company_address=$req->input('company_address');
        $company_mobile_number[]=$req->input('company_mobile_number');
        $company_img=$req->file('company_img');
        $company_logo=$req->file('company_logo');
        //
        $b_name=$req->input('b_name');
        $ac_name=$req->input('ac_name');
        $ac_no=$req->input('ac_no');
        $branch=$req->input('branch');
        $ifsc=$req->input('ifsc');
        $micr=$req->input('micr');
        $branch_code=$req->input('branch_code');
        $swift_code=$req->input('swift_code');
        // dd($req);
        $image_path = null;
        $image_path1 = null;
        if ($company_logo) {
            $image_name = $company_logo->getClientOriginalName();
            $image_path = '/uploads/company_details/'. $image_name;
            $company_logo->move(public_path('/uploads/company_details'), $image_name);
        }
        if ($company_img) {
            $image_name = $company_img->getClientOriginalName();
            $image_path1 = '/uploads/rooms/'. $image_name;
            $company_img->move(public_path('/uploads/rooms'), $image_name);
        }
        $rt=json_encode($company_mobile_number);
        // dd($rt);
        $array = json_decode($rt);

// Flatten the nested array
$flattenedArray = array_merge(...$array);

// Encode the flattened array back to JSON
$flattenedJson = json_encode($flattenedArray);
// dd($flattenedArray);
        $data=[
            'company_name'=>$company_name,
            'company_email'=>$company_email,
            'company_address'=>$company_address,
            'company_mobile_number'=>$flattenedJson,
            //
            'bank_name'=>$b_name,
            'ac_name'=>$ac_name,
            'ac_no'=>$ac_no,
            'branch_name'=>$branch,
            'ifsc'=>$ifsc,
            'micr'=>$micr,
            'branch_code'=>$branch_code,
            'swift_code'=>$swift_code,
        ];
        if($company_img)
        {
            $data['company_img']=$image_path1;
        }
        if($company_logo)
        {
            $data['company_logo']=$image_path;
        }
        $where=[
            'id'=>$id
        ];
        $result=$this->obj->updateWhere('company_dts',$data,$where);
        // dd($result);
        if($result)
        {
            return back()->with('ins',"Update Successfully");
        }
        else
        {
            return back()->with('ins',"Update Not");
        }
    }
    function company_details_edit_upd(Request $req,$id)
    {
        $company_name=$req->input('company_name');
        $company_email=$req->input('company_email');
        $company_address=$req->input('company_address');
        $company_mobile_number[]=$req->input('company_mobile_number');
        $company_img=$req->file('company_img');
        $company_logo=$req->file('company_logo');
        //
        $b_name=$req->input('b_name');
        $ac_name=$req->input('ac_name');
        $ac_no=$req->input('ac_no');
        $branch=$req->input('branch');
        $ifsc=$req->input('ifsc');
        $micr=$req->input('micr');
        $branch_code=$req->input('branch_code');
        $swift_code=$req->input('swift_code');
        // dd($req);
        $image_path = null;
        $image_path1 = null;
        if ($company_logo) {
            $image_name = $company_logo->getClientOriginalName();
            $image_path = '/uploads/company_details/'. $image_name;
            $company_logo->move(public_path('/uploads/company_details'), $image_name);
        }
        if ($company_img) {
            $image_name = $company_img->getClientOriginalName();
            $image_path1 = '/uploads/rooms/'. $image_name;
            $company_img->move(public_path('/uploads/rooms'), $image_name);
        }
        $rt=json_encode($company_mobile_number);
        // dd($rt);
        $array = json_decode($rt);

// Flatten the nested array
$flattenedArray = array_merge(...$array);

// Encode the flattened array back to JSON
$flattenedJson = json_encode($flattenedArray);
// dd($flattenedArray);
        $data=[
            'company_name'=>$company_name,
            'company_email'=>$company_email,
            'company_address'=>$company_address,
            'company_mobile_number'=>$flattenedJson,
            //
            'bank_name'=>$b_name,
            'ac_name'=>$ac_name,
            'ac_no'=>$ac_no,
            'branch_name'=>$branch,
            'ifsc'=>$ifsc,
            'micr'=>$micr,
            'branch_code'=>$branch_code,
            'swift_code'=>$swift_code,
        ];
        if($company_img)
        {
            $data['company_img']=$image_path1;
        }
        if($company_logo)
        {
            $data['company_logo']=$image_path;
        }
        $where=[
            'id'=>$id
        ];
        $result=$this->obj->updateWhere('company_dts',$data,$where);
        // dd($result);
        if($result)
        {
            return back()->with('ins',"Update Successfully");
        }
        else
        {
            return back()->with('ins',"Update Not");
        }
    }

    function branch_Table()
    {
        $where=[
            'status'=>0
        ];
        $result=$this->obj->getDatasWhere('company_dts',$where);
        return view('branch_Table')->with('datas',$result);
    }
    function branch()
    {
        return view('branch');
    }

    function company_details_edit($id)
    {
        $where=[
            'id'=>$id
        ];
        $result=$this->obj->getDataWhere('company_dts',$where);
        $ph=json_decode($result->company_mobile_number);
        return view('company_details_edit')->with('data',$result)->with('pho',$ph);
    }

    function company_details_delete($id)
    {
        $where=[
            'id'=>$id
        ];
        $data=[
            'status'=>1
        ];
        $this->obj->updateWhere('company_dts',$data,$where);
        return redirect('branch_Table');
    }

    public function delete_value(Request $request)
    {
        // Retrieve inputs from the request
        $id = $request->input('id');
        $value = $request->input('value');

        // Retrieve company details from the database
        $company_dts = $this->obj->getData1('company_dts');
        $ph = json_decode($company_dts->company_mobile_number); // Convert to associative array
        $ph1 = [];

        // Filter out the value to be deleted
        foreach ($ph as $key => $pho) {
            if ($pho != $value) {
                $ph1[] = $pho; // Append $pho to $ph1 array
            }
        }

        // Update the company details with the modified mobile numbers array
        $where = ['id' => $id];
        $data = ['company_mobile_number' => json_encode($ph1)];
        $result = $this->obj->updateWhere('company_dts', $data, $where);

        // Return a response based on the result
        if ($result) {
            return response()->json(['message' => 'Value deleted successfully', 'data' => $ph]);
        } else {
            return response()->json(['message' => 'Value not deleted', 'data' => $ph]);
        }
    }
    // function company_details_delete($id)
    // {
    //     $where=[
    //         'id'=>$id
    //     ];
    //     $this->obj->getDataWhere('company_dts',$where);
    //     return view('branch');
    // }

    public function company_details_edit_dlt(Request $request)
    {
        // Retrieve inputs from the request
        $id = $request->input('id');
        $value = $request->input('value');

        // Retrieve company details from the database
        $company_dts = $this->obj->getData1('company_dts');
        $ph = json_decode($company_dts->company_mobile_number); // Convert to associative array
        $ph1 = [];
        $pho="";
        // Filter out the value to be deleted
        foreach ($ph as $pho) {
            if ($pho != $value) {
                $ph1[] = $pho; // Append $pho to $ph1 array

            }
        }

        // return response()->json(['message' => 'Value deleted successfully', 'data' => $ph1]);

        // Update the company details with the modified mobile numbers array
        $where = ['id' => $id];
        $data = ['company_mobile_number' => json_encode($ph1)];
        $result = $this->obj->updateWhere('company_dts', $data, $where);

        // Return a response based on the result
        if ($result) {
            return response()->json(['message' => 'Value deleted successfully', 'data' => $ph1]);
        } else {
            return response()->json(['message' => 'Value not deleted', 'data' => $ph1]);
        }
    }

    function change_password()
    {
        // $id=session('user_id');
        $company_dts = $this->obj->getData1('company_dts');
        return view('changePassword2')->with('data',$company_dts);
    }

    function changePass_upd(Request $req)
    {
        // dd('hi');
        $c_pass=$req->input('c_pass');
        $n_pass=$req->input('n_pass');
        $n2_pass=$req->input('n2_pass');

        $id=session('user_id');
        $where=[
            'id'=>$id
        ];
        $reg = $this->obj->getDataWhere('reg',$where);
        if($c_pass==$reg->password)
        {
            $data=[
                'password'=>$n_pass
            ];
            $result=$this->obj->updateWhere('reg',$data,$where);
            if($result)
            {
                session()->forget('user_id');
                return redirect('/');
            }
            else
            {
                return back()->with('ck_pass',"New Password is not update");
            }
        }
        else
        {
            return back()->with('ck_pass',"You entered Incorrect Current password");
        }
    }

    function forget_pass_link()
    {
        return view('forgotPassword');
    }
    // function forget_pass_link_send(Request $req)
    // {

    //     $username = $req->input('username');
    //     $email = $req->input('email');
    //     // dd($email);
    //     $token = Str::random(64);
    //     // $user = DB::table('reg')->where('email', $email)->first();
    //     // dd($user);
    //     // $password = $user->password;

    //     try {
    //         // Insert reset token into password_resets table
    //         DB::table('password_resets')->insert([
    //             'email' => $email,
    //             'token' => $token,
    //             'created_at' => Carbon::now()
    //         ]);

    //         // Send reset password email
    //         $mailSent = Mail::send('restt', ['token' => $token], function ($message) use ($email) {
    //             $message->to($email)->subject('Reset Password');
    //         });

    //         if (!$mailSent) {
    //             throw new \Exception('Failed to send reset password email.');
    //         }

    //         return back()->with('message', 'We have emailed you a password reset link. Please check your email.');
    //     } catch (\Exception $e) {
    //         return back()->with('error', 'Failed to send reset password email: ' . $e->getMessage());
    //     }
    // }


    function branch_ins(Request $req)
    {
        $company_name=$req->input('company_name');
        $company_email=$req->input('company_email');
        $company_address=$req->input('company_address');
        $company_mobile_number[]=$req->input('company_mobile_number');
        $gst=$req->input('gst');
        $pan=$req->input('pan');
        $company_img=$req->file('company_img');
        $company_logo=$req->file('company_logo');
        //
        $b_name=$req->input('b_name');
        $ac_name=$req->input('ac_name');
        $ac_no=$req->input('ac_no');
        $branch=$req->input('branch');
        $ifsc=$req->input('ifsc');
        $micr=$req->input('micr');
        $branch_code=$req->input('branch_code');
        $swift_code=$req->input('swift_code');

        $rt=json_encode($company_mobile_number);
        // dd($rt);
        $array = json_decode($rt);

// Flatten the nested array
$flattenedArray = array_merge(...$array);

// Encode the flattened array back to JSON
$flattenedJson = json_encode($flattenedArray);

        // dd($req);
        $image_path = null;
        $image_path1 = null;
        if ($company_logo) {
            $image_name = $company_logo->getClientOriginalName();
            $image_path = '/uploads/company_details/'. $image_name;
            $company_logo->move(public_path('/uploads/company_details'), $image_name);
        }
        if ($company_img) {
            $image_name = $company_img->getClientOriginalName();
            $image_path1 = '/uploads/rooms/'. $image_name;
            $company_img->move(public_path('/uploads/rooms'), $image_name);
        }
        $data=[
            'company_name'=>$company_name,
            'company_email'=>$company_email,
            'company_address'=>$company_address,
            'company_mobile_number'=>$flattenedJson,
            'gst'=>$gst,
            'pan'=>$pan,
            'company_img'=>$image_path1,
            'company_logo'=>$image_path,
            //
            'bank_name'=>$b_name,
            'ac_name'=>$ac_name,
            'ac_no'=>$ac_no,
            'branch_name'=>$branch,
            'ifsc'=>$ifsc,
            'micr'=>$micr,
            'branch_code'=>$branch_code,
            'swift_code'=>$swift_code,
        ];
        $result=$this->obj->insert('company_dts',$data);
        // dd($result);
        if($result)
        {
            return redirect('branch_Table')->with('ins',"Stored Successfully");
        }
        else
        {
            return back()->with('ins',"Stored Not");
        }
    }


    function company_details_view($id)
    {
        $where=[
            'id'=>$id
        ];
        $result=$this->obj->getDataWhere('company_dts',$where);
        $ph=json_decode($result->company_mobile_number);
        return view('company_details_view')->with('data',$result)->with('pho',$ph);
    }

}



?>
