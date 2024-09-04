$(document).ready(function () {
    // Function to populate Pub and Beer dropdowns
    function populateDropdowns() {
        $.ajax({
            url: 'get_options.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                let pubOptions = '';
                let beerOptions = '';
                

                $.each(data.pubs, function (index, pub) {
                    pubOptions += `<option value="${pub.id}">${pub.name}</option>`;
                });

                $.each(data.beers, function (index, beer) {
                    beerOptions += `<option value="${beer.id}">${beer.name}</option>`;
                });

                $('#pub_id').html(pubOptions);
                $('#beer_id').html(beerOptions);
            }
        });
    }

    // Function to load sales data
    function loadSales() {
        $.ajax({
            url: 'read.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                let rows = '';
                $.each(data, function (index, sale) {
                    rows += `<tr>
                        <td>${sale.id}</td>
                        <td>${sale.pub_name}</td>
                        <td>${sale.beer_name}</td>
                        <td>${sale.quantity}</td>
                        <td>
                            <button class="action-button" onclick="editSale(${sale.id})">Edit</button>
                            <button class="action-button" onclick="deleteSale(${sale.id})">Delete</button>
                        </td>
                    </tr>`;
                });
                $('#salesTable tbody').html(rows);
            }
        });
    }

    // Function to handle form submission for create/update
    $('#salesForm').submit(function (e) {
        e.preventDefault(); // Prevent form submission
    
        // Serialize the form data
        let formData = $(this).serialize();
        let actionUrl = $('#sale_id').val() ? 'update.php' : 'create.php';
    
        // AJAX call to submit the form data
        $.ajax({
            url: actionUrl,
            method: 'POST',
            data: formData,
            success: function (response) {
                alert(response);
                $('#salesForm')[0].reset(); // Reset form
                $('#sale_id').val('');      // Clear hidden input
                loadSales();                // Reload sales data
            }
        });
    });
    // Function to edit a sale
    
    window.editSale = function (id) {
        const saleId = id
        $('#editSaleModal').modal('show')

        $('#saveChangesButton').on('click', function() 
        {
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
      
    };

    // Function to delete a sale
    window.deleteSale = function (id) {
        if (confirm('Are you sure you want to delete this sale?')) {
            $.ajax({
                url: 'delete.php',
                method: 'POST',
                data: { id: id },
                success: function (response) {
                    alert(response);
                    loadSales();
                }
            });
        }
    };

    // Initial load
    populateDropdowns();
    loadSales();
});
