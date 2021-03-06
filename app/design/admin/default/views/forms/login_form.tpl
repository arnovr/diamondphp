{if $uri|strstr:'login/index/verify'}

<div class="alert alert-danger text-center"><h3>Account not verified</h3>
You have registered on our site, but have not confirmed your account yet. Please check your email inbox for instructions on verifying your account.</div>

{elseif $uri|strstr:'login/password_reset_complete'}

{else}

{if $route eq 'error_math'}
      {* Previous login attempt failed *}
      <div class="alert alert-danger text-center"><button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Error: </strong>Math answer is incorrect</div>
{/if}
{if $route eq 'error'}
    <div class="alert alert-danger text-center"><button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Error: </strong>Email or password incorrect</div>

        {*
           Since the login attempt failed, we want to protect ourselves against brute force hacking attempts.
           We don't want to annoy users with CAPTCHA forms, and we don't want to resort to locking members out or
           not letting them attempt to login again for X-amount of time either, which not only also annoys users, but also
           uses up system resources.
           The best solution for protecting ourselves while keeping our users happy is to simply delay the execution of the script
           when a failed login attempt occurs. By delaying the processing of the request, the time it takes to successfully
           crack an account is enormous and unattainable for all intents and purposes.
           We don't want to delay the processing too long either, else the user may get frustrated with high page load times.
           We can modify how long this delay occurs in the sleep() function below. The value of the number is in seconds, so by
           default we delay failed login attempts for 2 seconds. The higher we set this number, the more secure we are, however,
           it also means the user has to wait that much longer for the page to reload. Keep in mind that a delay of just 10 milliseconds
           greatly lengthens any brute force or dictionary attack. A value of 2 seconds should be a good compromise, as it gives
           terrific protection while being practically unnoticeable to users, but any value between 1 - 5 should be reasonable.
           Any more than that starts using up resources, as well as annoying people!
         *}
  {/if}
<div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="{$smarty.const.ADMIN_URL|lower}login_validate">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" name="username" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
              </div>
              {if $login_math}
              <div class="form-group has-feedback">
                <label for="math" class="col-sm-3 control-label">Are you human? Math problem:</label>
                <div class="col-sm-8">
                    <span class="input-group-addon">
                      <strong>{$a} x {$b} =</strong>
                    </span>
                    <input type="number" name="math" class="form-control" placeholder="Enter answer" required=required>
                </div>
              </div>
              {/if}
              <div>
                <button type="submit" class="btn btn-default submit">Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
              <input type="hidden" name="math_answer" value="{$answer}">
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>

    {/if}