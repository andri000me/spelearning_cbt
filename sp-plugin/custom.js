$(window).on('load', function() {
    setTimeout(function() {
      $('body').addClass('loaded');
    }, 200);
});
$(document).ready(function(){
	$("textarea.froala").froalaEditor();

	$('.sidenav').sidenav();
	// $('.sidenav').sidenav();
    var righttnav = $("#chat-out").height();
    $('.rightside-navigation').perfectScrollbar({
      suppressScrollX: true
    });

    $('.collapsible').collapsible();
    $('.dropdown-trigger').dropdown({
		  inDuration: 300,
	      outDuration: 225,
	      constrainWidth: false,
	      hover: false,
	      gutter: 0,
	      belowOrigin: true,
	      alignment: 'left',
	      stopPropagation: false
	  
    });
    $('.tabs').tabs();
    $('.select').formSelect();
	$('.modal').modal();
	

	if (is_touch_device()) {
      $('#nav-mobile').css({
        overflow: 'auto'
      })
    }

});


/*! DataTables Bootstrap 4 integration
 * ©2011-2017 SpryMedia Ltd - datatables.net/license
 */

/**
 * DataTables integration for Bootstrap 4. This requires Bootstrap 4 and
 * DataTables 1.10 or newer.
 *
 * This file sets the defaults and adds options to DataTables to style its
 * controls using Bootstrap. See http://datatables.net/manual/styling/bootstrap
 * for further information.
 */
(function( factory ){
	if ( typeof define === 'function' && define.amd ) {
		// AMD
		define( ['jquery', 'datatables.net'], function ( $ ) {
			return factory( $, window, document );
		} );
	}
	else if ( typeof exports === 'object' ) {
		// CommonJS
		module.exports = function (root, $) {
			if ( ! root ) {
				root = window;
			}

			if ( ! $ || ! $.fn.dataTable ) {
				// Require DataTables, which attaches to jQuery, including
				// jQuery if needed and have a $ property so we can access the
				// jQuery object that is used
				$ = require('datatables.net')(root, $).$;
			}

			return factory( $, root, root.document );
		};
	}
	else {
		// Browser
		factory( jQuery, window, document );
	}
}(function( $, window, document, undefined ) {
'use strict';
var DataTable = $.fn.dataTable;


/* Set the defaults for DataTables initialisation */

/* Default class modification */
$.extend( DataTable.ext.classes, {
	// sWrapper:      "dataTables_wrapper dt-bootstrap4",
	// sFilterInput:  "form-control form-control-sm",
	sLengthSelect: "custom-select browser-default",
	// sProcessing:   "dataTables_processing card",
	// sPageButton:   "pagination"
} );

return DataTable;
}));
