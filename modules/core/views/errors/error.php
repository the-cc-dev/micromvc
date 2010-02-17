<style type="text/css">
.system_error {
	border:1px solid #990000;
	padding:10px 20px;
	margin:10px;
	font: 13px/1.4em verdana;
	background: #fff;
}
code.source {
	white-space: pre;
	background: #fff;
	padding: 1em;
	display: block;
	margin: 1em 0;
	border: 1px solid #bedbeb;
}
.system_error .box {
	margin: 1em 0;
	background: #ebf2fa;
	padding: 10px;
	border: 1px solid #bedbeb;
}
.highlight_line {background: #ffc;}
</style>

<div class="system_error">

	<b style="color: #990000"><?php echo $title; ?></b>
	<p><?php echo $message; ?></p>

	<?php if(config::get('debug_mode')) { ?>

		<?php if( ! empty($backtrace))
		{

			foreach($backtrace as $id => $line)
			{
				print '<div class="box">';

				//Skip the first element
				if( $id !== 0 )
				{
					// If this is a class include the class name
					print '<b>Called by '. ( $line['class'] ? $line['class']. $line['type'] : '');
					print $line['function']. '('. (is_string($line['args']) ? $line['args'] : ''). ')</b>';
				}

				// Print file, line, and source
				print ' in '. $line['file']. ' ['. $line['line']. ']';
				print '<code class="source">'. $line['source']. '</code>';

				print '</div>';
			}

		}
		elseif(isset($file, $line))
		{
			print '<p><b>'. $file. '</b> ('. $line. ')</p>';
		}
	}
	?>

</div>