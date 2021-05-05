<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <title>Check Comparison</title>
  </head>
  <body>
    
    <div class="container">
    	<div class="card shadow">
    		<div class="card-header">
    			<h1>Check Comparison</h1>
    		</div>
    		<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Second</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Company</th>
      <td>{{$check[0]->company->name}}</td>
      <td>{{$check[1]->company->name}}</td>
      
    </tr>
    <tr>
      <th scope="row">Make</th>
      <td>{{$check[0]->make->name}}</td>
      <td>{{$check[1]->make->name}}</td>
      
    </tr>
    <tr>
      <th scope="row">Model</th>
      <td>{{$check[0]->modal->name}}</td>
      <td>{{$check[1]->modal->name}}</td>
    </tr>
     <tr>
      <th scope="row">Body</th>
      <td>{{$check[0]->body->name}}</td>
      <td>{{$check[1]->body->name}}</td>
    </tr>
     <tr>
      <th scope="row">Year</th>
      <td>{{$check[0]->year->year}}</td>
      <td>{{$check[1]->year->year}}</td>
    </tr>
    <tr>
      <th scope="row">Value</th>
      <td>{{$check[0]->valuation}}</td>
      <td>{{$check[1]->valuation}}</td>
    </tr>
  </tbody>
</table>
    	</div>
    </div>

  </body>
</html>