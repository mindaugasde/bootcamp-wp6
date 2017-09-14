<div class="comments">

<?php if( have_comments() ): ?>
	
	<ol>
	<?php wp_list_comments(array(
		'style' => 'ol',
		'avatar_size' => '35'
	)); ?>
	</ol>

<?php else: ?>

	<p>Baba! Komentarų nematyti :( </p>

<?php endif; ?>

<?php comment_form(array(
	'class_form' => 'babaja'
)); ?>

</div>