@extends('layouts.app')

@section('content')

    <div class="container col-9">
        <form action="/">
            <div class="row justify-content-between">
                <div class="col-md-5">
                    <h2 class="mb-4">Process Parameters</h2>
                    <div class="form-group mb-3">
                        <label for="enrichment-process-name">Enrichment Process Name</label> 
                        <input type="text" class="form-control" id="enrichment-process-name" placeholder="Product tag enrichment"> 
                   </div>
                   <div class="form-group mb-3"> 
                       <label for="enrichment-process-prompt" placeholder="Product enrichment tags">Enrichment GPT prompt</label> 
                       <input type="text" class="form-control" id="enrichment-process-prompt" placeholder="product tags relevant for the Belgian market">
                   </div>
                   <div class="form-group mb-3"> 
                       <label for="enrichment-process-results">Enrichment results</label> 
                       <input type="text" class="form-control" id="enrichment-process-prompt" placeholder="10">
                   </div>
                   <div class="form-group mb-3"> 
                       <label for="first-occurence">First Occurence</label> 
                       <input type="date" class="form-control" id="first-occurence"> 
                   </div>
                   <div class="form-group mb-3"> 
                       <label for="occurence-frequency">Occurence Frequency</label> 
                       <select class="form-control" id="occurence-frequency">
                           <option value="daily">Daily</option>
                           <option value="weekly">Weekly</option>
                           <option value="monthly">Monthly</option>
                           <option value="yearly">Yearly</option>
                       </select> 
                   </div>
                </div>
                <div class="col-md-5">
                    <h2 class="mb-4">Process Details</h2>
                    <div class="form-group mb-3"> 
                        <label for="database">Database</label> 
                        <select class="form-control" id="database">
                            <option value="commercial-datawarehouse">Commercial Datawarehouse</option>
                            <option value="commercial-staging">Commercial Staging</option>
                        </select> 
                    </div>
                    <div class="form-group mb-3"> 
                        <label for="table-name">Table Name</label> 
                        <input type="text" class="form-control" id="table-name" placeholder="products"> 
                    </div>
                    <div class="form-group mb-3"> 
                        <label for="target-column">Target Column</label> 
                        <input type="text" class="form-control" id="target-column" placeholder="product_name">
                    </div>
                    <div class="form-group mb-3"> 
                        <label for="table-id">Table ID</label> 
                        <input type="text" class="form-control" id="table-id" placeholder="product_id"> </div> 
                    </div>
                
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-light-blue btn-lg btn-block mt-5 col-5">Update</button>
            </div>
            
        </form>
    </div>

@endsection