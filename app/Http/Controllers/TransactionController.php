<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PDF;

class TransactionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  Request  $request
     *
     * @return Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    
    public function index()
    {
        $data = Transaction::all();
        
        return view('transaction.index', compact('data'));
    }
    
    public function show(Transaction $transaction)
    {
        $pdf = PDF::loadView('report.transaction', compact('transaction'));
        
        return $pdf->stream('report.pdf');
    }
    
    public function store()
    {
        session_start();
        
        if (request()->product_id) {
            $_SESSION['discount']                        = request()->discount;
            $_SESSION['customer_id']                     = request()->customer_id;
            $selected_product                            = Product::findOrFail(request()->product_id);
            $_SESSION['products'][$selected_product->id] = [
                'id'    => $selected_product->id,
                'name'  => $selected_product->name,
                'price' => $selected_product->price,
                'qty'   => ($_SESSION['products'][$selected_product->id]['qty'] ?? 0) + 1,
            ];
            if (is_array(request()->selected_products)) {
                foreach (request()->selected_products as $k => $val) {
                    if ($k != $selected_product->id) {
                        $_SESSION['products'][$k]['qty'] = $val;
                    }
                }
            }
            
            return redirect(route('transaction.create'));
        }

//        $_SESSION['products'] = request()->all();
        $data = [
            'customer_id' => request()->customer_id,
            'employee_id' => auth()->user()->id,
            'discount'    => request()->discount,
            'cash'        => request()->cash,
            'total'       => request()->total,
        ];
        $data = Transaction::create($data);
        
        $totalprofit = 0;
        foreach (request()->selected_products as $k => $val) {
            $selected_product = Product::find($k);
            $detail           = [
                'qty'        => $val,
                'product_id' => $k,
                'price'      => $selected_product->price,
            ];
            //dd($detail);
            $data->detail()->create($detail);
            $selected_product->qty = $selected_product->qty - $val;
            $selected_product->save();
            $totalprofit += $selected_product->price - $selected_product->original_price;
        }
        $data->profit = $totalprofit;
        $data->save();
        alert()->info('Create is successfully!');
        
        if ($data) {
            return redirect(route('transaction.index'));
        }
        
        return redirect()->back();
    }
    
    public function create()
    {
        session_start();
        
        $customers         = Customer::all();
//        $products          = Product::where('qty', '>', 0)->get();
        $products          = Product::all();
        $selected_products = $_SESSION['products'] ?? [];
        $total             = 0;
        foreach ($selected_products as $item) {
            $total += $item['price'] * $item['qty'];
        }
        
        return view('transaction.create', compact('customers', 'products', 'selected_products', 'total'));
    }
}
