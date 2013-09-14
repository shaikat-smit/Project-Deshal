<div id="content">
 <div class="top">
    <div class="left"></div>
    <div class="right"></div>
    <div class="center">
      <h1>Account Login</h1>
    </div>
  </div>
  <div class="middle">
            <div style="margin-bottom: 10px; display: inline-block; width: 100%;">
      <div style="float: left; display: inline-block; width: 49%;"><h4>I am a new customer.</h4>
        <div class="content_box" style="background: #F7F7F7; border: 1px solid #DDDDDD; padding: 10px; min-height: 250px;">
          <form action="http://www.deshal.com.bd/shop/index.php?route=account/login" method="post" enctype="multipart/form-data" id="account">
            <p>Checkout Options:</p>
            <label for="register" style="cursor: pointer;">
                            <input type="radio" name="account" value="register" id="register" checked="checked" />
                            <b>Register Account</b></label>
            <br />
                        <br />
            <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p><br />
            <div style="text-align: left; margin-top:15px;"><a onclick="$('#account').submit();" class="button">Continue</a></div>
          </form>
        </div>
      </div>
      <div style="float: right; display: inline-block; width: 49%;"><h4>Returning Customer</h4>
        <div  class="content_box" style="background: #F7F7F7; border: 1px solid #DDDDDD; padding: 10px; min-height: 250px;">
          <form action="http://www.deshal.com.bd/shop/index.php?route=account/login" method="post" enctype="multipart/form-data" id="login">
            I am a returning customer.<br />
            <br />
            <b>E-Mail Address:</b><br />
            <input type="text" name="email" />
            <br />
            <br />
            <b>Password:</b><br />
            <input type="password" name="password" />
            <br />
            <a href="indexacda.html?route=account/forgotten">Forgotten Password</a><br />
            <div style="text-align: left; margin-top:15px;"><a onclick="$('#login').submit();" class="button">Login</a></div>
                      </form>
        </div>
      </div>
    </div>
  </div>
  <div class="bottom">
    <div class="left"></div>
    <div class="right"></div>
    <div class="center"></div>
  </div>

</div>
<script type="text/javascript"><!--
$('#login input').keydown(function(e) {
	if (e.keyCode == 13) {
		$('#login').submit();
	}
});
//--></script>