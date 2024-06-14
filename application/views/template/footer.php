    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {

            $('.confirm-delete').click(function (e) {
                e.preventDefault();

                confirmDialog = confirm("Are you sure you want to delete this data?");

                if(confirmDialog)
                {
                    var id = $(this).val();
                    
                    $.ajax({
                      type: "POST",
                      url: "/employee/delete/" + id,
                      success: function (response) {
                          alert("Data deleted");
                          window.location.reload();
                      }
                    });
                }
            })

        })
    </script>

  </body>
</html>