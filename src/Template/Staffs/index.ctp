<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
				<div class="col-xs-12">
					<div class="page-title-box">
                        <h4 class="page-title ">Staffs</h4>
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
                            <a href="<?php echo $this->Url->build(array('controller'=>'Staffs','action'=>'add')) ?>">
                                <button class="btn waves-effect waves-light btn-default pull-right">
                                    <i class="fa fa-plus fa-lg"></i>
                                </button>
                            </a>
                        </div>
                        
                        <div class="clearfix"></div>
                        <hr>
                        <table class="tablesaw table m-b-0 table-bordered table-hover" data-tablesaw-sortable >
                            <thead>
                                <tr>

                                    <th width="5%" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">#</th>
                                    <th width="20%" scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="2">Username</th>
                                    <th width="20%" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">Email</th>
                                    <th width="20%" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Chức vụ</th>
                                    <th width="20%" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">Trạng thái</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>
                                    <button class="btn waves-effect waves-light btn-info btn-sm"> <i class="fa fa-info"></i> </button>
                                    <button class="btn waves-effect waves-light btn-warning btn-sm"> <i class="fa fa-cog"></i> </button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>
                                    <button class="btn waves-effect waves-light btn-info btn-sm"> <i class="fa fa-info"></i> </button>
                                    <button class="btn waves-effect waves-light btn-warning btn-sm"> <i class="fa fa-cog"></i> </button>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->

</div>