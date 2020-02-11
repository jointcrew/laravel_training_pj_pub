<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Category;
use App\Train;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    const BILL_TO = '0';
    const CATEGORY = '1';
    const WAY = '2';
    
    public function __construct()
    {
        $this->middleware('auth')-> except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expense = Expense::all();
        return view('index', ['expense' => $expense]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bill_to = Category::where('type', self::BILL_TO)->pluck('name', 'id');
        $categories = Category::where('type', self::CATEGORY)->pluck('name', 'id');
        $way = Category::where('type', self::WAY)->pluck('name', 'id');
        return view('new', ['bill_to' => $bill_to, 'categories' => $categories, 'way' => $way]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $train = new Train;

        $train->from = request('from');
        $train->to = request('to');
        $train->way = request('way');
        $train->save();

        $expense = new Expense;
        $user = \Auth::user();

        $expense->bill_to = request('bill_to');
        $expense->purpose = request('purpose');
        $expense->sub_total = request('sub_total');
        $expense->total = 0;
        $expense->category_id = request('category_id');
        $expense->user_id = $user->id;
        $expense->train_id = $train->id;
        $expense->save();
        return redirect()->route('expense.detail', ['id' => $expense->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense, $id)
    {
        $expense = Expense::find($id);
        $user = \Auth::user();
        if ($user) {
          $login_user_id = $user->id;
        } else {
          $login_user_id = '';
        }
        $bill_to = Category::where('type', self::BILL_TO)->pluck('name', 'id');
        
        return view('show', ['expense' => $expense, 'login_user_id' => $login_user_id, 'bill_to' => $bill_to[$expense->bill_to]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense, $id)
    {
        $expense = Expense::find($id);
        $from = $expense->train->from;
        $to = $expense->train->to;
        $bill_to = Category::where('type', self::BILL_TO)->pluck('name', 'id');
        $categories = Category::where('type', self::CATEGORY)->pluck('name', 'id');
        $way = Category::where('type', self::WAY)->pluck('name', 'id');
        return view('edit', ['expense' => $expense, 'bill_to' => $bill_to, 'from' => $from, 'to' => $to, 'categories' => $categories, 'way' => $way]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense, $id)
    {
        $expense = Expense::find($id);
        $train = Train::find($expense->train_id);
        $train->from = request('from');
        $train->to = request('to');
        $train->way = request('way');
        $train->save();

        $user = \Auth::user();
        $expense->bill_to = request('bill_to');
        $expense->purpose = request('purpose');
        $expense->sub_total = request('sub_total');
        $expense->total = 0;
        $expense->category_id = request('category_id');
        $expense->user_id = $user->id;
        $expense->train_id = $train->id;
        $expense->save();
        return redirect()->route('expense.detail', ['id' => $expense->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense, $id)
    {
        $expense = Expense::find($id);
        $expense->delete();
        return redirect('/expense');
    }
}
