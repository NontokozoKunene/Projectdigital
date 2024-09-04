$(document).ready(function() {
    loadSales();

    // Add new sale
    $('#addSaleForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: 'create.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert(response);
                loadSales();
                $('#addSaleForm')[0].reset();
            }
        });
    });

    // Load all sales
    function loadSales() {
        $.ajax({
            url: 'read.php',
            type: 'GET',
            success: function(data) {
                let sales = JSON.parse(data);
                let salesHtml = '';

                for (let sale of sales) {
                    salesHtml += `<tr>
                                    <td>${sale.pub_name}</td>
                                    <td>${sale.beer_name}</td>
                                    <td>${sale.quantity_sold}</td>
                                    <td>${sale.sale_date}</td>
                                    <td>
                                        <button onclick="editSale(${sale.id})">Edit</button>
                                        <button onclick="deleteSale(${sale.id})">Delete</button>
                                    </td>
                                  </tr>`;
                }

                $('#salesData').html(salesHtml);
            }
        });
    }

    // Delete sale
    window.deleteSale = function(id) {
        if (confirm('Are you sure you want to delete this sale?')) {
            $.ajax({
                url: 'delete.php',
                type: 'POST',
                data: { id: id },
                success: function(response) {
                    alert(response);
                    loadSales();
                }
            });
        }
    };

    
    window.editSale= function(id) {
        // Your edit sale logic here
        // For example, load the sale data for the given ID into a form for editing

        $('#editSaleModal').modal('show')

        $('#saveChangesButton').on('click', function() 
        {
   
           const saleId = id
   
           console.log("TIME ID", saleId)
           // Logic to save changes
           // You might want to send an AJAX request here to save changes to the server
           // For example:
           $.ajax({
               url: 'update.php',  // Replace with your server-side script to update sale details
               type: 'POST',
               data: $('#editSaleForm').serialize()  + '&id=' + saleId,
                // Serialize form data
               success: function(response) {
                   console.log("Sale updated successfully", response);
                   // Hide the modal after saving
                   $('#editSaleModal').modal('hide');
                   // Optionally, refresh your data or update the UI
               },
               error: function(error) {
                   console.log("Error updating sale", error);
               }
           });
       });

    //     $('#editSaleModa').on('submit', function(e) {

    //     // $.ajax({
    //     //     url: 'update',  // A PHP file to get sale details by ID
    //     //     type: 'GET',
    //     //     data: { id: id },
    //     //     success: function(data) {
    //     //         const sale = JSON.parse(data);
    //     //         // Fill the form fields with the sale data for editing
    //     //         $('#pub_name').val(sale.pub_name);
    //     //         $('#beer_name').val(sale.beer_name);
    //     //         $('#quantity_sold').val(sale.quantity_sold);
    //     //         $('#sale_date').val(sale.sale_date);
    //     //         // Optionally show a modal or edit form
    //     //         //$('#editSaleModal').modal('show'); // Assuming you're using Bootstrap
    //     //     }
    //     // });  
    
    // });
     }
    
     $('#saveChangesButton').on('click', function() 
     {

        const saleId = $('#editSaleModal').data('sale-id');

        console.log("TIME ID", saleId)
        // Logic to save changes
        // You might want to send an AJAX request here to save changes to the server
        // For example:
        $.ajax({
            url: 'update.php',  // Replace with your server-side script to update sale details
            type: 'POST',
            data: $('#editSaleForm').serialize(),
             // Serialize form data
            success: function(response) {
                console.log("Sale updated successfully", response);
                // Hide the modal after saving
                $('#editSaleModal').modal('hide');
                // Optionally, refresh your data or update the UI
            },
            error: function(error) {
                console.log("Error updating sale", error);
            }
        });
    });
    
});
