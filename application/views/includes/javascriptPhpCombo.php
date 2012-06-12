<script>
	$(function() {
		$( "#sortable" ).sortable({
			revert: true,
			containment: "#containment-wrapper",
			scroll: false
		});

		$( "#draggable" ).draggable({
			connectToSortable: "#sortable",
			helper: "clone",
			revert: "invalid",
			hoverable: false

		});
		
		$( "ul, li" ).disableSelection();
		
		
		$(".notitie").each(function () {
			$(this).mousedown( function(event) {
				switch (event.which) {
					case 3:
						var randomNum = Math.ceil(Math.random() * 4) +2;
						var cssObj = {
							'background-image': 'url(http://localhost/project7/img/notitie' + randomNum +'.png)',
							'background-repeat': 'no-repeat',
							'background-size' : 'contain'
						}
						
						$(this).css(cssObj);
						break;
					
				};
				
				$("#wrapper").mousedown( function(event) {
				switch (event.which) {
					case 1:
						var cssObj = {
							'background-image': 'url(http://localhost/project7/img/notitie.png)',
							'background-repeat': 'no-repeat',
							'background-size' : 'contain'
						}

						$(".notitie").css(cssObj);
						break;
					
				};
				});
			});
		});

		
		$( ".maakopdrachtbtn" ).draggable({
			connectToSortable: "#sortable",
			helper: "clone",
			revert: "invalid",
			drag: function (event, ui)
			{
			},
			stop: function (event, ui)
			{
			},
		});
		
		$( ".prikbord" ).droppable({
			accept: ".maakopdrachtbtn",
			drop: function( event, ui ) {
				$( "#createopdracht").removeClass("invisible");
				$( "#createopdracht").addClass("visible");
				
			}
		});
		
		$(".notitie").contextMenu({
        menu: "myMenu"
		
		},
        function(action, el, pos) {
			window.location.href = "h" + action;
		});
		
	});
	
	
	</script>	
	<script type="text/javascript">
		$(function() {
			// $('.prikbord .notitie').lightBox();
		});
    </script>