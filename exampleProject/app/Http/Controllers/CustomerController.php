<?php

namespace App\Http\Controllers;
use App\Models\CustomerModel;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function getCustomers(Request $request){
        // $customers = CustomerModel::all();
        // return view('admin.customer.getCustomers',
        // ['customers'=>$customers]);
        $search = $request->query('keyword');

        if ($search) {
            $customers = CustomerModel::where('cname', 'like', '%' . $search . '%')
            ->orWhere('cemail', 'like', '%' . $search . '%')
            ->orWhere('address', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->get();
        } else {
            $customers = CustomerModel::all();
        }

        return view('admin.customer.getCustomers', [
            'customers' => $customers
        ]);

    }

    public function insertCustomer(){
        return view('admin.customer.insertCustomer');
    }


    public function createCustomer(StoreCustomerRequest $request)
    {
        // Lấy tất cả dữ liệu đã validate
        $validated = $request->validated();

        // Tạo mới khách hàng
        CustomerModel::create($validated);

        // Chuyển hướng về trang danh sách khách hàng hoặc bất kỳ trang nào bạn muốn
        return redirect()->route('admin.customer.getCustomer')->with('success', 'Khách hàng đã được thêm thành công!');
    }

    function editCustomer($id){
        $customer = CustomerModel::where('id',$id)->first();
        return view('admin.customer.editCustomer', ['customer' => $customer]);
    }

    public function updateCustomer(UpdateCustomerRequest $request, $id)
    {
        $validated = $request->validated();
        $customer = CustomerModel::find($id);
        $customer->update($validated);

        return redirect()->route('admin.customer.getCustomer')->with('success', 'Khách hàng đã được cập nhật thành công!');
    }

    function deleteCustomer($id){
        $customer = CustomerModel::where('id',$id)->first();
        return view('admin.customer.deleteCustomer', ['customer' => $customer]);
    }

    public function destroyCustomer($id)
    {
        // Xóa khách hàng theo id
        CustomerModel::destroy($id);
        return redirect()->route('admin.customer.getCustomer')->with('success', 'Khách hàng đã được xóa thành công!');
    }
}
