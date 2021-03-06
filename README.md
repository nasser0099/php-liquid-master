# php-liquid-master
h1. Liquid template engine for PHP

Liquid is a PHP port of the "Liquid template engine for Ruby":https://github.com/Shopify/liquid, which was written by Tobias Lutke. Although there are many other templating engines for PHP, including Smarty (from which Liquid was partially inspired), Liquid had some advantages that made porting worthwhile:

* Readable and human friendly syntax, that is usable in any type of document, not just html, without need for escaping.
* Quick and easy to use and maintain.
* 100% secure, no possibility of embedding PHP code.
* Clean OO design, rather than the mix of OO and procedural found in other templating engines.
* Seperate compiling and rendering stages for improved performance.
* Easy to extend with your own "tags and filters":https://github.com/harrydeluxe/php-liquid/wiki/Liquid-for-programmers.
* 100% Markup compatibility with a Ruby templating engine, making templates usable for either.
* Unit tested: Liquid is fully unit-tested. The library is stable and ready to be used in large projects.

h2. Why Liquid?

Why another templating library?

Liquid was written to meet three templating library requirements: good performance, easy to extend, and simply to use.

h2. Basics

Example snippet:

<pre>
{% if products %}
	<ul id="products">
	{% for product in products %}
	  <li>
		<h2>{{ product.name }}</h2>
		Only {{ product.price | price }}
	
		{{ product.description | prettyprint | paragraph }}
		
		{{ 'it rocks!' | paragraph }}
		
	  </li>      
	{% endfor %}
	</ul>
{% endif %}
</pre>

h2. Howto use Liquid

Code to render:

<pre>
$liquid->parse(file_get_contents('templates/products.tpl'))->render($products);
</pre>

h2. Requirements

* PHP 5.1+

h2. Issues

Have a bug? Please create an issue here on GitHub!

"https://github.com/harrydeluxe/php-liquid/issues":https://github.com/harrydeluxe/php-liquid/issues

h2. Fork Notes

This fork is based on php-liquid by Mateo Murphy. The original library is still hosted at: ("http://code.google.com/p/php-liquid/":http://code.google.com/p/php-liquid/)

