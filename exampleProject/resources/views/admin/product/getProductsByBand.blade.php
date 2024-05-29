@extends('layout.master')

@section('content')
<div class="wrapper wrapper-content  fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Form Search</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <form action="{{route('admin.product.getProductsByBand')}}" method="get">
                        <input type="hidden" name ="_token" value="{{csrf_token()}}">
                        <div class="col-sm-12">
                            <label class="control-label">Search By Band</label>
                            <select class="form-control m-b" name="selectBand" id="">
                                <option value="telmisartan">telmisartan</option>
                                <option value="Amoxapine">Amoxapine</option>
                                <option value="PYRETHRUM">PYRETHRUM</option>
                                <option value="Oxygen">Oxygen</option>
                                <option value="Keppra">Keppra</option>
                            </select>
                        </div>
                        <div>
                            <button class="btn btn-primary m-l-sm" name="btnSearch" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="ibox-content">
               <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">PID</th>
                        <th class="text-center">Product Name</th>
                        <th class="text-center">Company</th>
                        <th class="text-center">Year</th>
                        <th class="text-center">Band</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Function</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="text-center">{{ $product->pid }}</td>
                            <td class="text-center">{{ $product->pname }}</td>
                            <td class="text-center">{{ $product->company }}</td>
                            <td class="text-center">{{ $product->year }}</td>
                            <td class="text-center">{{ $product->band }}</td>
                            <td class="text-center" width="100px">
                                <img src="{{ $product->pimage }}" alt="Image Product" width="20px">
                            </td>
                            <td class="text-center" width="100px"> 
                                <a href="admin/updateProduct/{{$product->pid}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                <a href="admin/deleteProduct/{{$product->pid}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

@endsection