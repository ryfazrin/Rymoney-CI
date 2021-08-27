<?= $this->extend('Templates\adminTemplate') ?>

<?= $this->section('content') ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= isset($title)? $title : "Halaman Ryris" ?></h1>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  onclick="add()" title="Add">
            <i class="fas fa-download fa-sm text-white-50"></i> Tambah
        </button>
    </div>
    <p class="mb-4">Ini adalah halaman untuk mengelola data <?= isset($title)? $title : "Halaman Ryris" ?>. <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTables -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables <?= isset($title)? $title : "Halaman Ryris" ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="data_table" cellspacing="0">
                    <thead>
                        <tr>
                                     <th>Id</th>         <th>User</th>         <th>Category</th>         <th>Nominal</th>         <th>Description</th>         <th>Debit date</th>         <th>Created at</th>         <th>Updated at</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- ============ MODAL ADD Uang Keluar =============== -->
    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="info-header-modalLabel">Tambah <?= isset($title)? $title : "Data Ryris" ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>

              <form id="add-form">
                  <div class="modal-body">
                                            <div class="row">
 							<input type="hidden" id="id" name="id" class="form-control" placeholder="Id"  maxlength="11" required>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
	                <label for="userId"> User: <span class="text-danger">*</span> </label>
                  <input type="number" id="userId" name="userId" class="form-control" placeholder="User"  maxlength="11" number="true" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
	                <label for="categoryId"> Category: <span class="text-danger">*</span> </label>
                  <input type="number" id="categoryId" name="categoryId" class="form-control" placeholder="Category"  maxlength="11" number="true" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
	                <label for="nominal"> Nominal: <span class="text-danger">*</span> </label>
                  <input type="number" id="nominal" name="nominal" class="form-control" placeholder="Nominal"  maxlength="11" number="true" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
	                <label for="description"> Description: </label>
                  <textarea cols="40" rows="5" id="" name="description" class="form-control" placeholder="Description"  ></textarea>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
	                <label for="debitDate"> Debit date: <span class="text-danger">*</span> </label>
                  <input type="date" id="debitDate" name="debitDate" class="form-control" dateISO="true" required>
                </div>
              </div>
            </div>    

                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" id="add-form-btn">Add</button>
                  </div>
              </form>

            </div> <!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div> <!-- /.modal -->	

    <!-- ============ MODAL EDIT Uang Keluar =============== -->
    <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update <?= isset($title)? $title : "Data Ryris" ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="edit-form">
                <div class="modal-body">
                                          <div class="row">
 							<input type="hidden" id="id" name="id" class="form-control" placeholder="Id"  maxlength="11" required>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
	                <label for="userId"> User: <span class="text-danger">*</span> </label>
                  <input type="number" id="userId" name="userId" class="form-control" placeholder="User"  maxlength="11" number="true" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
	                <label for="categoryId"> Category: <span class="text-danger">*</span> </label>
                  <input type="number" id="categoryId" name="categoryId" class="form-control" placeholder="Category"  maxlength="11" number="true" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
	                <label for="nominal"> Nominal: <span class="text-danger">*</span> </label>
                  <input type="number" id="nominal" name="nominal" class="form-control" placeholder="Nominal"  maxlength="11" number="true" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
	                <label for="description"> Description: </label>
                  <textarea cols="40" rows="5" id="" name="description" class="form-control" placeholder="Description"  ></textarea>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
	                <label for="debitDate"> Debit date: <span class="text-danger">*</span> </label>
                  <input type="date" id="debitDate" name="debitDate" class="form-control" dateISO="true" required>
                </div>
              </div>
            </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="edit-form-btn">Update</button>
                </div>
            </form>

            </div> <!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div> <!-- /.modal -->	

<?= $this->endSection() ?>

<?= $this->section('css') ?>
  <?php // Your Custom CSS here ?>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
  $(function () {
    $('#data_table').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "ajax": {
        "url": '<?php echo base_url($controller.'/getAll') ?>',			
        "type": "POST",
        "dataType": "json",
        async: "true"
      }
    });
  });

  function add() {
    // reset the form 
    $("#add-form")[0].reset();
    $(".form-control").removeClass('is-invalid').removeClass('is-valid');		
    $('#add-modal').modal('show');
    // submit the add from 
    $.validator.setDefaults({
      highlight: function(element) {
        $(element).addClass('is-invalid').removeClass('is-valid');
      },
      unhighlight: function(element) {
        $(element).removeClass('is-invalid').addClass('is-valid');
      },
      errorElement: 'div ',
      errorClass: 'invalid-feedback',
      errorPlacement: function(error, element) {
        if (element.parent('.input-group').length) {
          error.insertAfter(element.parent());
        } else if ($(element).is('.select')) {
          element.next().after(error);
        } else if (element.hasClass('select2')) {
          error.insertAfter(element.next());
        } else if (element.hasClass('selectpicker')) {
          error.insertAfter(element.next());
        } else {
          error.insertAfter(element);
        }
      },

      submitHandler: function(form) {
        
        var form = $('#add-form');
        // remove the text-danger
        $(".text-danger").remove();

        $.ajax({
          url: '<?php echo base_url($controller.'/add') ?>',						
          type: 'post',
          data: form.serialize(), // converting the form data into array and sending it to server
          dataType: 'json',
          beforeSend: function() {
            $('#add-form-btn').html('<i class="fa fa-spinner fa-spin"></i>');
          },					
          success: function(response) {

            if (response.success === true) {

              Swal.fire({
                position: 'bottom-end',
                icon: 'success',
                title: response.messages,
                showConfirmButton: false,
                timer: 1500
              }).then(function() {
                $('#data_table').DataTable().ajax.reload(null, false).draw(false);
                $('#add-modal').modal('hide');
              })

            } else {

              if (response.messages instanceof Object) {
                $.each(response.messages, function(index, value) {
                  var id = $("#" + index);

                  id.closest('.form-control')
                    .removeClass('is-invalid')
                    .removeClass('is-valid')
                    .addClass(value.length > 0 ? 'is-invalid' : 'is-valid');

                  id.after(value);

                });
              } else {
                Swal.fire({
                  position: 'bottom-end',
                  icon: 'error',
                  title: response.messages,
                  showConfirmButton: false,
                  timer: 1500
                })

              }
            }
            $('#add-form-btn').html('Add');
          }
        });

        return false;
      }
    });
    $('#add-form').validate();
  }

  function edit(id) {
    $.ajax({
      url: '<?php echo base_url($controller.'/getOne') ?>',
      type: 'post',
      data: {
        id: id
      },
      dataType: 'json',
      success: function(response) {
        // reset the form 
        $("#edit-form")[0].reset();
        $(".form-control").removeClass('is-invalid').removeClass('is-valid');				
        $('#edit-modal').modal('show');	

        $("#edit-form #id").val(response.id);
      $("#edit-form #userId").val(response.user_id);
      $("#edit-form #categoryId").val(response.category_id);
      $("#edit-form #nominal").val(response.nominal);
      $("#edit-form #description").val(response.description);
      $("#edit-form #debitDate").val(response.debit_date);

        // submit the edit from 
        $.validator.setDefaults({
          highlight: function(element) {
            $(element).addClass('is-invalid').removeClass('is-valid');
          },
          unhighlight: function(element) {
            $(element).removeClass('is-invalid').addClass('is-valid');
          },
          errorElement: 'div ',
          errorClass: 'invalid-feedback',
          errorPlacement: function(error, element) {
            if (element.parent('.input-group').length) {
              error.insertAfter(element.parent());
            } else if ($(element).is('.select')) {
              element.next().after(error);
            } else if (element.hasClass('select2')) {
              //error.insertAfter(element);
              error.insertAfter(element.next());
            } else if (element.hasClass('selectpicker')) {
              error.insertAfter(element.next());
            } else {
              error.insertAfter(element);
            }
          },

          submitHandler: function(form) {
            var form = $('#edit-form');
            $(".text-danger").remove();
            $.ajax({
              url: '<?php echo base_url($controller.'/edit') ?>' ,						
              type: 'post',
              data: form.serialize(), 
              dataType: 'json',
              beforeSend: function() {
                $('#edit-form-btn').html('<i class="fa fa-spinner fa-spin"></i>');
              },								
              success: function(response) {

                if (response.success === true) {

                  Swal.fire({
                    position: 'bottom-end',
                    icon: 'success',
                    title: response.messages,
                    showConfirmButton: false,
                    timer: 1500
                  }).then(function() {
                    $('#data_table').DataTable().ajax.reload(null, false).draw(false);
                    $('#edit-modal').modal('hide');
                  })
                  
                } else {

                  if (response.messages instanceof Object) {
                    $.each(response.messages, function(index, value) {
                      var id = $("#" + index);

                      id.closest('.form-control')
                        .removeClass('is-invalid')
                        .removeClass('is-valid')
                        .addClass(value.length > 0 ? 'is-invalid' : 'is-valid');

                      id.after(value);

                    });
                  } else {
                    Swal.fire({
                      position: 'bottom-end',
                      icon: 'error',
                      title: response.messages,
                      showConfirmButton: false,
                      timer: 1500
                    })

                  }
                }
                $('#edit-form-btn').html('Update');
              }
            });

            return false;
          }
        });
        $('#edit-form').validate();

      }
    });
  }

  function remove(id) {	
    Swal.fire({
      title: 'Are you sure of the deleting process?',
      text: "You cannot back after confirmation",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Confirm',
      cancelButtonText: 'Cancel'		  
    }).then((result) => {		

      if (result.value) {
      $.ajax({
        url: '<?php echo base_url($controller.'/remove') ?>',
        type: 'post',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(response) {

          if (response.success === true) {
            Swal.fire({
              position: 'bottom-end',
              icon: 'success',
              title: response.messages,
              showConfirmButton: false,
              timer: 1500
            }).then(function() {
              $('#data_table').DataTable().ajax.reload(null, false).draw(false);								
            })
          } else {
            Swal.fire({
              position: 'bottom-end',
              icon: 'error',
              title: response.messages,
              showConfirmButton: false,
              timer: 1500
            })

            
          }
        }
      });
      }
    })
  }
</script>
<?= $this->endSection() ?>