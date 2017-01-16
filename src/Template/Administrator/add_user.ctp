<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Manager Users</h4>
                                    <ol class="breadcrumb p-0">
                                        <li>
                                            <a href="#">Uplon</a>
                                        </li>
                                        <li>
                                            <a href="#">Forms</a>
                                        </li>
                                        <li class="active">
                                            Form elements
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                        <form action="" method="post">
	                        <div class="row">
	                        	<div class="col-sm-12">
	                        		<div class="card-box">
	                        			<div class="col-sm-8">
				                        </div>
				                        <div class="col-sm-4">
				                            <a href="<?php echo $this->Url->build(array('controller'=>'Administrator','action'=>'addRole')) ?>">
				                                <button class="btn waves-effect waves-light btn-default pull-right">
				                                    <i class="fa fa-save fa-lg"></i>
				                                </button>
				                            </a>
				                        </div>
				                        <div class="clearfix"></div>
				                        <hr>
	                        			<div class="row">
	                        				<div class="col-sm-6 col-sm-offset-3">
	                        					<div class="form-group">
													<label for="inputUsername">Username</label>
													<input type="text" class="form-control" id="inputUsername" placeholder="Username">
												</div>
												<div class="form-group">
													<label for="inputPassword">Password</label>
													<input type="password" class="form-control" id="inputPassword" placeholder="Password">
												</div>
												<div class="form-group">
													<label for="inputPassConfirm">Password Confirm</label>
													<input type="password" class="form-control" id="inputPassConfirm" placeholder="Password Confirm">
												</div>
												<div class="form-group">
													<label for="inputEmail1">Email address</label>
													<input type="email" class="form-control" id="inputEmail1" placeholder="Email">
												</div>
   	                        				</div>
	                        			</div>
	                        		</div>
	                        	</div>
	                        </div>
                        </form>
                    </div>
                </div> 
            </div>