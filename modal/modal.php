<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Add New Author</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="addForm">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" style="position:relative; top:7px;">Author:</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="author" id="author">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="button" id="addbutton" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
            </div>

        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="editID" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Edit Author</h4>
                </center>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <form id="editForm">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" style="position:relative; top:7px;">Author:</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="editAuthor" id="editAuthor">
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="button" id="editButton" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Update</a>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deleteID" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Delete Member</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <h5>
                        <center>Author: <strong><span id="deleteAuthor"></span></strong></center>
                    </h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default edit" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="button" class="btn btn-danger delete"><span class="glyphicon glyphicon-trash"></span> Delete</button>
            </div>

        </div>
    </div>
</div>