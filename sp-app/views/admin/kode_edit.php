<script type="text/javascript">
	$("form").attr('action', '<?= $url; ?>');
	<?php foreach ($u as $key => $value): 
		// print_r($u);
		// if (!json_decode($value)) {
		?>
		$("[name='<?= $key; ?>']").val("<?= addslashes($value) ?>");
	<?php   endforeach ?>
</script>