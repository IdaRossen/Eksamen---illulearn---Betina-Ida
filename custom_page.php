<?php
/*
Template Name: Custom Javascript
*/
get_header(); ?>
<?php the_content(); ?>



<!--HTML - Typewriter effekt fra Codepen https://codepen.io/CheeseTurtle/pen/jzdgI -->

	<h1 class="custom-js">Learn Illustrator 
	  	<span
	   	 class="txt-rotate"
	   	 data-period="1000"
	    data-rotate='[ "- with illulearn.", "- Its fun.", "- Its easy.", "- Its Illulearn." ]'></span>
	</h1>
<!--HTML slut-->






<!--Custom Javascript-->
	<script type="text/javascript">
	

    <!-- animeret skrivemaskine JavaScript-->	
    		var TxtRotate = function(el, toRotate, period) {
      	this.toRotate = toRotate;
      	this.el = el;
      	this.loopNum = 0;
      	this.period = parseInt(period, 5) || 1000;
      	this.txt = '';
      	this.tick();
      	this.isDeleting = false;
    	};

    TxtRotate.prototype.tick = function() {
      var i = this.loopNum % this.toRotate.length;
      var fullTxt = this.toRotate[i];
    
      if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
      } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
      }

     this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

    var that = this;
    var delta = 300 - Math.random() * 100;

    if (this.isDeleting) { delta /= 2; }

    if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
    }

    setTimeout(function() {
        that.tick();
     },     delta);
    };

    window.onload = function() {
    var elements = document.getElementsByClassName('txt-rotate');
    for (var i=0; i<elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-rotate');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
        new TxtRotate(elements[i], JSON.parse(toRotate), period);
        }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
    document.body.appendChild(css);
    };
<!-- animeret skrivemaskine JavaScript-->	
	
</script>
<!--Custom Javascript-->



<div id="main-content" class="main-content">

<?php
	
?>



<?php

get_footer();
