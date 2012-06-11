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
			revert: "invalid"
		});
		
		$( "ul, li" ).disableSelection();
		
		$(".notitie").each(function() {
				$(this).hover(function() {
					$(this).animate({
						opacity: 1
					  }, 50 );
				}, function() {
					$(this).animate({
						opacity: 0.9
					}, 50 );
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
		
	});
	</script>	
	<script type="text/javascript">
		$(function() {
			// $('.prikbord .notitie').lightBox();
		});
    </script>