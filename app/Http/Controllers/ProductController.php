<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;




class ProductController extends Controller
{
    public function List_product(){
        $Product=[

            (object) [
                "pro_name"=> "teadfd",
                "pro_code"=> "test",
                "category_id"=> "1",
                "cur_stock"=> 0,
                "price"=> "1.1",
                "alert"=> "5",
                "unit_id"=> "1",
                "image"=> "20231126095717.jpg"
            ]
           
        ];
        
       
        return response()->json(
            [
                'status' => 'Success',
                'data' => $Product
            ], 200);
    }
    
    public function Create(Request $request)
    {
        // Validate the incoming request data
        $validator = validator($request->all(), [
            'pro_name' => 'required',
            'pro_code' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'alert' => 'required',
            'unit_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['status' => 'Validation Error', 'errors' => $validator->errors()], 422);
        }
    
        // Access validated data
        $input = $request->all();
    
        // Handle file upload
        if ($image = $request->file('image')) {
            $destinationPath = 'asset/product/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        // Mocked user response
        $data = [


            'pro_name' => $productName,
            'image' => $imagePath,
        ];

        return response()->json(['data' => $data, 'message' => 'product created successfully']);
    }
}

            'pro_name' => $input['pro_name'],
            'pro_code' => $input['pro_code'],
            'category_id' => $input['category_id'],
            'cur_stock' => 0,
            'price' => $input['price'],
            'alert' => $input['alert'],
            'unit_id'  => $input['unit_id'],
            'image' => $input['image'],

            'pro_name' => $input['pro_name'],
            'pro_code' => $input['pro_code'],
            'category_id' => $input['category_id'],
            'cur_stock' => 0,
            'price' => $input['price'],
            'alert' => $input['alert'],
            'unit_id'  => $input['unit_id'],
            'image' => $input['image'],
        ];

    
        // Simulate database insertion success
        // You can replace this with your actual database insertion logic
        $isInserted = true;
    
        if ($isInserted) {
            return response()->json(
                [
                    'status' => 'Success',
                    'message' => 'Product created successfully',
                    'data' => $data
                ], 201);
        } else {
            return response()->json(
                [
                    'status' => 'Error',
                    'message' => 'Failed to create product'
                ], 500);
        }
    }

}

}

