<?php include("header.php"); ?>  
<div id="megawrapper">
	<div id="dreamBoard">
		<?php $page->show_content(); ?>
	</div>
	<div id="sidebar">
		<?php $sidebar=new Sidebar($page);
		$sidebar->show_dreamBoards();
		?>
	</div>
</div>
<?php include('footer.php'); ?>
