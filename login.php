<? var_dump($_COOKIE['user_cookie']); ?>
	<div class="header-container">
		<header class="clearfix">
			<div class="inner">
				<div class="left">
					CoupleStory
				</div>
				<div class="right">
					<ul>
						<li id="login-text">
              <a href="#" id="loginButton"><span>Login</span></a>
              <div style="clear:both"></div>
              <div id="loginBox">                
                <form id="loginForm" method="POST" action="scripts/authenticate.php">
                	<fieldset id="body">
                   	<fieldset>
                     	<label for="email">Email Address</label>
                      <input type="text" name="email" id="email" />
              	    </fieldset>
                    <fieldset>
                    	<label for="password">Password</label>
                    	<input type="password" name="password" id="password" />
                    </fieldset>
                    <input type="submit" name="submit" id="login" value="Sign in" />
                    <label for="checkbox"><input type="checkbox" name="remember" id="checkbox" />Remember me</label>
                  </fieldset>
                  <span><a href="#">Sign up</a></span>
                </form>
              </div>
            </li>
          </ul>
				</div>
			</div>
		</header>
	</div> <!-- end header-container -->