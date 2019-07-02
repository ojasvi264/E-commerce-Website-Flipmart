<script>
    var attribute_wrapper = $("#attribute_wrapper"); //Fields wrapper
    var add_button_attribute = $("#addMoreAttribute"); //Add button ID
    var x = 1;
    var y = 1;
    $(add_button_attribute).click(function (e) { //on add input button click
        e.preventDefault();
        var max_fields = 15; //maximum input boxes allowed
        if (x < max_fields) { //max input box allowed
            x++; //text box increment
            var id = 'remove_row' + x;
            $("#attribute_wrapper tr:last").after(
                '<tr>'
                + ' <td><input type="text" name="attribute_name[]" class="form-control" placeholder="Enter Atrtribute Name" /></td>'
                + ' <td><input type="text" name="attribute_value[]" class="form-control" placeholder="Enter Atrtribute Value" /></td>'
                + '<td>'
                + '<a class="btn btn-block btn-warning sa-warning remove_row"><i class="glyphicon glyphicon-trash"></i></a>'
                + '</td>'
                + '</tr>'
            );
        } else {
            alert("Max field reached. " + max_fields + " allowed");
        }
    });


    $(attribute_wrapper).on("click", ".remove_row", function (e) {
        e.preventDefault();
        $(this).parents("tr").remove();
        x--;
    });

    var image_wrapper = $("#image_wrapper"); //Fields wrapper
    var add_button_image = $("#addMoreImage"); //Add button ID
    $(add_button_image).click(function (e) { //on add input button click
        var max_fields = 15; //maximum input boxes allowed
        e.preventDefault();
        if (y < max_fields) { //max input box allowed
            y++; //text box increment
            var id = 'remove_row' + y;
            $("#image_wrapper tr:last").after(
                '<tr>'
                + ' <td><input type="file" name="product_image[]" class="form-control" /></td>'
                + '<td>'
                + '<a class="btn btn-block btn-warning sa-warning remove_row"><i class="glyphicon glyphicon-trash"></i></a>'
                + '</td>'
                + '</tr>');
        } else {
            alert("Max field reached. " + max_fields + " allowed");
        }
    });


    $(image_wrapper).on("click", ".remove_row", function (e) {
        e.preventDefault();
        $(this).parents("tr").remove();
        y--;
    });

</script>