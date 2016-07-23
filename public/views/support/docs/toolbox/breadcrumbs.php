<div class="white-row styleSecondBackground">
    
    <div class="row">
        <div class="col-xs-12 text-center"><h1><i class="featured-icon fa fa-anchor"></i> Breadcrumbs Helper</h1></div>
    </div>
        <div class="clear"></div>
        <p class="text-center">
	The Breadcrumbs helper generates "breadcrumb" links to aid in user navigation and SEO .
        </p>
</div>

<h1 class="text-center">Use it: <code>$this->toolbox('breadcrumbs')</code></h1>

<div class="white-row">
<legend>Breadcrumb Helper</legend>

<p>
    Breadcrumbs are links showing each level of the URL structure in "chunks", each their own a separate link. For example, the breadcrumbs to this page are displayed in the page title bar above: <p><code>Home » Support » Toolbox » Breadcrumbs</code></p>
    
<p>
    The breadcrumbs are automatically generated by the framework and is enabled by default; there is no need for you to do anything other than to disable it if you do not wish to display breadcrumbs by editing the following line in <code>vendor/Fusion/Config/Config.php</code>

<pre>
# Set to TRUE to enable, FALSE to disable
$this->setting['breadcrumbs'] = TRUE;
</pre>
<br>
</p>
  
<blockquote>Setting the page title</blockquote>

<p>
By default, the framework will set default page titles above the breadcrumbs 
(not to be confused with the <a href="<?= BASE_URL; ?>support/toolbox/title">HTML page titles</a>), to further enhance site navigation and SEO performance. However, best results, we strongly recommend setting your own page titles to achieve more targeted and engaging titles.
</p>
 
<p>
To customize your page titles, open the file <strong>Breadcrumbstitles.php</strong>, located in the Toolbox folder 
<code>vendor/Fusion/Toolbox/Breadcrumbstitles.php</code>. Next, uncomment the function <strong>Breadcrumbstitles()</strong> to enable page titles.
</p>

<p>
Page titles are set according to the currently active <a href="<?= BASE_URL; ?>support/docs/controllers">controller</a> and controller action. For example, this document is displayed by the <strong>Support_Controller</strong>, using the <strong>toolbox()</strong> method contained in the support controller. By default (if the <strong>Breadcrumbstitles()</strong> function is commented out), the page titles simply display the name of the current controller - minus the "_Controller" segment - and the site name.
</p>

<p>
Inside the <strong>Breadcrumbstitles()</strong> function, you will find sample code to help you get started. The controllers, the controller methods, and the corresponding page titles are stored in a multi-dimensional array.
</p>

<p>
Let's take a look at how it all works. For our example, we will be working with the Welcome controller.
</p>

<h5>1. Declare the controller</h5>

<p>
First, we declare which controller to set our page titles for with <code>"Welcome_Controller" =></code>. It is very important to note that the controller name that we are declaring <strong>exactly matches</strong> the file name of the controller (minus the ".php" file extension).
</p>

<pre>
$_kw_titles = 
[
    "Welcome_Controller" =>
];
</pre>
<br>


<h5>2. Set page titles for the index(), home() and about() methods</h5>
<p>
Now that we have declared our controller, we just need to set page titles for any (or all) of the methods contained in the Welcome_Controller.php file. We want to set page titles for the <strong>index()</strong>, <strong>home()</strong> and <strong>about()</strong> methods, and do so by simply creating an array and entering the <strong>method name</strong> as the key and the <strong>page title</strong> to be displayed as the value.
</p>

<pre>
[
    "index" => "Welcome to kW Fusion",
    "home"  => "kW Fusion Home Page",
    "about" => "About kW Fusion"
]
</pre>
<br>

<div class="alert alert-warning text-center"><i class="fa fa-exclamation-triangle"></i> Each controller must have the "index" key defined!</div>

<p class="lead">
Since the index method is the default method if no other method is called, each time we declare a controller, we will need to declare the index method as well.
</p>

<div class="divider styleColor"><i class="fa fa-code"></i></div>
<div class="text-center"><h4>That is it for the Welcome controller! Our completed code should look as follows</h4></div>
<div class="divider styleColor"><i class="fa fa-code"></i></div>

<div class="row">
<div class="col-md-3"></div>
<pre class="col-md-6">
$_kw_titles = 
[
    "Welcome_Controller" =>
    [
        "index" => "Welcome to kW Fusion",
        "home"  => "kW Fusion Home Page",
        "about" => "About kW Fusion"
    ]
];
</pre>
</div>

<div class="col-md-3"></div>
</div>
</p>

<div class="white-row">
<legend>To add additional controllers to our page title helper, we simply create another array and repeat the above steps</legend>
<p>
We have completed the Welcome page above, but we have many other sections on our website as well. Let's add some page titles to our demo pages.
</p>
<blockquote> Remember to seperate each new array with a comma</blockquote>
<p>
<pre>
$_kw_titles = 
[
    "Welcome_Controller" =>
    [
        "index" => "Welcome to kW Fusion",
        "home"  => "kW Fusion Home Page",
        "about" => "About kW Fusion"
    ],  // do not forget the closing comma
    
    "Demo_Controller" =>
    [
        "index"    => "Index page of demo controller",
        "demo"     => "kW Fusion Demo Page",
        "download" => "Download kW Fusion"
    ]
    
];
</pre>
<br>

<p>
<blockquote> Now let's add our login page</blockquote>
<p>
<pre>
$_kw_titles = 
[
    "Welcome_Controller" =>
    [
        "index" => "Welcome to kW Fusion",
        "home"  => "kW Fusion Home Page",
        "about" => "About kW Fusion"
    ],
    
    "Demo_Controller" =>
    [
        "index"    => "Index page of demo controller",
        "demo"     => "kW Fusion Demo Page",
        "download" => "Download kW Fusion"
    ],
    
    "Login_Controller" => 
    [
        "index" => "Login to your account on ". $container['config']->setting['site_name']
    ]
    
];
</pre>
<br>
</p>

<blockquote>
<strong>Hold on.</strong> What is that <code>$container['config']->setting['site_name']</code> in the login controller array all about?
</blockquote>

<p>
 The <var>$container</var> variable is a self-contained instance of various services provided by the framework, and gives us a way to provide dynamic capabilities to our page titles. Read on to learn more on how to use this powerful feature!
</p>
</div>

<div class="white-row">
<legend>Adding dynamic data to page titles</legend>
<p class="lead">
If you are not yet familiar with the Developer Toolbox, <a href="<?= BASE_URL; ?>support/toolbox/overview">read the toolbox documentation</a> to learn what features are available to you.
</p>

<p>
On many of your pages, to improve SEO performance and usability, you may wish to add dynamic data to your page titles. From inside controllers and models, you would use the <code>$this->toolbox</code> function to access toolbox services. Since the page title helper <strong>is</strong> a toolbox service, <code>$this->toolbox</code> of course is not available. Instead, we use the <var>$container</var> variable.<br><br>
In the login example above, <code>$container['config']->setting['site_name']</code> is the equivalent of <code>$this->toolbox('config')->setting['site_name']</code>. More simply put, the syntax is identical, except you replace <strong><var>$this->toolbox('name_of_service')</var></strong> with <strong><var>$container['name_of_service']</var></strong>. With that in mind, it is imperative to get to know what the <a href="<?= BASE_URL; ?>support/toolbox/overview">Developer Toolbox</a> has to offer.
</p>



</div>
</p>

<?php $this->view('support/helpers'); ?>
</div>