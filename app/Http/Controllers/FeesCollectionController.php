<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\SettingModel;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\StudentAddFeesModel;
use Illuminate\Contracts\Session\Session;
use Stripe\Stripe;


class FeesCollectionController extends Controller
{
    public function collect_fees(Request $request){
        $data['getClass'] = ClassModel::getClass();

        if(!empty($request->all())){
            // die;
            $data['getRecord'] = User::getCollectFeesStudent();

        }

        $data['header_title'] = "Collect Fees";
        return view('admin.fees_collection.collect_fees' , $data);
    }

    public function student_fees_receipts(){
        $data['header_title'] = "Student Fees Receipt";
        return view('admin.fees_collection.student_fees_receipts',$data);
    }

    Public function collect_fees_report(){
        $data['getRecord'] = StudentAddFeesModel::getRecord();
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Collect Fees Report";
        return view('admin.fees_collection.collect_fees_report' , $data);
    }

    public function collect_fees_add($student_id)
    {
        $data['getFees'] = StudentAddFeesModel::getFees($student_id);
        $getStudent =User::getSingleClass($student_id);
        $data['getStudent'] = $getStudent;
        $data['header_title'] = "Add Collect Fees";
        $data['paid_amount'] = StudentAddFeesModel::getPaidAmount($student_id,$getStudent->class_id);
        return view('admin.fees_collection.add_collect_fees' , $data);
    }


    public function collect_fees_insert($student_id,Request $request)
    {
        $getStudent = User::getSingleClass($student_id);

        $paid_amount= StudentAddFeesModel::getPaidAmount($student_id,$getStudent->class_id);

        if(!empty($request->amount)){
            $RemainingAmount = $getStudent->amount - $paid_amount;
            if($RemainingAmount >= $request->amount)
            {
                $remaining_amount_user = $RemainingAmount - $request->amount;

                $payment = new StudentAddFeesModel;
                $payment->student_id = $student_id;
                $payment->class_id = $getStudent->class_id;
                $payment->paid_amount = $request->amount;
                $payment->total_amount = $RemainingAmount;
                $payment->remaining_amount = $remaining_amount_user;
                $payment->payment_type = $request->payment_type;
                $payment->remark = $request->remark;
                $payment->created_by = Auth::user()->id;
                $payment->is_payment = 1;
                $payment->save();

                return redirect()->back()->with("success","Fees Successfuly Add");
            }
            else{
                return redirect()->back()->with("error","Your Amount is greater Than the Remaining Amount");
            }
        }
        else{
            return redirect()->back()->with("error","Please add a valid amount greater than zero");

        }


    }

    //student side


    public function CollectFeesStudent(Request $request){
        $student_id = Auth::user()->id;
        $data['getFees'] = StudentAddFeesModel::getFees($student_id);
        // dd($data['getFees']);
        $getStudent =User::getSingleClass($student_id);
        $data['getStudent'] = $getStudent;

        $data['header_title'] = "Fees Collection";
        $data['paid_amount'] = StudentAddFeesModel::getPaidAmount(Auth::user()->id,Auth::user()->class_id);
        return view('student.my_fees_collection' , $data);
    }
    public function FeesReceipts(Request $request){
        $student_id = Auth::user()->id;
        $data['getFees'] = StudentAddFeesModel::getFees($student_id);
        // dd($data['getFees']);
        $getStudent =User::getSingleClass($student_id);
        $data['getStudent'] = $getStudent;

        $data['header_title'] = "Fees Receipts";
        $data['paid_amount'] = StudentAddFeesModel::getPaidAmount(Auth::user()->id,Auth::user()->class_id);
        return view('student.my_fees_receipts' , $data);
    }


    public function CollectFeesStudentPayment(Request $request)
    {
        $getStudent = User::getSingleClass(Auth::user()->id);

        $paid_amount= StudentAddFeesModel::getPaidAmount(Auth::user()->id,Auth::user()->class_id);


        if(!empty($request->amount))
        {
            $RemainingAmount = $getStudent->amount - $paid_amount;

            if($RemainingAmount >= $request->amount)
            {

                $remaining_amount_user = $RemainingAmount - $request->amount;

                $payment = new StudentAddFeesModel;
                $payment->student_id = Auth::user()->id;;
                $payment->class_id = Auth::user()->class_id;
                $payment->paid_amount = $request->amount;
                $payment->total_amount = $RemainingAmount;
                $payment->remaining_amount = $remaining_amount_user;
                $payment->payment_type = $request->payment_type;
                $payment->remark = $request->remark;
                $payment->created_by = Auth::user()->id;
                $payment->save();

                $getSetting = SettingModel::getSingle();
               if($request->payment_type == 'Paypal')
               {
                    // $paypalId = $this->paypalId;
                    $query = array();
                    $query['business'] = $getSetting->paypal_email;
                    $query['cmd'] = '_xclick';
                    $query['item_name'] = "Student Fees";
                    $query['no_shipping'] = '1';
                    $query['item_number'] = $payment->id;
                    $query['amount'] = $request->amount;
                    $query['currency_code'] = 'USD';
                    $query['cancel_return'] = url('student/paypal/payment-error');
                    $query['return'] = url('student/paypal/payment-success');
                    $query_string = http_build_query($query);

                    // header('Location:https://www.paypal.com/cga-bin/webscr?',$query_string);
                    header('Location:https:https://www.sandbox.paypal.com/cgi-bin/webscr?'.$query_string);
                    exit();
               }
               elseif($request->patment_type == 'Stripe'){

                $setPublicKey = $getSetting->stripe_key;
                $setApiKey = $getSetting->stripe_secret;

                Stripe::setApiKey($setApiKey);
                $finalprice = $request->amount*100;

                $session = \Stripe\Checkout\Session::create([
                    'customer_email'=>Auth::user()->email,
                    'payment_method_types'=>['card'],
                    'line_items' =>[[
                        'name'=>'Student Fees',
                        'description'=>'Student Fees',
                        'images'=>[ url('assets/img/logo-2x.png')],
                        'amount'=>intval($finalprice),
                        'currency'=>'usd',
                        'quantity'=>1,
                    ]],
                    'success_url' => url('student/stripe/payment-success'),
                    'cancel_url' => url('student/stripe/payment-error'),
                    ]);

                    $data['session_id']=$session['id'];
                    // Session::put('stripe_session_id',$session['id']);
                    $data['setPublicKey'] = $setPublicKey;

               }
               elseif($request->patment_type == 'BankTransfer'){

               }
               elseif($request->patment_type == 'Paypal'){

               }
               elseif($request->patment_type == 'Paystack'){

               }
               elseif($request->patment_type == 'FlutterWave'){

               }

               return redirect()->back()->with("success","Fees Successfuly Add");

            }
            else
            {
                return redirect()->back()->with("error","Your Amount is greater Than the Remaining Amount");

            }


        }
        else
        {
            return redirect()->back()->with("error","Please add a valid amount greater than zero");

        }
        // dd($request->all());
    }


    public function PaymentError(){
        return redirect('student/fees_collection')->with('error',"Due to some error please try Again");
    }


    public function PaymentSuccess(Request $request){
        // dd($request->all());
        if(!empty($request->item_number) && !empty($request->st) && $request->st=='Completed')
        {
            $fees = StudentAddFeesModel::getSingle($request->item_number);
            if(!empty($fees)){
                $fees->is_payment = 1;
                $fees->payment_data = json_encode($request->all());
                $fees->save();
                return redirect('student/fees_collection')->with('success',"your payment is successful");
            }
            else{
                return redirect('student/fees_collection')->with('error',"Due to some error please try again");

            }
        }
        else{
            return redirect('student/fees_collection')->with('error',"Due to some error please try again");

        }

    }
}
