<?php
/**
 * Liquid for PHP
 * 
 * @package Liquid
 * @copyright Copyright (c) 2011 Harald Hanek, 
 * fork of php-liquid (c) 2006 Mateo Murphy,
 * based on Liquid for Ruby (c) 2006 Tobias Luetke
 * @license http://www.opensource.org/licenses/mit-license.php
 */

class BlockTest extends UnitTestCase
{
	
	function test_blackspace()
	{
		$template = new LiquidTemplate;
		$template->parse('  ');
		
		$nodelist = $template->getRoot()->getNodelist();
		
		$this->assertEqual(array('  '), $nodelist);
	}
	
	function test_variable_beginning()
	{
		$template = new LiquidTemplate;
		$template->parse('{{funk}}  ');
		
		$nodelist = $template->getRoot()->getNodelist();
		
		$this->assertEqual(2, count($nodelist));
		$this->assertIsA($nodelist[0], 'LiquidVariable');
		$this->assertIsA($nodelist[1], 'string');
	}

	function test_variable_end()
	{
		$template = new LiquidTemplate;
		$template->parse('  {{funk}}');
		
		$nodelist = $template->getRoot()->getNodelist();
		
		$this->assertEqual(2, count($nodelist));
		$this->assertIsA($nodelist[0], 'string');
		$this->assertIsA($nodelist[1], 'LiquidVariable');
	}

	function test_variable_middle()
	{
		$template = new LiquidTemplate;
		$template->parse('  {{funk}}  ');
		
		$nodelist = $template->getRoot()->getNodelist();
		
		$this->assertEqual(3, count($nodelist));
		$this->assertIsA($nodelist[0], 'string');		
		$this->assertIsA($nodelist[1], 'LiquidVariable');
		$this->assertIsA($nodelist[2], 'string');
	}	

	function test_variable_many_embedded_fragments()
	{
		$template  = new LiquidTemplate;
		$template->parse('  {{funk}}  {{soul}}  {{brother}} ');
		
		$nodelist = $template->getRoot()->getNodelist();
		
		$this->assertEqual(7, count($nodelist));
		$this->assertIsA($nodelist[0], 'string');		
		$this->assertIsA($nodelist[1], 'LiquidVariable');
		$this->assertIsA($nodelist[2], 'string');
		$this->assertIsA($nodelist[3], 'LiquidVariable');
		$this->assertIsA($nodelist[4], 'string');
		$this->assertIsA($nodelist[5], 'LiquidVariable');
		$this->assertIsA($nodelist[6], 'string');		
	}

	function test_with_block()
	{
		$template = new LiquidTemplate;
		$template->parse('  {% comment %}  {% endcomment %} ');		
		
		$nodelist = $template->getRoot()->getNodelist();
		
		$this->assertEqual(3, count($nodelist));
		$this->assertIsA($nodelist[0], 'string');		
		$this->assertIsA($nodelist[1], 'LiquidTagComment');
		$this->assertIsA($nodelist[2], 'string');	
	}
}