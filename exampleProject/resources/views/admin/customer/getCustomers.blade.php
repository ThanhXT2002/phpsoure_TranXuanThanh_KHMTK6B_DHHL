@extends('layout.master')
@section('content')

<div class="wrapper wrapper-content  fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5 class="text-uppercase">Customer List</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a class="changeStatusAll" data-value="2"  data-field ="status" data-model='' >Active toàn bộ</a>
                        </li>
                        <li><a class="changeStatusAll" data-value="1" data-field ="status" data-model='' >Unactive toàn bộ</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
               {{-- {% include 'account/department/component/filter.html' %} --}}
               <form method="GET" action="{{ route('admin.customer.getCustomer') }}">
                <div class="filter-wrapper">
                    <div class="uk-flex uk-flex-middle uk-flex-space-between">
                        <div class="input-group">
                            <input 
                                type="text"
                                name = "keyword"
                                value="{{ request('keyword') ?: old('keyword') }}"
                                placeholder="Nhập từ khóa........"
                                class="form-control" >
                            <span class="input-group-btn">
                                 <button type="submit" name="search" value="search" class="btn btn-success mb0 btn-xl mr10">
                                        Tìm kiếm
                                </button>
                            </span>
                        </div>
                        <div class="action text-right">
                            <div class="uk-flex uk-flex-middle">
                                <a href="{{ route('admin.customer.inseartCustomer')}}" class="btn btn-danger"><i class="fa fa-plus mr5"></i>Thêm mới customer</a>       
                            </div>
                        </div>
                    </div>
                </div>
            </form>
               <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">CID</th>
                        <th class="text-center">CName</th>
                        <th class="text-center">CEMAIL</th>
                        <th class="text-center">ADDRESS</th>
                        <th class="text-center">PHONE</th>
                        <th class="text-center">FUNCTION</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($customers->isEmpty())
                                <tr>
                                    <td colspan="7" class="text-center">Không tìm thấy khách hàng nào.</td>
                                </tr>
                            @else
                    @foreach($customers as $customer)
                        <tr>
                            <td class="text-center">{{ $customer->id }}</td>
                            <td class="text-center">{{ $customer->cid }}</td>
                            <td class="text-center">{{ $customer->cname }}</td>
                            <td class="text-center">{{ $customer->cemail }}</td>
                            <td class="text-center">{{ $customer->address }}</td>
                            <td class="text-center">{{ $customer->phone }}</td>
                            <td class="text-center" width="100px"> 
                                <a href="{{route('admin.customer.editCustomer', $customer->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                <a href="{{route('admin.customer.deleteCustomer', $customer->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection