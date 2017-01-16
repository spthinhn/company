<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
				<div class="col-xs-12">
					<div class="page-title-box">
                        <h4 class="page-title ">Quản lý</h4>
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
                            <h4 class="m-t-0 header-title"><b>Roles</b></h4>
                        </div>
                        <div class="col-sm-4">
                            <a href="<?php echo $this->Url->build(array('controller'=>'Administrator','action'=>'addRole')) ?>">
                                <button class="btn waves-effect waves-light btn-default btn-sm pull-right">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="row">
	                        <div class="col-sm-6 col-xs-offset-3">
		                        <table class="tablesaw table m-b-0 table-bordered table-hover" data-tablesaw-sortable >
		                            <thead>
		                                <tr>
		                                    <th width="10%" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">#</th>
		                                    <th width="60%" scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="2">Role</th>
		                                    <th></th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                            <?php foreach ($listRole as $key => $value) { ?>
		                                <tr>
		                                    <th scope="row"><?php echo ($key+1) ?></th>
		                                    <td><?php echo $value->name ?></td>
		                                    <td>
		                                    	<a href="<?php echo $this->Url->build(array('controller'=>'Administrator','action'=>'editRole',$value->id)) ?>">
					                                <button class="btn waves-effect waves-light btn-warning btn-sm"> 
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
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->

</div>