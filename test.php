<html><head>
    <meta charset="UTF-8">
      <title>jQuery Gridly</title>
      <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
      <link href="lib/gridly/stylesheets/jquery.gridly.css" rel="stylesheet" type="text/css">
      <link href="lib/gridly/stylesheets/sample.css" rel="stylesheet" type="text/css">
      <script type="text/javascript" async="" src="http://www.google-analytics.com/ga.js"></script>
      <script src="lib/gridly/javascripts/jquery.js" type="text/javascript"></script>
      <script src="lib/gridly/javascripts/jquery.gridly.js" type="text/javascript"></script>
      <script src="lib/gridly/javascripts/sample.js" type="text/javascript"></script>
      <script src="lib/gridly/javascripts/rainbow.js" type="text/javascript"></script>
      <script>
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-31911059-1']);
        _gaq.push(['_trackPageview']);
        
        (function() {
          var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
          ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
          var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
      </script>
    
  </head>
  <body style="">
    <a href="https://github.com/ksylvest/jquery-gridly">
      <img alt="Fork" class="fork" src="images/fork.png">
    </a>
    <div class="content">
      <h1>jQuery Gridly</h1>
      <p>Gridly is a jQuery plugin to enable dragging and dropping as well as resizing on a grids. In the example below try tapping or dragging any of the bricks.</p>
      <h2>Example</h2>
      <section class="example">
        <div class="gridly" style="height: 640px;">
          <div class="brick small" style="position: absolute; left: 0px; top: 160px;">
            <a class="delete" href="#">×</a>
          </div>
          
          <div class="brick small" style="position: absolute; left: 0px; top: 0px;">
            <a class="delete" href="#">×</a>
          </div>
          <div class="brick small" style="position: absolute; left: 160px; top: 0px;">
            <a class="delete" href="#">×</a>
          </div>
          <div class="brick small" style="position: absolute; left: 320px; top: 0px;">
            <a class="delete" href="#">×</a>
          </div>
          <div class="brick small" style="position: absolute; left: 480px; top: 0px;">
            <a class="delete" href="#">×</a>
          </div>
          <div class="brick small" style="position: absolute; left: 640px; top: 0px;">
            <a class="delete" href="#">×</a>
          </div>
          <div class="brick small" style="position: absolute; left: 800px; top: 0px;">
            <a class="delete" href="#">×</a>
          </div>
          <div class="brick small" style="position: absolute; left: 160px; top: 160px;">
            <a class="delete" href="#">×</a>
          </div>
          <div class="brick small" style="position: absolute; left: 320px; top: 160px;">
            <a class="delete" href="#">×</a>
          </div>
          <div class="brick small" style="position: absolute; left: 480px; top: 160px;">
            <a class="delete" href="#">×</a>
          </div>
          <div class="brick small" style="position: absolute; left: 640px; top: 160px;">
            <a class="delete" href="#">×</a>
          </div>
          <div class="brick small" style="position: absolute; left: 800px; top: 160px;">
            <a class="delete" href="#">×</a>
          </div>
          <div class="brick small" style="position: absolute; left: 0px; top: 320px;">
            <a class="delete" href="#">×</a>
          </div>
          <div class="brick small" style="position: absolute; left: 160px; top: 320px;">
            <a class="delete" href="#">×</a>
          </div>
          <div class="brick small" style="position: absolute; left: 320px; top: 320px;">
            <a class="delete" href="#">×</a>
          </div>
          <div class="brick small" style="position: absolute; left: 480px; top: 320px;">
            <a class="delete" href="#">×</a>
          </div>
          <div class="brick small" style="position: absolute; left: 640px; top: 320px;">
            <a class="delete" href="#">×</a>
          </div>
          <div class="brick small" style="position: absolute; left: 800px; top: 320px;">
            <a class="delete" href="#">×</a>
          </div>
          <div class="brick small" style="position: absolute; left: 0px; top: 480px;">
            <a class="delete" href="#">×</a>
          </div>
        </div>
        <p class="actions">
          <a class="add button" href="#">Add</a>
        </p>
      </section>
      <h2>Installation</h2>
      <p>To install download one of these packages and include the jquery.gridly.js and jquery.gridly.css files in your head with the following:</p>
      <section class="formats">
        <div class="format">
          <a class="zip" href="lib/gridly/packages/jquery.gridly.zip"></a>
        </div>
        <div class="format">
          <a class="tar" href="lib/gridly/packages/jquery.gridly.tar"></a>
        </div>
      </section>
      <pre><code data-language="html" class="rainbow"><span class="support tag"><span class="support tag">&lt;</span><span class="support tag-name">script</span></span> <span class="support attribute">src</span><span class="support operator">=</span><span class="string quote">"</span><span class="string value">https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js</span><span class="string quote">"</span> <span class="support attribute">type</span><span class="support operator">=</span><span class="string quote">"</span><span class="string value">text/javascript</span><span class="string quote">"</span><span class="support tag close">&gt;</span><span class="support tag"><span class="support tag">&lt;</span><span class="support tag special">/</span><span class="support tag-name">script</span></span><span class="support tag close">&gt;</span>
<span class="support tag"><span class="support tag">&lt;</span><span class="support tag-name">script</span></span> <span class="support attribute">src</span><span class="support operator">=</span><span class="string quote">"</span><span class="string value">javascript/jquery.gridly.js</span><span class="string quote">"</span> <span class="support attribute">type</span><span class="support operator">=</span><span class="string quote">"</span><span class="string value">text/javascript</span><span class="string quote">"</span><span class="support tag close">&gt;</span><span class="support tag"><span class="support tag">&lt;</span><span class="support tag special">/</span><span class="support tag-name">script</span></span><span class="support tag close">&gt;</span>
<span class="support tag"><span class="support tag">&lt;</span><span class="support tag-name">link</span></span> <span class="support attribute">href</span><span class="support operator">=</span><span class="string quote">"</span><span class="string value">stylesheets/jquery.gridly.css</span><span class="string quote">"</span> <span class="support attribute">rel</span><span class="support operator">=</span><span class="string quote">"</span><span class="string value">stylesheet</span><span class="string quote">"</span> <span class="support attribute">type</span><span class="support operator">=</span><span class="string quote">"</span><span class="string value">text/css</span><span class="string quote">"</span> <span class="support tag close">/&gt;</span></code></pre>
      <h2>Example</h2>
      <p>Setting up a gridly is easy. The following snippet is a good start:</p>
      <pre><code data-language="html" class="rainbow"><span class="source css embedded"><span class="support tag style">&lt;</span><span class="entity tag style">style</span> <span class="entity tag style">type</span>=<span class="string">"text/css"</span><span class="support tag style">&gt;</span>
  <span class="entity name class">.gridly</span> {
    <span class="support css-property">position</span>: <span class="support css-value">relative</span>;
    <span class="support css-property">width</span>: <span class="constant numeric">960</span><span class="keyword unit">px</span>;
  }
  <span class="entity name class">.brick</span><span class="entity name class">.small</span> {
    <span class="support css-property">width</span>: <span class="constant numeric">140</span><span class="keyword unit">px</span>;
    <span class="support css-property">height</span>: <span class="constant numeric">140</span><span class="keyword unit">px</span>;
  }
  <span class="entity name class">.brick</span><span class="entity name class">.large</span> {
    <span class="support css-property">width</span>: <span class="constant numeric">300</span><span class="keyword unit">px</span>;
    <span class="support css-property">height</span>: <span class="constant numeric">300</span><span class="keyword unit">px</span>;
  }
<span class="support tag style">&lt;/</span><span class="entity tag style">style</span><span class="support tag style">&gt;</span></span>
<span class="support tag"><span class="support tag">&lt;</span><span class="support tag-name">div</span></span> <span class="support attribute">class</span><span class="support operator">=</span><span class="string quote">"</span><span class="string value">gridly</span><span class="string quote">"</span><span class="support tag close">&gt;</span>
  <span class="support tag"><span class="support tag">&lt;</span><span class="support tag-name">div</span></span> <span class="support attribute">class</span><span class="support operator">=</span><span class="string quote">"</span><span class="string value">brick small</span><span class="string quote">"</span><span class="support tag close">&gt;</span><span class="support tag"><span class="support tag">&lt;</span><span class="support tag special">/</span><span class="support tag-name">div</span></span><span class="support tag close">&gt;</span>
  <span class="support tag"><span class="support tag">&lt;</span><span class="support tag-name">div</span></span> <span class="support attribute">class</span><span class="support operator">=</span><span class="string quote">"</span><span class="string value">brick small</span><span class="string quote">"</span><span class="support tag close">&gt;</span><span class="support tag"><span class="support tag">&lt;</span><span class="support tag special">/</span><span class="support tag-name">div</span></span><span class="support tag close">&gt;</span>
  <span class="support tag"><span class="support tag">&lt;</span><span class="support tag-name">div</span></span> <span class="support attribute">class</span><span class="support operator">=</span><span class="string quote">"</span><span class="string value">brick large</span><span class="string quote">"</span><span class="support tag close">&gt;</span><span class="support tag"><span class="support tag">&lt;</span><span class="support tag special">/</span><span class="support tag-name">div</span></span><span class="support tag close">&gt;</span>
  <span class="support tag"><span class="support tag">&lt;</span><span class="support tag-name">div</span></span> <span class="support attribute">class</span><span class="support operator">=</span><span class="string quote">"</span><span class="string value">brick small</span><span class="string quote">"</span><span class="support tag close">&gt;</span><span class="support tag"><span class="support tag">&lt;</span><span class="support tag special">/</span><span class="support tag-name">div</span></span><span class="support tag close">&gt;</span>
  <span class="support tag"><span class="support tag">&lt;</span><span class="support tag-name">div</span></span> <span class="support attribute">class</span><span class="support operator">=</span><span class="string quote">"</span><span class="string value">brick small</span><span class="string quote">"</span><span class="support tag close">&gt;</span><span class="support tag"><span class="support tag">&lt;</span><span class="support tag special">/</span><span class="support tag-name">div</span></span><span class="support tag close">&gt;</span>
  <span class="support tag"><span class="support tag">&lt;</span><span class="support tag-name">div</span></span> <span class="support attribute">class</span><span class="support operator">=</span><span class="string quote">"</span><span class="string value">brick large</span><span class="string quote">"</span><span class="support tag close">&gt;</span><span class="support tag"><span class="support tag">&lt;</span><span class="support tag special">/</span><span class="support tag-name">div</span></span><span class="support tag close">&gt;</span>
<span class="support tag"><span class="support tag">&lt;</span><span class="support tag special">/</span><span class="support tag-name">div</span></span><span class="support tag close">&gt;</span>
<span class="source js embedded"><span class="support tag script">&lt;</span><span class="entity tag script">script</span><span class="support tag script">&gt;</span>
 <span class="selector"> $</span>(<span class="string">'.gridly'</span>).<span class="function call">gridly</span>({
    base: <span class="constant numeric">60</span>, <span class="comment">// px </span>
    gutter: <span class="constant numeric">20</span>, <span class="comment">// px</span>
    columns: <span class="constant numeric">12</span>
  });
<span class="support tag script">&lt;/</span><span class="entity tag script">script</span><span class="support tag script">&gt;</span></span></code></pre>
      <p class="copy">
        Copyright (c) 2013 - 2015
        <a href="http://ksylvest.com/">Kevin Sylvestre</a>
      </p>
      <p class="links">
        <a href="https://github.com/ksylvest">GitHub</a>
        <a href="https://plus.google.com/+KevinSylvestre?rel=author">Google</a>
        <a href="https://twitter.com/ksylvest">Twitter</a>
      </p>
    </div>
  

</body></html>