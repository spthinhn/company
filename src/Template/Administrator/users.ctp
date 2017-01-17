<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
				<div class="col-xs-12">
					<div class="page-title-box">
                        <h4 class="page-title ">Manager Members</h4>
                        <ol class="breadcrumb p-0">
                            <li>
                                <a href="#">Uplon</a>
                            </li>
                            <li>
                                <a href="#">Tables</a>
                            </li>
                            <li class="active">
                                Basic Tables
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
				</div>
			</div>
            <!-- end row -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="col-sm-8">
                        </div>
                        <div class="col-sm-4">
                            <a href="<?php echo $this->Url->build(array('controller'=>'Administrator','action'=>'addUser')) ?>">
                                <button class="btn waves-effect waves-light btn-default btn-sm pull-right">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <table class="tablesaw table m-b-0 table-bordered table-hover" data-tablesaw-sortable >
                            <thead>
                                <tr>

                                    <th width="5%" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">#</th>
                                    <th width="30%" scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="2">Username</th>
                                    <th width="30%" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">Email</th>
                                    <th width="20%" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Role</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0 ?>
                            <?php foreach ($users as $key => $value) { ?>
                            <?php $i++ ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td><?php echo $value->username ?></td>
                                    <td><?php echo $value->email ?></td>
                                    <td><?php echo $value->role->name ?></td>
                                    <td>
                                        <a href="<?php echo $this->Url->build(array('controller'=>'Administrator','action'=>'editUser', $value->id )) ?>">
                                            <button class="btn waves-effect waves-light btn-warning btn-sm pull-right">
                                                <i class="fa fa-cog"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->

</div>