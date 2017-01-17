<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Manager Members</h4>
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
				                            <a href="<?php echo $this->Url->build(array('controller'=>'Administrator','action'=>'editRole')) ?>">
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
													<input pattern=".{6,18}" minlength="6" required name="username" type="text" class="form-control" id="inputUsername" placeholder="Username" value="<?php echo $user->username ?>">
												</div>
												<div class="form-group">
													<label for="inputEmail1">Email address</label>
													<input name="email" type="email" class="form-control" id="inputEmail1" placeholder="Email" value="<?php echo $user->email ?>">
												</div>
												<div class="form-group">
													<label for="inputRole">Roles</label>
													<select id="inputRole" class="form-control" name="roleId">
														<?php foreach ($roles as $key => $value) { ?>
															<option <?php echo (($user->role_id == $value->id)?"selected":"") ?> value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
														<?php } ?>
													</select>
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