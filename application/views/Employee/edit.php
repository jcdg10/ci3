    
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h5>How to edit Employee data into database</h5>
                        <a href="<?php echo base_url('employee') ?>" class="btn btn-danger float-right">BACK</a>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('employee/update')."/".$employee->id; ?>" method="POST">
                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" name="first_name" class="form-control" value="<?= $employee->first_name;?>">
                                <small><?php echo form_error('first_name'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="<?= $employee->last_name;?>">
                                <small><?php echo form_error('last_name'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" name="phone" class="form-control" value="<?= $employee->phone;?>">
                                <small><?php echo form_error('phone'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" value="<?= $employee->email;?>">
                                <small><?php echo form_error('email'); ?></small>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>