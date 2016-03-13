<!DOCTYPE html>
<html>
<head>
	<title>Responsive Test</title>
	<!--[if lt IE 9]>
		<script src="librarys/html5shiv.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="styles/style.css"/>
</head>
<body>
	<header>
		<a href="./"><figure id="logo"></figure></a>
		<form method="post">
			<label class="data" for="src">Website URL</label>
			<input class="data" type="text" name="src" value="<?php if(isset($_POST['submit'])) echo $_POST['src']; else echo "www.njuskalo.hr"; ?>"/>
			<label class="data" for="size">Select Device</label>
			<?php
				include 'devices.php';
				
				class selected {
					
					public function setSelect($a,$b,$c,$d,$e,$f) {
						echo '<select class="data" name="size">'."\n";
						$this->setOptions($a,$b);
						$this->setOptions($c,$d);
						$this->setOptions($e,$f);
						echo "\t\t\t\t".'</optgroup>'."\n";
						echo "\t\t\t".'</select>'."\n";						
					}
			
					public function setOptions($group,$devices) {
						echo "\t\t\t\t".'<optgroup label="'.$group.'">'."\n";
						foreach($devices as $name=>$size){
							echo "\t\t\t\t\t".'<option value="'.$size.' '.$name.'"';
							$select='';
							if(isset($_POST['submit']) && $_POST['size']==$size.' '.$name) {
								$select=' selected';
							}
							echo $select.'>'.$name.'</option>'."\n";
						}
					}
				}
				$select=new selected();
				$select->setSelect('Common Smartphones',$smartphones,'Common Tablets',$tablets,'Other Devices',$other);
			?>
			<label class="data" for="orientation">Select Orientation</label>
			<select class="data" name="orientation">
				<option value="portrait"<?php if(isset($_POST['submit']) && $_POST['orientation']=='portrait') echo ' selected'; ?>>Portrait</option>
				<option value="landscape"<?php if(isset($_POST['submit']) && $_POST['orientation']=='landscape') echo ' selected'; ?>>Landscape</option>
			</select>
			<input class="data" type="submit" name="submit" value="GO!"/>
		</form>
	</header>
	<main title="Device CSS Width and Height">
		<?php include 'embed.php'?>
	</main>
</body>
</html>