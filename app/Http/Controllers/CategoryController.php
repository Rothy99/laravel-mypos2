<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function List_Category(){

        $category=[
            
                (object) [
                    'id' => 1,
                    'cat_id' => 'S001',
                    'cat_name'=>'Soft drink',
                    'desc'=>'testing'
                ],
                (object) [
                    'id' => 2,
                    'cat_id' => 'S002',
                    'cat_name'=>'Coffee',
                    'desc'=>'testing'
                ],
                (object) [
                    'id' => 3,
                    'cat_id' => 'S003',
                    'cat_name'=>'Food',
                    'desc'=>'testing'
                ]
            ];
            
            $data=[
                'data'=>$category
            ];
            return response()->json($data);
        }

}
