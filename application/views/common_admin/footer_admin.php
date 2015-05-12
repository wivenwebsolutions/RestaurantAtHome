<?php
/**
 * Restaurant At Home
 *
 * This file contains:
 * - The footer tags and main js
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
</div><!-- end wrap -->

    <footer class="footer">
        <div class="container">
            <p class="text-muted">&COPY; Restaurant At Home</p>
        </div>
    </footer>


    <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!-- Enable jquery ui on touch hack http://touchpunch.furf.com/ -->
    <script src="<?php echo public_url() ; ?>/js/jquery.ui.touch-punch.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <!-- Bootstrap Extention Jasny: http://jasny.github.io/bootstrap/ -->
    <script src="<?php echo public_url() ; ?>/js/jasny-bootstrap.min.js"></script>
    <!-- Another Bootstrap Extention:  http://www.bootstraptoggle.com/ -->
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
    <!-- Backstretch script http://srobbin.com/jquery-plugins/backstretch/ -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js"></script>
    <!-- Bootstrap timepicker http://jdewit.github.io/bootstrap-timepicker/ -->
    <script src="<?php echo public_url() ; ?>/js/bootstrap-timepicker.js"></script>
    <!-- Bootstrap touchspin http://www.virtuosoft.eu/code/bootstrap-touchspin/ -->
    <script src="<?php echo public_url() ; ?>/js/jquery.bootstrap-touchspin.min.js"></script>
    
    <script src="<?php echo public_url() ; ?>/js/script.js"></script>
    
    
	<script>
	$(function() {
		$( "#selectable" ).selectable();
             
                $( "#datepicker" ).datepicker({
                    dateFormat: "dd/mm/yy",
                    todayHighlight: true 
                });
                $( "#addon1" ).click(function(){$( "#datepicker" ).datepicker( "show" )});
                
                $('.timepicker').timepicker({
                    showMeridian: false,
                    
                });
                
                $("input[name='slotph']").TouchSpin({
                    initval: 60,
                    step: 5,
                    postfix: "spm",
                    
          
                    
                });
	});
	</script>
</body>

</html>

<?php //EOF  -'It all ends here'-   ?>