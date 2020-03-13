<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

   		<link rel="icon" href="https://cdn4.iconfinder.com/data/icons/logos-3/256/laravel-512.png">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <style>
          tr:hover td, tr:hover th {
            background-color: #5bc0de;
          }
        </style>
    </head>
    <body>
        <div class="container-fluid py-5">

            <div class="row">
                <div class="col-10 col-sm-10 mx-auto">
                    <div class="card mt-3 mb-3">
                        <div class="card-header bg-info text-white"> PRODUCT [ENDPOINTS]</div>
                        <div class="card=body p-2">
                          <div style="overflow-x:auto;">
                              <table class="table text-center" style="width:1500px;">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Function</th>
                                      <th scope="col">Parameters</th>
                                      <th scope="col">Method</th>
                                      <th scope="col">URL</th>
                                      <th scope="col">Description</th>
                                      <th scope="col">Return</th>
                                      <th scope="col"> Request Parameters</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <th scope="row">1</th>
                                      <td>index</td>
                                      <td>N/A</td>
                                      <td>GET</td>
                                      <td><a href="http://localhost:8000/product">http://localhost:8000/product</a></td>
                                      <td>Display a listing of the resource</td>
                                      <td>list of resources</td>
                                      <td>N/A</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">2</th>
                                      <td>list</td>
                                      <td>Request</td>
                                      <td>POST</td>
                                      <td><a href="http://localhost:8000/product/list">http://localhost:8000/product/list</a></td>
                                      <td>Display a custom listing of the resource filtered by entries </td>
                                      <td>list of resources</td>
                                      <td>category,product,pagination</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">3</th>
                                      <td>store</td>
                                      <td>Request</td>
                                      <td>POST</td>
                                      <td><a href="http://localhost:8000/product">http://localhost:8000/product</a></td>
                                      <td>Store a newly created resource in storage</td>
                                      <td>simple confirmation</td>
                                      <td>Undefined</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">4</th>
                                      <td>create</td>
                                      <td>N/A</td>
                                      <td>GET</td>
                                      <td><a href="http://localhost:8000/product/create">http://localhost:8000/product/create</a></td>
                                      <td>Show the form for creating a new resource</td>
                                      <td>N/A</td>
                                      <td>N/A</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">5</th>
                                      <td>edit</td>
                                      <td>id</td>
                                      <td>GET</td>
                                      <td><a href="http://localhost:8000/product/1/edit">http://localhost:8000/product/{id}/edit</a></td>
                                      <td>Show the form for editing the specified resource.</td>
                                      <td>N/A</td>
                                      <td>N/A</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">6</th>
                                      <td>update</td>
                                      <td>Request, id</td>
                                      <td>PUT</td>
                                      <td><a href="http://localhost:8000/product/1">http://localhost:8000/product/{id}</a></td>
                                      <td>Update the specified resource in storage</td>
                                      <td>simple confirmation</td>
                                      <td>Undefined</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">7</th>
                                      <td>show</td>
                                      <td>id</td>
                                      <td>GET</td>
                                      <td><a href="http://localhost:8000/product/1">http://localhost:8000/product/{id}</a></td>
                                      <td>Display the specified resource</td>
                                      <td>resource</td>
                                      <td>N/A</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">8</th>
                                      <td>destroy</td>
                                      <td>id</td>
                                      <td>DELETE</td>
                                      <td><a href="http://localhost:8000/product/1">http://localhost:8000/product/{id}</a></td>
                                      <td>Remove the specified resource from storage</td>
                                      <td>simple confirmation</td>
                                      <td>N/A</td>
                                    </tr>
                                  </tbody>
                                </table>
                          	</div>
                    	</div>
                    </div>
                </div>                    
            </div>
            
            <div class="row">
                <div class="col-10 col-sm-10 mx-auto">
                    <div class="card mt-3 mb-3">
                        <div class="card-header bg-info text-white"> PRODUCT.LIST [LIST CALL EXAMPLE IN VUE.JS]</div>
                        <div class="card-body m-2 py-3 bg-dark text-white rounded">
                            <div> 
    							<br/>
    							<div> axios({ </div>
    							<div> method: 'post', </div>
    							<div> url : 'http://localhost:8000/product', </div>
    							<div> data : {category : var1, product: var2, pagination: var3} </div>
    							<div> }) </div>
           						<div> .then((response) => { </div>
    							<div> console.log(response) </div>
    							<div> }); </div>   
    							<br/>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>


</html>
