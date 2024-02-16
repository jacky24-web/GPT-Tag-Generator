@extends('layouts.app')

@section('content')

<div class="container col-9 products">
    <div class="d-flex justify-content-end mb-4">
        <button type="button" class="btn btn-outline-dark-blue" data-bs-toggle="modal" data-bs-target="#generateTags">Generate Tags</button>
    </div>
    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#generateTags">
        Launch demo modal
      </button> --}}
    <div class="card overflow-hidden" style="border-radius: 10px">
        <div class="card-body p-0">
           
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Sales</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($products->isNotEmpty())
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category }}</td>
                            <td>{{ $product->sales }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-dark-blue jsGetProductTagsBtn" data-id="{{$product->id}}">Show Tags</button>

                                <button type="button" class="btn btn-dark-blue jsGenrateTagsBtn" data-id="{{$product->id}}" data-name="{{$product->name}}">
                                    Get Tags
                                </button>
                            </td>
                            {{-- <td> --}}
                                {{-- <form action="{{ route('store.tags', $product->name) }}" method="post">
                                    @csrf
                                    <button class="btn btn-primary">Get Tags</button>
                                </form> --}}
        
                                {{-- <button type="button" class="btn btn-primary jsGenrateTagsBtn" data-id="{{$product->id}}" data-name="{{$product->name}}">
                                    Get Tags
                                </button> --}}
                            {{-- </td> --}}
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

        </div>
    </div>
   
    <div class="mt-3">
        {{ $products->links() }}
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

<div class="modal fade" id="generateSingleProductTags" tabindex="-1" aria-labelledby="generateTagsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('store.product.tags') }}" method="post">
            @csrf
            <input type="hidden" name="product_id" class="jsHiddenProductId">
            <input type="hidden" name="product_name" class="jsHiddenProductName">
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

<div class="modal fade" id="showTagsModal" tabindex="-1" role="dialog" aria-labelledby="tagsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tagsModalLabel">Tags for Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               
            </div>
            <div class="modal-body">
                <!-- Content will be dynamically loaded here -->
            </div>
        </div>
    </div>
</div>

@push('after-scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
            $('.jsGenrateTagsBtn').on('click',function(){
                var productName = $(this).attr('data-name');
                var productId = $(this).attr('data-id');

                $('.jsHiddenProductId').val(productId);
                $('.jsHiddenProductName').val(productName);
                $('#generateSingleProductTags').modal('show');
            });

            $('.jsGetProductTagsBtn').on('click',function(){
                
                var productId = $(this).attr('data-id');
                $.ajax({
                url: '/product/' + productId + '/tags',
                type: 'GET',
                success: function(response) {
                    // Assuming response.tags is an array of tag names
                    var tagNames = response.tags;

                    // Display tags in modal body
                    var modalBody = $('#showTagsModal').find('.modal-body');
                    modalBody.empty(); // Clear previous content

                    if (tagNames.length > 0) {
                        // Append each tag name to modal body
                        $.each(tagNames, function(index, tagName) {
                            modalBody.append('<span class="badge rounded-pill bg-primary me-2 fs-6 mb-2 text-wrap">' + tagName + '</span>');
                        });
                    } else {
                        modalBody.append('<p>No tags available for this product.</p>');
                    }

                    // Show the modal
                    $('#showTagsModal').modal('show');
                },
                error: function(error) {
                    console.log(error);
                    // Handle error if needed
                }
            });
            });
        });
    </script>
    
@endpush

@endsection



{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
   

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
<script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="">
</body>
</html> --}}