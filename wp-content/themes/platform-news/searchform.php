<?php
	global $lang;
	$placeholder_text = '';
    if ( $lang == 212 ) {
    	$placeholder_text = 'ПОИСК...';
    }
    else if ( $lang == 213 ) {                    
        $placeholder_text = 'SEARCH...';
    }
    else {
    	$placeholder_text = 'ПОШУК...';
    }
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-field">
		<input id="search" type="search" placeholder="<?php echo $placeholder_text; ?>" required name="s">
		<label class="label-icon" for="search">
			<i class="material-icons">search</i>
		</label>
		<i class="material-icons">close</i>
	</div>
</form>