<!DOCTYPE html>
<html>

<head>
    <title>Create Authors</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

    <body>
        <div class="container">
            <div style="height:50px;"></div>
            <div class="well" style="margin-left:auto; margin-right:auto; padding:auto; width:70%;">
                <h4><strong>Create Authors</strong></h4>

                <span><a id="add" style="cursor:pointer;" class="btn btn-success col-2 mb-4 ml-3 p-1"><span class="glyphicon glyphicon-plus"></span> Add New</a></span>
                <div style="height:15px;"></div>
                <div id="table"></div>
                <div id="alert" class="alert alert-success">
                    <center><span id="alerttext"></span></center>
                </div>

                <?php include('../modal/modal.php'); ?>

                <script src="../db/BaseModel.js"></script>
            </div>
    </body>

</html>