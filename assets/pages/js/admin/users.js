$(document).ready(function(){

	if( $("#users-tbl").length ) {
		var grid = new Datatable();

		grid.init({
			src: $("#users-tbl"),
			onSuccess: function (grid, response) {  
				// grid:        grid object
				// response:    json object of server side ajax response
				// execute some code after table records loaded
			},
			onError: function (grid) {
				// execute some code on network or other general error  
			},
			onDataLoad: function(grid) {
				// execute some code on ajax data load
			},
			loadingMessage: 'Loading...',
			dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options 
				"processing": true,
				"serverSide": true,
				select: true,
				"ajax": {
					"url": $("#users-tbl").data('url')
				},
				"order": [
					[1, "asc"]
				],
				"colReorder": {
	                reorderCallback: function () {  
	                    console.log( 'callback' );  
	                }
	            },
				buttons: [
					{ className: 'btn blue-steel', text: 'New User', action: function ( e, dt, node, config ) { window.location.href = site_url+'admin/users/create'  } },  	  
					
				],
				"dom": "<'row cw-listactions'<'col-xs-6'f><'col-xs-6'B>><'table-scrollable'rt><'row cw-listnav'<'col-xs-6'il><'col-xs-6'p>>",
				"pagingType": "bootstrap_number",
				"language": { // language settings
					"info": "Found total _TOTAL_ records",
					"search": "Search Users: ",
				},
				"columnDefs": [
					{"className": "text-center", "targets": [6]},
					{"className": "text-left", "targets": "_all"},
					{ orderable: false, targets: 0 },
				],
				"lengthMenu": [
	                [5, 10, 15, 20, -1],
	                [5, 10, 15, 20, "All"] // change per page values here
	            ],
				"pageLength": 20,			
			}
		});
		
		grid.setAjaxParam("customActionType", "group_action");
		grid.getDataTable().ajax.reload();
		grid.clearAjaxParams();

	}

	if( $('.date-picker_created').length ) {

		$('.date-picker_created').datetimepicker({    
			format: 'MM/DD/YYYY',
			icons: {
				time: 'fa fa-clock-o',
				date: 'fa fa-calendar',
				up: 'fa fa-chevron-up',
				down: 'fa fa-chevron-down',
				previous: 'fa fa-chevron-left',
				next: 'fa fa-chevron-right',
				today: 'glyphicon glyphicon-screenshot',
				clear: 'fa fa-trash',
				close: 'fa fa-times'
			}
		});
	}



}); 

$(document).on('click','.delete_user', function() {
    var choice = confirm('Do you really want to delete this record?');
    if(choice === true) {
        return true;
    }
    return false;  
}); 













