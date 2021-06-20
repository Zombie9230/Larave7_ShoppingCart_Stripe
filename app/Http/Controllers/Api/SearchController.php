<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    private function makeJson($status, $data = null, $msg = null)
    {
        //轉 JSON 時確保中文不會變成 Unicode
        return response()->json(['status' => $status, 'data' => $data, 'message' => $msg])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    //取得所有工作
    public function index()
    {
        $products = Product::where('enabled', true)->get();
        return $this->makeJson(1, $products);
    }

    //新增一筆工作
    public function store(Request $request)
    {
        $data = $request->only(['title', 'salary', 'desc', 'enabled', 'pic']);
        $product = Product::create($data);
        if (isset($Product)) {
            return $this->makeJson(1, $product);
        } else {
            return $this->makeJson(0, null, '工作新增失敗');
        }
    }

    //取得一筆工作
    public function show($id)
    {
        $product = Product::find($id);
        if (isset($product)) {
            return $this->makeJson(1, $product);
        } else {
            return $this->makeJson(0, null, '找不到此工作');
        }
    }

    //更新一筆工作
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (isset($product)) {
            $row = $product->update($request->only(['title', 'salary', 'desc', 'enabled', 'pic']));
            if ($row == 1) {
                return $this->makeJson(1, null, '工作更新成功');
            } else {
                return $this->makeJson(0, null, '工作更新失敗');
            }
        } else {
            return $this->makeJson(0, null, '找不到此工作');
        }
    }

    //刪除一筆工作
    public function destroy($id)
    {
        $product = Product::find($id);
        $row = $product->delete();
        if ($row == 1) {
            return $this->makeJson(1, null, '工作刪除成功');
        } else {
            return $this->makeJson(0, null, '工作刪除失敗');
        }
    }

    public function search(Request $request)
    {
        $products = Product::where('enabled', true)->where('title', 'like', '%' . $request->s . '%')->orderBy('created_at', 'asc')->get();
        if ($products && count($products) > 0) {
            return $this->makeJson(1, $products);
        } else {
            return $this->makeJson(0, null, '找不到工作資料');
        }
    }
}
