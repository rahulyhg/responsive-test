<?php
	if(isset($_POST['submit'])) {
		
		class embed {
			
			private $src;
			private $width;
			private $height;
			private $orientation;
			
			public function setData($src, $width, $height, $orientation) {
				$this->src=$src;
				$this->width=$width + 17;
				$this->height=$height + 17;
				$this->orientation=$orientation;
			}
			public function setEmbed() {
				if($this->orientation=='portrait'){
					echo '<object data="'.$this->src.'" width="'.$this->width.'" height="'.$this->height.'"/>';
				}
				else if($this->orientation=='landscape'){
					echo '<object data="'.$this->src.'" width="'.$this->height.'" height="'.$this->width.'"/>';
				}
			}
		}
		
		$src=$_POST['src'];
		$http = substr($src, 0, 7);
		$https = substr($src, 0, 8);
		if($http!='http://' && $https!='https://') {
			$src='http://'.$src;
		}
		
		$size=$_POST['size'];
		$s=explode(' ', $size);
		$width=$s[0];
		$height=$s[1];
		
		$orientation=$_POST['orientation'];
		
		$embed=new embed();
		$embed->setData($src, $width, $height, $orientation);
		$embed->setEmbed();
	}
?>