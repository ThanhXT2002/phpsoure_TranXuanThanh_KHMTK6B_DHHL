


@extends('layout.master')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading ">
    <div class="col-lg-8">
        <h2><strong>Thêm mới Sản Phẩm</strong></h2>
        <ol class="breadcrumb " style="margin-boiton:10px">
            <li>
                <a href="/">Dashboard</a>
            </li>
            <li class="active"><strong>Thêm mới Sản Phẩm</strong></li>
        </ol>
    </div>
</div>

@if (session('Note'))
    <div class="alert alert-success">
       {{session('Note')}}
    </div>
@endif

    <form action="{{route('admin.product.insertProduct')}}" method="post" class="box" enctype="multipart/form-data">
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
                                        <label for="" class="control-lable text-right">PID
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <input 
                                        type="text" 
                                        class="form-control"
                                        name="pid"
                                        value="{{old('pid')}}"
                                        autocomplete="off"
                                        >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-lable text-right">Product Name
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <input 
                                        type="text" 
                                        class="form-control"
                                        name="pname"
                                        value="{{old('pname')}}"
                                        autocomplete="off"
                                        >
                                    </div>
                                </div>
                            </div>
    
                            
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-lable text-left">Company
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <input 
                                        type="text" 
                                        class="form-control"
                                        name="company"
                                        value="{{old('company')}}"
                                        autocomplete="off"
                                        >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-lable text-left">Year
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <select class="form-control m-b" name="selectYear" id="">
                                        
                                            @for ($year = 2015; $year <= 2030; $year++) {
                                                <option value="{{$year}}">{{$year}}</option>
                                            }@endfor
                                        
                                        </select>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-lable text-left">Band
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <select class="form-control m-b" name="selectBand" id="">
                                            <option value="telmisartan">telmisartan</option>
                                            <option value="Amoxapine">Amoxapine</option>
                                            <option value="PYRETHRUM">PYRETHRUM</option>
                                            <option value="Oxygen">Oxygen</option>
                                            <option value="Keppra">Keppra</option>
                                        </select>
                                    </div>
                                </div>
    
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Image</label>
                                        <input type="file" class="form-control upload-image" name="img">
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


