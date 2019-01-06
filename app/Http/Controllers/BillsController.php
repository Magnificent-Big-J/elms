<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bills;
use Auth;
use App\documents;
use App\User;
use Illuminate\Support\Facades\Session;
class BillsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){


        return view('management.bills');

    }
    public function mybills(){
        return view('residence.mybills');
    }
    public function update(Request $request){

    }
    public function store(Request $request){

        $bill = new Bills();

        $user = User::find($request->id);
        if($request->hasFile('bill_file')) {
            $doc_file = $request->file('bill_file');
            $bill_file = $this->additional_filename($user->name) . $doc_file->getClientOriginalName();
            $doc_file->move("bills/",$bill_file);
            $document = documents::create([
                'user_id'=>Auth::id(),
                'document_type_id'=>4,
                'file_path'=>$bill_file,
                'date_uploaded'=>\Carbon\Carbon::now()

            ]);
        }

        $bill->user_id = $user->id;
        $bill->document_id = $document->id;
        $bill->amount = $request->amount;
        $bill->	bill_month = $request->bill_date;
        $bill->save();

        return 'Bill uploade';
    }
    public function user_bills(){
        return Bills::MyBills()->get();
    }
    public function get_bills(){
        $bills = Bills::with('user')->get();

        return $bills;

    }
    protected function additional_filename($name){
        return $name.'_'.time();
    }
    protected function get_mybill($id){

        $bill = Bills::find($id);

        $document = documents::find($bill->document_id);
        return './bills/'. $document->file_path;
    }
    public function accept_bill_payemnt(){
        $bills = Bills::with('user')->where('status','unpaid')->get();
        return view('management.accept_bill',compact('bills'));
    }
    public function get_res_bills(){
        return Bills::with('user')->where('status','unpaid')->get();
    }
    public function bill_received($id){

        $bill = Bills::find($id);
        $bill->status = 'paid';
        $bill->save();
        Session::flash('success','Payment Received');

        return redirect()->back();
        //return ['message'=>'Payment Received'];
    }
    public function bill_history(){
        $bills = Bills::with('user')->paginate(10);
        return view('management.bill_history',compact('bills'));
    }

}
