


@extends('layout.master')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading ">
    <div class="col-lg-8">
        <h2><strong>Xóa khách hàng</strong></h2>
        <ol class="breadcrumb " style="margin-boiton:10px">
            <li>
                <a href="/">Dashboard</a>
            </li>
            <li class="active"><strong>Xóa khách hàng</strong></li>
        </ol>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{route('admin.customer.destroyCustomer', $customer->id)}}" method="post" class="box">
        @csrf
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="text-right mb15">
                <button  type="submit" class="btn btn-info "><i class="fa fa-plus mr5"></i>Lưu lại</button>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-desription"><p>Nhập thông tin của người sử dụng</p>
                        <p>Lưu ý: Những trường đánh dấu <span class="text-danger">(*)</span> là bắt buộc</p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-lable text-right">CID
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <input 
                                        type="text" 
                                        class="form-control"
                                        name="cid"
                                        value="{{ old('cid', isset($customer) ? $customer->cid : '') }}"
                                        placeholder="nhập thông tin khách hàng"
                                        autocomplete="off"
                                        >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-lable text-right">Tên khách hàng
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <input 
                                        type="text" 
                                        class="form-control"
                                        name="cname"
                                        value="{{ old('cname', isset($customer) ? $customer->cname : '') }}"
                                        placeholder="nhập thông tin khách hàng"
                                        autocomplete="off"
                                        >
                                    </div>
                                </div>
                            </div>
                           
    
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-lable text-right">Email
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <input 
                                        type="Email" 
                                        class="form-control"
                                        name="cemail"
                                        value="{{ old('cemail', isset($customer) ? $customer->cemail : '') }}"
                                        placeholder="nhập thông tin khách hàng"
                                        autocomplete="off"
                                        >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-lable text-left">Phone
                                        </label>
                                        <input 
                                        type="number" 
                                        class="form-control"
                                        name="phone"
                                        value="{{ old('phone', isset($customer) ? $customer->phone : '') }}"
                                        autocomplete="off"
                                        placeholder="Nhập ảnh số điện thoại khách hàng"
                                        >
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb15">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <label for="" class="control-lable text-left">Địa chỉ
                                        </label>
                                        <input 
                                        type="text" 
                                        class="form-control"
                                        name="address"
                                        value="{{ old('address', isset($customer) ? $customer->address : '') }}"
                                        placeholder="Nhập ảnh địa chỉ khách hàng"
                                        autocomplete="off"
                                        >
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </form>
@endsection


