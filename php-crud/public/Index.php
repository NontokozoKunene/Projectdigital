<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beer Sales Management</title>
    <style>
        .center-text {
            text-align: center;
        }
        
    </style>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="scripts.js"></script>
</head>
<h1 class="center-text">Beer Sales Management</h1>
<body>


    <!-- Form to Create and Update Sales -->
    <h2>Add Sale</h2>
    <form id="salesForm">
    <label for="pub_id">Pub:</label>
    <select id="pub_id" name="pub_id" required>
        <!-- Options will be populated by JavaScript -->
    </select>

    <label for="beer_id">Beer:</label>
    <select id="beer_id" name="beer_id" required>
        <!-- Options will be populated by JavaScript -->
    </select>

    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" required>

    <input type="hidden" id="sale_id" name="sale_id">
    <button type="submit">Save Sale</button>
</form>


    <!-- Display Sales Data -->
    <h2>Sales Record</h2>
    <table id="salesTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pub</th>
                <th>Beer</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            
            <!-- Sales data will be populated by JavaScript -->
        </tbody>
    </table>
    
  </div>
  <div class="modal fade" id="editSaleModal" tabindex="-1" role="dialog" aria-labelledby="editSaleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editSaleModalLabel">Edit Sale</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Form to edit sale details -->
          <form id="editSaleForm">
            <div class="form-group">
              <label for="pub_name">Pub Name</label>
              <input type="text" class="form-control" id="pub_name" name="pub_name" required>
            </div>
            <div class="form-group">
              <label for="beer_name">Beer Name</label>
              <input type="text" class="form-control" id="beer_name" name="beer_name" required>
            </div>
            <div class="form-group">
              <label for="quantity_sold">Quantity Sold</label>
              <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <!--<div class="form-group">
              <label for="sale_date">Sale Date</label>
              <input type="date" class="form-control" id="sale_date" name="sale_date" required>
            </div>-->
            <!-- Additional fields as needed -->
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="saveChangesButton">Save changes</button>
        </div>
      
    </div>
    </div>
</body>
</html>
