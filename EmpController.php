<?php

namespace App\Http\Controllers;

use App\Models\Emp;
use App\Models\Project;

use Illuminate\Http\Request;

class EmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emps = Emp::latest()->paginate(5);
        $project=Project::all();

        return view('emps.index',compact('emps','project'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $project=Project::all();
        $emp=Emp::all();

        //return view('emps.create', compact('departments','student'));
        return view('emps.create',compact('emp','project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'department' => 'required',
            'salary' => 'required',
            'target' => 'required',
            'projectid' => 'required',


        ]);
        $emps                = new Emp;
        $emps->department    = $request->department;
        $emps->salary        = $request->salary;
        $emps->target        = $request->target;
        $emps->projectid     = $request->projectid;
        $emps->save();

        return redirect()->route('emps.index')
                         ->with('success','Employee has been created successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emp  $emp
     * @return \Illuminate\Http\Response
     */
    public function show(Emp $emp)
    {
        $project=Project::all();
        return view('emps.show',compact('emp','project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emp  $emp
     * @return \Illuminate\Http\Response
     */
    public function edit(Emp $emp)
    {
        $project=Project::all();
        return view('emps.edit',compact('emp','project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Emp  $emp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'department' => 'required',
            'salary' => 'required',
            'target' => 'required',
            'projectid' => 'required',
        ]);

        $emps                =  Emp::find($id);
        $emps->department    = $request->department;
        $emps->salary        = $request->salary;
        $emps->target        = $request->target;
        $emps->projectid     = $request->projectid;
        $emps->save();

        // $emp->update($request->all());

        return redirect()->route('emps.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emp  $emp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emp $emp)
    {
        $emp->delete();

        return redirect()->route('emps.index')
                        ->with('success','Product deleted successfully');
    }
}

// <?php

// namespace App\Http\Controllers;

// use App\Models\Product;
// use Illuminate\Http\Request;

// class ProductController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {
//         $products = Product::latest()->paginate(5);

//         return view('products.index',compact('products'))
//             ->with('i', (request()->input('page', 1) - 1) * 5);
//     }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         return view('products.create');
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         $request->validate([
//             'name' => 'required',
//             'detail' => 'required',
//         ]);

//         Product::create($request->all());

//         return redirect()->route('products.index')
//                         ->with('success','Product created successfully.');
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
//     public function show(Product $product)
//     {
//         return view('products.show',compact('product'));
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
//     public function edit(Product $product)
//     {
//         return view('products.edit',compact('product'));
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, Product $product)
//     {
//         $request->validate([
//             'name' => 'required',
//             'detail' => 'required',
//         ]);

//         $product->update($request->all());

//         return redirect()->route('products.index')
//                         ->with('success','Product updated successfully');
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy(Product $product)
//     {
//         $product->delete();

//         return redirect()->route('products.index')
//                         ->with('success','Product deleted successfully');
//     }
// }
