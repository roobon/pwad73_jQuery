<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js/jquery.min.js"></script>
</head>

<body>
    <h3>Student List</h3>
    <div id="container"></div>

    <h3>Student Entry</h3>
    <form action="">
        <input type="text" id="fullname"><br>
        <textarea id="address"></textarea><br>
        <button type="button" class="btn_submit">Submit</button>
    </form>


    <!-- <button id="btn1">Get Data from Server</button> -->

    <script>
        $(document).ready(function() {

            function getStudents() {
                $.get("students.php", function(data, status) {
                    $("#container").html(data)
                    $(".btnDel").click(function() {
                        let sid = this.id;
                        $.get("delete.php", {
                            id: sid
                        }, function(data) {
                            alert(data);
                        })
                    })
                })

            }
            getStudents();

            $(".btn_submit").click(function() {
                let fullname = $("#fullname").val();
                let address = $("#address").val();
                //alert(fullname);

                $.get("insert.php", {
                    name: fullname,
                    add: address
                }, function(data, status) {
                    alert(data);
                    $("#fullname").val("");
                    $("#address").val("");
                    getStudents();
                })
            })

        });
    </script>

</body>

</html>