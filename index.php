		<?php
		Include('store_template_start.php');
		?>
				<div class="maincol">
					<div class="box-wrapper">
						<div class="page-title">
							<h2>User Login</h2>
						</div>
						<div class="box-simple">
							<form name="sd" action="login_check.php" method="post">
								<input type="hidden" name="msgId" value="57913" />
									<fieldset class="logFld">
										<table class="content" cellpadding="5%">
											<tbody>
												<tr>
													<td>UserName</td>
													<td>:</td>
													<td><input type="text" name="txtUsername" tabindex="2" /></td>
												</tr>
												<tr>
													<td>Password</td>
													<td>:</td>
													<td><input type="password" name="txtPassword" tabindex="3" /></td>
												</tr>
												<tr>
													<td></td>
													<td></td>
													<td><input type="submit" name="Submit" value="Login" tabindex="4" /></td>
												</tr>
												<tr>
													<td></td>
													<td></td>
													<td><a href="register.php">Sign Up !</a>&nbsp;&nbsp;&nbsp;&nbsp; </td>
												</tr>
												<tr>
													<td></td>
													<td></td>
												</tr>
											</tbody>
										</table>
									</fieldset>
								</form>
							</div>
						</div> <!-- end box-wrapper -->

				<?php
						Include('store_template_end.php');
				?>