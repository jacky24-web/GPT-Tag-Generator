@extends('layouts.app')

@section('content')

<div class="container col-9">
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('enrichement.create') }}" class="btn btn-outline-dark-blue">Create enrichement process</a>
    </div>
    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#generateTags">
        Launch demo modal
      </button> --}}
    <div class="card overflow-hidden" style="border-radius: 10px">
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Process Name</th>
                        <th scope="col">Target Database</th>
                        <th scope="col">Target Table</th>
                        <th scope="col">Target Column</th>
                        <th scope="col">Schedule</th>
                        <th scope="col">Last Run</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Product tag enrichement</td>
                        <td>Commercial DWH</td>
                        <td>D_Products</td>
                        <td>Product_name</td>
                        <td>Weekly</td>
                        <td>18/02/2024</td>
                        <td class="d-flex align-items-center">
                            <a href="{{ route('enrichement.edit') }}" class="btn btn-warning btn-action me-2"><i class="fas fa-edit"></i> </a>
                            <button class="btn btn-danger btn-action ms-1"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Product category enrichement</td>
                        <td>Commercial DWH</td>
                        <td>D_Products</td>
                        <td>Product_name</td>
                        <td>Daily</td>
                        <td>23/02/2024</td>
                        <td class="d-flex align-items-center">
                            <a href="{{ route('enrichement.edit') }}" class="btn btn-warning btn-action me-2"><i class="fas fa-edit"></i> </a>
                            
                            <button class="btn btn-danger btn-action ms-1"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Pack Belgium price</td>
                        <td>Commercial DWH</td>
                        <td>D_Products</td>
                        <td>Pack_name</td>
                        <td>Monthly</td>
                        <td>20/02/204</td>
                        <td class="d-flex align-items-center">
                            <a href="{{ route('enrichement.edit') }}" class="btn btn-warning btn-action me-2"><i class="fas fa-edit"></i> </a>
                            
                            <button class="btn btn-danger btn-action ms-1"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Manufacturer HQ country</td>
                        <td>Commercial DWH</td>
                        <td>D_Manufacturers</td>
                        <td>Manufacturer_name</td>
                        <td>Monthly</td>
                        <td>15/02/2024</td>
                        <td class="d-flex align-items-center">
                            <a href="{{ route('enrichement.edit') }}" class="btn btn-warning btn-action me-2"><i class="fas fa-edit"></i> </a>
                            
                            <button class="btn btn-danger btn-action ms-1"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Hospital size</td>
                        <td>Commercial Staging</td>
                        <td>Hospital</td>
                        <td>Hospital_name</td>
                        <td>Monthly</td>
                        <td>30/01/2024</td>
                        <td class="d-flex align-items-center">
                            <a href="{{ route('enrichement.edit') }}" class="btn btn-warning btn-action me-2"><i class="fas fa-edit"></i> </a>
                            
                            <button class="btn btn-danger btn-action ms-1"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="generateTags" tabindex="-1" aria-labelledby="generateTagsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('store.tags') }}" method="post">
            @csrf
            {{-- <input type="hidden" name="product_id" class="jsHiddenProductId">
            <input type="hidden" name="product_name" class="jsHiddenProductName"> --}}
            <div class="mb-3 row">
                <div class="col-3">
                    <label for="exampleFormControlInput1" class="form-label">Entity</label>
                </div>
                <div class="col-8">
                    <input type="text" name="entity" class="form-control" placeholder="Entity" value="tags" required>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-3">
                    <label for="exampleFormControlInput1" class="form-label">Length</label>
                </div>
                <div class="col-8">
                    <input type="number" name="length" class="form-control" placeholder="Length" value="10" required>
                </div>
            </div>
          
        <div class="modal-footer">
            <button class="btn btn-primary">Generate Tag</button>
        </div> 
          </form>
        </div>
        
      </div>
    </div>
</div>
@endsection
