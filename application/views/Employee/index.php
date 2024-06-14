    
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <?php if($this->session->flashdata('status')) : ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('status'); ?>
                        </div>
                        <?php endif; ?>
                        <h5>How to fetch data from database</h5>
                        <a href="<?php echo base_url('employee/add') ?>" class="btn btn-primary float-right">Add Employee</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                    <th>Confirm Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach($employee as $row){
                                        echo '
                                        <tr>
                                            <td>'.$row->id.'</td>
                                            <td>'.$row->first_name.'</td>
                                            <td>'.$row->last_name.'</td>
                                            <td>'.$row->phone.'</td>
                                            <td>'.$row->email.'</td>
                                            <td>
                                                <a href="'.base_url('employee/edit/').$row->id.'" class="btn btn-success">Edit</a>
                                                <a href="'.base_url('employee/delete/').$row->id.'" class="btn btn-danger">Delete</a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger confirm-delete" value="'.$row->id.'">Confirm Delete</button>
                                            </td>
                                        </tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>