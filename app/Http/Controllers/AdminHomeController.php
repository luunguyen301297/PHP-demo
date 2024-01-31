<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    public function index(Request $request)
    {
        $pageSize = 20;

        $currentPage = $request->input('page', 1);

        $countData = DB::table('product_tbl')
            ->where('status', 1)
            ->count('id');

        $totalPages = ceil($countData / $pageSize);

        $productList = DB::table('product_tbl')
            ->where('status', 1)
            ->limit($pageSize)
            ->paginate($pageSize);

        return view('adminHome', [
            'productList' => $productList,
            'totalPages' => $totalPages,
            'currentPage' => $currentPage,
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $pageSize = 20;

        $productList = DB::table('product_tbl')
            ->where('status', 1)
            ->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('id', $query)
                    ->orWhere('name', 'like', '%' . $query . '%')
                    ->orWhere('producer', 'like', '%' . $query . '%');
            })
            ->paginate($pageSize);

        return view('adminHome', [
            'productList' => $productList,
            'currentPage' => $productList->currentPage()]);
    }

    public function showCreateForm()
    {
        return view('createProduct');
    }

    public function store(Request $request)
    {
        $product = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'height' => $request->input('height'),
            'length_col' => $request->input('length_col'),
            'width' => $request->input('width'),
            'base_unit' => $request->input('base_unit'),
            'producer' => $request->input('producer'),
            'quantity' => $request->input('quantity'),
            'status' => 1,
            'created_date' => now(),
            'inserted_by' => $request->input('inserted_by'),
            'updated_date' => now(),
            'updated_by' => ''
        ];

        try {
            DB::table('product_tbl')->insert($product);
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to create the product']);
        }

        return redirect()->route('admin.index')->with('success', 'Product created successfully');
    }

    public function showEditForm(string $id)
    {
        $product = DB::table('product_tbl')->where('id', $id)->first();
        return view('editProduct', ['product' => $product]);
    }

    public function update(Request $request, string $id)
    {
        $updatedProduct = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'height' => $request->input('height'),
            'length_col' => $request->input('length_col'),
            'width' => $request->input('width'),
            'base_unit' => $request->input('base_unit'),
            'producer' => $request->input('producer'),
            'quantity' => $request->input('quantity'),
            'status' => $request->input('status'),
            'updated_date' => now(),
            'updated_by' => $request->input('updated_by'),
        ];

        try {
            DB::table('product_tbl')->where('id', $id)->update($updatedProduct);
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to update the product']);
        }

        return redirect()->route('admin.index')->with('success', 'Product updated successfully');
    }

    public function showRemoveForm(string $id)
    {
        $product = DB::table('product_tbl')->where('id', $id)->first();
        return view('removeProduct', ['product' => $product]);
    }

    public function remove(Request $request, string $id)
    {
        $confirmedId = $request->input('confirmed_id');

        if ($id !== $confirmedId) {
            return redirect()->back()->withErrors(['error' => 'Confirmation ID does not match']);
        }

        try {
            DB::table('product_tbl')->where('id', $id)->update(['status' => 0]);
            return redirect()->route('admin.index')->with('success', 'Product removed successfully');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to remove the product']);
        }
    }

    public function showDeleteForm(string $id)
    {
        $product = DB::table('product_tbl')->where('id', $id)->first();
        return view('deleteProduct', ['product' => $product]);
    }

    public function destroy(Request $request, string $id)
    {
        $confirmedId = $request->input('confirmed_id');

        if ($id === $confirmedId) {
            try {
                DB::table('product_tbl')->where('id', $id)->delete();
            } catch (QueryException $e) {
                return redirect()->back()->withErrors(['error' => 'Failed to delete the product']);
            }

            return redirect()->route('admin.index')->with('success', 'Product deleted successfully');
        }

        return redirect()->back()->withErrors(['error' => 'Confirmation ID does not match']);
    }

    public function sort(Request $request, $field)
    {
        $pageSize = 20;

        $currentPage = $request->input('page', 1);

        $productList = DB::table('product_tbl')
            ->where('status', 1)
            ->orderBy($field)
            ->paginate($pageSize);

        $countData = DB::table('product_tbl')
            ->where('status', 1)
            ->count('id');

        $totalPages = ceil($countData / $pageSize);

        return view('adminHome', [
            'productList' => $productList,
            'totalPages' => $totalPages,
            'currentPage' => $currentPage]);
    }
}
