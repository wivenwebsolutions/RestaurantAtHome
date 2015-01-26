<?php
/**
 * Restaurant At Home
 * 
 * This file contains:
 * - The top menu
 *
 * @package	RestoAtHome
 * @author	A collaboration of: Wiven Web Solutions - VDW Web - KolorFlux
 * @copyright	Copyright (c) 2014 - 2015
 * @copyright	
 * @license	*
 * @link	http://resaturantathome.be
 * @since	Version 1.0.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container-fluid" style="padding:0px">
    <div class="container" >
    <header>
        <nav class="navbar">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="public/img/logo_big.png" alt="Resaurant At Home" width="250px"></a>
                
                <button type="button" class="navbar-toggle navbar-right right pull-right collapsed navbar-link glyphicon glyphicon-user  drop-shadow" data-toggle="collapse" data-target="#collapse-user-menu">
        </button>
               </div>
              
              

              
              
              

                <ul class="nav navbar-default navbar-nav navbar-right drop-shadow hidden-xs">
                  <li><a href="#">Login/ registreer</a></li>
                  <li><a href="#"><img src="public/img/small_be_flag.png" alt="Nederlands - Belgie" ></a></li>
                </ul>
              
            <div class="collapse navbar-collapse" id="collapse-user-menu">
                <ul class="nav navbar-default navbar-nav navbar-right drop-shadow hidden-sm hidden-md hidden-lg">
                        <li><a href="#">Login/ registreer</a></li>
                        <li><a href="#"><img src="public/img/small_be_flag.png" alt="Nederlands - Belgie" ></a></li>
                </ul>
            </div> 
              
                    <ul class="nav navbar-nav steps hidden-xs hidden-sm">
                      <li><i class="fa fa-tag fa-2x fa-rotate-90"></i>Gratis Bestellen</li>
                      <li><i class="fa fa-check fa-2x"></i>Afhalen</li>
                      <li><i class="fa fa-child fa-2x"></i>Smullen!</li>
                  </ul>
                  
            </div><!-- /.container-fluid -->
        </nav>
        
        

    </header>
        
    </div>


<?php //EOF  -'It all ends here'-   ?>