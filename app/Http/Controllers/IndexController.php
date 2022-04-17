<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Jobs\NotificationJob;

class IndexController extends Controller
{

    public function index()
    {
        $products = Product::where("status","available")->orderBy("id")->get();

        return view("index",compact("products"));
    }

    public function add (Request $request)
    {
        if ($request->isMethod("post")){

            $rules=[
                'article'=>['required','min:10',"alpha_num","unique:products"],
                'name'=>['required','min:10'],
            ];

            $this->validate($request,$rules);

            Product::create(
                [
                    "article" => $request->article,
                    "name" => $request->name,
                    "status" => $request->status,
                    "data" => json_encode([$request->color,$request->size]),
                ]
            );

            NotificationJob::dispatch();

            return redirect()->back();
        }

        $alls = Product::where("status","available")->orderBy("id")->get();

        return view("add",compact("alls"));
    }

    public function edit ($id,Request $request)
    {
        if ($request->isMethod("post")){

            $rules=[
                'article'=>['required','min:10',"alpha_num"],
                'name'=>['required','min:10'],
            ];

            $this->validate($request,$rules);

            Product::where("id",$id)->update(
                [
                    "article" => $request->article,
                    "name" => $request->name,
                    "status" => $request->status,
                    "data" => json_encode([$request->color,$request->size]),
                ]
            );

            return redirect("/");
        }

        $rec = Product::find($id);

        return view("edit",compact("rec"));
    }

    public function del ($id)
    {
        Product::find($id)->delete();

        return redirect()->back();
    }
}
